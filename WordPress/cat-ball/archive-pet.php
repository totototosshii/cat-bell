<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
  <?php get_header(); ?>
</head>

<body class="ly_under js_noScroll">
  <?php get_template_part('template-parts/loading'); ?>
  <?php get_template_part('template-parts/header', 'content'); ?>
  <main class="ly_main">
    <ol class="bl_breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item"><span itemprop="name">ホーム</span></a>
        <meta itemprop="position" content="1">
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url()); ?>/archive-pet" itemprop="item"><span itemprop="name">猫種一覧</span></a>
        <meta itemprop="position" content="2">
      </li>
    </ol>
    <section class="ly_section ly_section__pet hp_pt15">
      <div class="ly_sectionInner">
        <h2 class="el_lv2Heading">ペットを探す<br><span>Find a pet</span></h2>
        <ul class="bl_cardUnit bl_cardUnit__col4Pet">
          <?php
          $the_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 8,
            'post_status' => 'publish',
            'order' => 'DESC'
          ));
          if ($the_query->have_posts()) :
          ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="bl_card">
                <h3 class="bl_card_ttl"><a class="bl_card_link" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 13, '...'); ?></a></h3>
                <?php
                // 投稿があれば表示
                $image = get_field('cat_main_image');
                $url = $image['sizes']['large'];
                $alt = $image['alt'];
                if (!empty($url)) :
                ?>
                  <figure class="bl_card_imgWrapper">
                    <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" width="184" height="184">
                  </figure>
                <?php endif; ?>
              </li>
          <?php endwhile;
          endif;
          wp_reset_postdata(); ?>
        </ul>
        <ul class="bl_cardUnit bl_cardUnit__col3Pet js_fadeUp">
          <?php
          $the_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'order' => 'DESC'
          ));
          if ($the_query->have_posts()) :
          ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="bl_card">
                <h3 class="bl_card_ttl"><a class="bl_card_link" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 13, '...'); ?></a></h3>
                <?php
                // 投稿があれば表示
                $image = get_field('cat_main_image');
                $url = $image['sizes']['large'];
                $alt = $image['alt'];
                if (!empty($url)) :
                ?>
                  <figure class="bl_card_imgWrapper">
                    <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" width="96" height="96">
                  </figure>
                <?php endif; ?>
              </li>
          <?php endwhile;
          endif;
          wp_reset_postdata(); ?>
        </ul>
        <button class="el_btn el_btn__archive js_morePet js_fadeUp" type="button">すべての猫種一覧を見る</button>
      </div>
    </section>
  </main>
  <?php get_template_part('template-parts/footer', 'content'); ?>
  <?php get_footer(); ?>
</body>

</html>
