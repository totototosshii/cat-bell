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
<link rel="icon" href="絶対パスで指定">
<link rel="apple-touch-icon" sizes="180x180" href="絶対パスで指定">
<?php wp_head(); ?>
