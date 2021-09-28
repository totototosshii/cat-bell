<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta name="format-detection" content="telephone=no">
<meta property="og:title" content="<?php bloginfo('name'); ?>">
<?php if (is_home()) :/*ホームが表示されている場合*/ ?>
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
<?php else :/*ホーム以外のページが表示されている場合*/ ?>
  <meta property="og:type" content="article">
  <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
<?php endif; ?>
<meta property="og:description" content="<?php bloginfo('description'); ?>">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/ogp.jpg">
<meta property="og:locale" content="ja_JP">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="fb:app_id" content="FacebookID">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@ユーザー名">
<script>
  (function(d) {
    var config = {
        kitId: 'yxe4bgl',
        scriptTimeout: 3000,
        async: true
      },
      h = d.documentElement,
      t = setTimeout(function() {
        h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
      }, config.scriptTimeout),
      tk = d.createElement("script"),
      f = false,
      s = d.getElementsByTagName("script")[0],
      a;
    h.className += " wf-loading";
    tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
    tk.async = true;
    tk.onload = tk.onreadystatechange = function() {
      a = this.readyState;
      if (f || a && a != "complete" && a != "loaded") return;
      f = true;
      clearTimeout(t);
      try {
        Typekit.load(config)
      } catch (e) {}
    };
    s.parentNode.insertBefore(tk, s)
  })(document);
</script>
<script src="https://cdn.jsdelivr.net/npm/viewport-extra@1.0.3/dist/viewport-extra.min.js"></script>
<script>
  (function() {
    let ua = navigator.userAgent
    let sp = ua.indexOf('iPhone') > -1 || (ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1)
    let tab = !sp && (ua.indexOf('iPad') > -1 || (ua.indexOf('Macintosh') > -1 && 'ontouchend' in document) || ua.indexOf('Android') > -1)
    new ViewportExtra(tab ? 1200 : 375)
  })()
</script>
<link rel="icon" href="絶対パスで指定">
<link rel="apple-touch-icon" sizes="180x180" href="絶対パスで指定">
<link rel="stylesheet" href="./css/style.css?ver=9e6b7b6d60f57d54">
<?php wp_head(); ?>
