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


function my_setup()
{
  // アイキャッチ画像を有効化
  add_theme_support('post-thumbnails');
  // <head>内にRSSフィードリンクを出力
  add_theme_support('automatic-feed-links');
  // タイトルタグ自動生成
  add_theme_support('title-tag');
  // HTML5のタグで出力
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
  // ブロックエディター用のCSSを有効化
  add_theme_support('wp-block-styles');
  // 埋め込みコンテンツレスポンシブ
  add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'my_setup');


/* CSSとJavaScriptの読み込み */
function my_script_init()
{
  // Adobe Fonts CDN
  wp_enqueue_style(
    'adobefont',
    'https://use.typekit.net/yxe4bgl.css'
  );
  // CSSの読み込み
  wp_enqueue_style(
    'style-css',
    get_template_directory_uri() . '/css/style.css',
    array(),
    '1.0.0',
    'all'
  );
  // JavaScriptの読み込み
  wp_enqueue_script(
    'bundle-js',
    get_template_directory_uri() . '/js/bundle.js',
    // bundle.jsよりも前にWordPress内部のjQueryを読み込む
    array('jquery'),
    '1.0.0',
    // wp_footer()の位置で出力
    true
  );
}
add_action('wp_enqueue_scripts', 'my_script_init');


/* 管理画面の「投稿」の名前を「ネコ」に変更 */
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


/* カスタム投稿タイプの追加 */
function create_post_type()
{
  //カスタム投稿（ブログ）
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
    // ↓タクソノミー名
    'key-word',
    // ↓使用するカスタム投稿タイプ名
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
    // ↓タクソノミー名
    'shop_cat',
    // ↓使用するカスタム投稿タイプ名
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
    // ↓タクソノミー名
    'pickup_cat',
    // ↓使用するカスタム投稿タイプ名
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


// <p>タグを自動挿入させない
add_action('init', function () {
  remove_filter('the_excerpt', 'wpautop');
  remove_filter('the_content', 'wpautop');
});
add_filter('tiny_mce_before_init', function ($init) {
  $init['wpautop'] = false;
  $init['apply_source_formatting'] = true;
  return $init;
});


// ページネーション
function pagination($pages = '', $range = 2)
{
  $showitems = ($range * 2) + 1;
  global $paged;
  if (empty($paged)) $paged = 1;
  if ($pages == ''
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


// tag.phpリンクへのショートコード
function home_url_shortcode() {
  return get_home_url('url');
}
add_shortcode('url', 'home_url_shortcode');
