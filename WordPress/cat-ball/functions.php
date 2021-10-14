<?php
/*
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
/* テーマのセットアップ */

// コンテンツの横幅をセット
if (!isset($content_width)) {
  $content_width = 980;
};

// Clean up wordpress <head>
remove_action('wp_head', 'feed_links', 2); //RSSフィード
remove_action('wp_head', 'feed_links_extra', 3); //RSSフィード
remove_action('wp_head', 'rsd_link'); //Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); //Windows Live Writer
remove_action('wp_head', 'index_rel_link'); //indexへのリンク
remove_action('wp_head', 'parent_post_rel_link', 10, 0); //分割ページへのリンク
remove_action('wp_head', 'start_post_rel_link', 10, 0); //分割ページへのリンク
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); //前後のページへのリンク
remove_action('wp_head', 'wp_generator'); //WordPressのバージョン
remove_action('wp_head', 'print_emoji_detection_script', 7); //絵文字対応
remove_action('admin_print_scripts', 'print_emoji_detection_script'); //絵文字対応
remove_action('wp_print_styles', 'print_emoji_styles'); //絵文字対応
remove_action('admin_print_styles', 'print_emoji_styles'); //絵文字対応
remove_action('wp_head', 'rest_output_link_wp_head'); //Embed対応
remove_action('wp_head', 'wp_shortlink_wp_head'); //ショートリンクURL
//WordPressのバージョン
function vc_remove_wp_ver_css_js($src)
{
  if (strpos($src, 'ver=' . get_bloginfo('version')))
    $src = remove_query_arg('ver', $src);
  return $src;
}
add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);

//Gutenbergを使わない場合は「wp-block-library-css」を削除
function disable_gutenberg_css()
{
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'disable_gutenberg_css', 1000);

//「最近のコメント」ウィジェット用のスタイルを出力させない
// function remove_recent_comments_style()
// {
//   global $wp_widget_factory;
//   remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
// }
// add_action('widgets_init', 'remove_recent_comments_style');

//コメント機能OFF
add_filter('comments_open', '__return_false');

function my_setup()
{
  // アイキャッチ画像を有効化
  // add_theme_support('post-thumbnails');
  // <head>内にRSSフィードリンクを出力
  // add_theme_support('automatic-feed-links');
  // タイトルタグ自動生成
  add_theme_support('title-tag');
  // HTML5のタグで出力
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption'
  ));
  // ブロックエディター用のCSSを有効化
  // add_theme_support('wp-block-styles');
  // 埋め込みコンテンツレスポンシブ
  // add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'my_setup');

// 全てのページで<p>タグを自動挿入させない
add_action('init', function () {
  remove_filter('the_excerpt', 'wpautop');
  remove_filter('the_content', 'wpautop');
});
add_filter('tiny_mce_before_init', function ($init) {
  $init['wpautop'] = false;
  $init['apply_source_formatting'] = true;
  return $init;
});

// ?author=1対策
add_filter('author_rewrite_rules', '__return_empty_array');
function disable_author_archive()
{
  if ($_GET['author'] || preg_match('#/author/.+#', $_SERVER['REQUEST_URI'])) {
    wp_redirect(home_url('/404.php'));
    exit;
  }
}
add_action('init', 'disable_author_archive');

//ダッシュボードにある項目を消す
function remove_dashboard_widget()
{
  //WordPressへようこそ!
  remove_action('welcome_panel', 'wp_welcome_panel');
  //アクティビティ
  remove_meta_box('dashboard_activity', 'dashboard', 'normal');
  //クイックドラフト
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  //WordPressニュース
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  //概要
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');

//標準メニュー（サイドバー）を消す
function remove_menus()
{
  //コメント
  remove_menu_page('edit-comments.php');
  //外観
  // remove_menu_page('themes.php');
  //ツールメニュー
  remove_menu_page('tools.php');
}
add_action('admin_menu', 'remove_menus');

// CSSとJavaScriptの読み込み
function my_script_init()
{
  // 自作のCSSの読み込み
  wp_enqueue_style(
    'style-css',
    esc_url(get_theme_file_uri('/css/style.css')),
    array(),
    '1.0.0',
    'all'
  );

  // Viewport Extra
  wp_enqueue_script(
    'viewport-extra',
    'https://cdn.jsdelivr.net/npm/viewport-extra@2.1.1/dist/iife/viewport-extra.min.js',
    array(),
    '2.1.1'
  );

  // WordPressのjQueryを読み込まない
  wp_deregister_script('jquery');

  // jQueryをCDNから読み込む
  wp_enqueue_script(
    'jquery',
    '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
    array(),
    '3.6.0',
    true // wp_footer()の位置で出力
  );

  // 自作のJavaScriptの読み込み
  wp_enqueue_script(
    'bundle-js',
    esc_url(get_theme_file_uri('/js/bundle.js')),
    array('jquery'), // bundle.jsよりも前に読み込みたいJSファイルの名前を記述
    '1.0.0',
    true // wp_footer()の位置で出力
  );
}
add_action('wp_enqueue_scripts', 'my_script_init');

// head内にソースコードを出力
function wp_head_custom_code()
{
  $wp_headCustom = <<<EOM
    <script>
      // Adobe Fonts
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
    <script>
      // Viewport Extra
      (function() {
        let ua = navigator.userAgent
        let sp = ua.indexOf('iPhone') > -1 || (ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1)
        let tab = !sp && (ua.indexOf('iPad') > -1 || (ua.indexOf('Macintosh') > -1 && 'ontouchend' in document) || ua.indexOf('Android') > -1)
        new ViewportExtra(tab ? 1200 : 375)
      })()
    </script>
  EOM;
  echo $wp_headCustom;
}
add_action('wp_head', 'wp_head_custom_code');

// 管理画面の「投稿」の名前を「ネコ」に変更
function change_post_menu_label()
{
  global $menu;
  global $submenu;
  $menu[5][0] = 'ネコ';
  $submenu['edit.php'][5][0] = 'ネコ一覧';
  $submenu['edit.php'][10][0] = '新しいネコ';
  $submenu['edit.php'][16][0] = 'タグ';
}
function change_post_object_label()
{
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'ネコ';
  $labels->singular_name = 'ネコ';
  $labels->add_new = _x('追加', 'ネコ');
  $labels->add_new_item = 'ネコの新規追加';
  $labels->edit_item = 'ネコの編集';
  $labels->new_item = '新規ネコ';
  $labels->view_item = 'ネコを表示';
  $labels->search_items = 'ネコを検索';
  $labels->not_found = '記事が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');

// カスタム投稿タイプの追加
function create_post_type()
{
  // カスタム投稿（ブログ）
  register_post_type(
    'blog',
    array(
      'labels'          => array(
        'all_items'          => 'ブログ一覧',
        'name'               => 'ブログ',
        'singular_name'      => 'ブログ',
        'menu_name'          => 'ブログ',
        'add_new'            => '新規追加',
        'add_new_item'       => 'ブログを追加',
        'edit'               => '編集',
        'edit_item'          => 'ブログの編集',
        'view'               => '表示',
        'view_item'          => 'ブログを表示',
        'search_items'       => 'ブログの検索',
        'not_found'          => '見つかりません',
        'not_found_in_trash' => 'ゴミ箱にはありません',
        'parent'             => '親',
      ),
      'description'     => '',
      'show_ui'         => true,
      'show_in_menu'    => true,
      'capadility_type' => 'post',
      'hierarchical'    => false,
      'rewrite'         => true,
      'query_var'       => true,
      'has_archive'     => true,
      'public'          => true,
      'supports'        => array('title', 'editor', 'excerpt'),
      'menu_position'   => 5,
      'menu_icon'     => 'dashicons-edit', // メニューで使用するアイコン
      'show_in_rest' => true
    )
  );
  // カスタムタクソノミー（ブログ：キーワード）
  register_taxonomy(
    // タクソノミー名
    'key-word',
    // 使用するカスタム投稿タイプ名
    'blog',
    array(
      'hierarchical'   => true,
      'update_count_callback' => '_update_post_term_count',
      'label'          => 'キーワード',
      'show_ui'        => true,
      'query_var'      => true,
      'rewrite'        => true,
      'singular_label' => 'キーワード',
      'show_in_rest' => true
    )
  );
  // カスタムタクソノミー（ブログ：各支店）
  register_taxonomy(
    // タクソノミー名
    'shop_cat',
    // 使用するカスタム投稿タイプ名
    'blog',
    array(
      'hierarchical'   => true,
      'update_count_callback' => '_update_post_term_count',
      'label'          => '各支店',
      'show_ui'        => true,
      'query_var'      => true,
      'rewrite'        => true,
      'singular_label' => '各支店',
      'show_in_rest' => true
    )
  );
  // カスタムタクソノミー（ブログ：ピックアップ）
  register_taxonomy(
    // タクソノミー名
    'pickup_cat',
    // 使用するカスタム投稿タイプ名
    'blog',
    array(
      'hierarchical'   => true,
      'update_count_callback' => '_update_post_term_count',
      'label'          => 'ピックアップ',
      'show_ui'        => true,
      'query_var'      => true,
      'rewrite'        => true,
      'singular_label' => 'ピックアップ',
      'show_in_rest' => true
    )
  );
}
add_action('init', 'create_post_type');

// ページネーション
function pagination($pages = '', $range = 2)
{
  $showitems = ($range * 2) + 1;
  global $paged;
  if (empty($paged)) $paged = 1;
  if (
    $pages == ''
  ) {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }
  if (1 != $pages) {
    echo "<nav class=\"bl_pager\">\n";
    echo "<ul class=\"bl_pager_inner\">\n";
    for ($i = 1; $i <= $pages; $i++) {
      if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
        //三項演算子での条件分岐
        echo ($paged == $i) ? "<li><span class=\"bl_pager_link is_active\">" . $i . "</li>\n" : "<li><a class=\"bl_pager_link\" href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>\n";
      }
    }
  }
}
