const { src, dest, watch, series, parallel }  = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const postcss = require('gulp-postcss');
// const autoprefixer = require('autoprefixer');
const cssdeclsort = require('css-declaration-sorter');
const gcmq = require('gulp-group-css-media-queries');
const mode = require('gulp-mode')();
const browserSync = require('browser-sync');
const pug = require('gulp-pug');
const crypto = require('crypto');
const hash = crypto.randomBytes(8).toString('hex');
const replace = require('gulp-replace');

const webpackStream = require("webpack-stream");
const webpack = require("webpack");

const webpackConfig = require("./webpack.config");

const bundleJs = () => {
  return webpackStream(webpackConfig, webpack).on('error', function (e) {
    this.emit('end');
  })
  .pipe(dest("dist/js"));
};

const compileSass = (done) => {
  const postcssPlugins = [
    // autoprefixer({
    //   grid: "autoplace",
    //   cascade: false,
    // }),
    cssdeclsort({ order: 'alphabetical' })
  ];
  src('./src/scss/**/*.scss', { sourcemaps: true })
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sass({ outputStyle: 'expanded' }))
    .pipe(postcss(postcssPlugins))
    .pipe(mode.production(gcmq()))
    .pipe(dest('./dist/css', { sourcemaps: './sourcemaps' }));
  done();
};

const buildServer = (done) => {
  browserSync.init({
    port: 8080,
    files: ["**/*"],
    // 静的サイト
    server: { baseDir: './dist' },
    // 動的サイト
    // proxy: "http://localsite.local/",
    open: true,
    watchOptions: {
      debounceDelay: 1000,
    },
  });
  done();
};

const browserReload = done => {
  browserSync.reload();
  done();
};

const compilePug = done => {
  src(['./src/pug/**/*.pug', '!' + './src/pug/**/_*.pug'])
    .pipe(plumber(({ errorHandler: notify.onError('Error: <%= error.message %>') })))
    .pipe(pug({
      pretty: true
    }))
    .pipe(dest('./dist'));
  done();
};

const cacheBusting = done => {
  src('./dist/index.html')
    .pipe(replace(/\.(js|css)\?ver/g, '.$1?ver=' + hash))
    .pipe(dest('./dist'));
  done();
};

const watchFiles = () => {
  watch( './src/scss/**/*.scss', series(compileSass, browserReload))
  watch( './src/pug/**/*.pug', series(compilePug, browserReload))
  watch( './src/js/**/*.js', series(bundleJs, browserReload))
};

module.exports = {
  sass: compileSass,
  pug: compilePug,
  bundle: bundleJs,
  cache: cacheBusting,
  default: parallel(buildServer, watchFiles),
};
