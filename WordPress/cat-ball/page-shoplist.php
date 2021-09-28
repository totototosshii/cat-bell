<!--
  Template Name: 店舗一覧
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
  <?php get_header(); ?>
</head>

<body class="ly_under js_noScroll">
  <?php get_template_part('template-parts/header', 'content'); ?>
  <main class="ly_main ly_shopList">
    <ol class="bl_breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item"><span itemprop="name">ホーム</span></a>
        <meta itemprop="position" content="1">
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url()); ?>/shoplist" itemprop="item"><span itemprop="name">店舗一覧</span></a>
        <meta itemprop="position" content="2">
      </li>
    </ol>
    <section class="ly_section ly_section__shopDetail">
      <div class="ly_sectionInner">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile;
        endif; ?>
      </div>
    </section>
  </main>
  <?php get_template_part('template-parts/footer', 'content'); ?>
  <?php get_footer(); ?>
</body>

</html>
