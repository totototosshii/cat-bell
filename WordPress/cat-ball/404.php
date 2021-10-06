<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
  <?php get_header(); ?>
</head>

<body class="ly_404 js_noScroll">
  <?php get_template_part('template-parts/header', 'content'); ?>
  <div class="ly_breadcrumbWrapper hp_w100 z-0">
    <ol class="bl_breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item"><span itemprop="name">ホーム</span></a>
        <meta itemprop="position" content="1">
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo get_the_permalink(); ?>" itemprop="item"><span itemprop="name">お探しのページは見つかりません</span></a>
        <meta itemprop="position" content="2">
      </li>
    </ol>
  </div>
  <main class="ly_main">
    <div class="bl_404wrapper">
      <p>お探しのページは見つかりません。</p>
    </div>
  </main>
  <?php get_template_part('template-parts/footer', 'content'); ?>
  <?php get_footer(); ?>
</body>

</html>
