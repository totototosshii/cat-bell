<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: https://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body class="ly_home js_noScroll">
  <?php get_template_part('template-parts/loading'); ?>
  <?php get_template_part('template-parts/header', 'content'); ?>
  <main class="ly_main">
    <div class="ly_fv">
      <div class="ly_fvInner">
        <div class="bl_fvContent">
          <h2 class="el_lv2Heading el_lv2Heading__fv js_lv2Heading__fv">猫と暮らそう</h2>
          <p class="bl_fvContent_txt js_fvContent_txt">安心・安全な猫専門ペットショップ</p>
          <div class="bl_fvBtn_wrap js_fvBtn_wrap">
            <a class="el_btn el_btn__fv" href="<?php echo esc_url(home_url()); ?>/archive-pet">猫種一覧を見る</a>
            <a class="el_btn el_btn__fv" href="<?php echo esc_url(home_url()); ?>/shoplist">お店を見る</a>
          </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/home/mv.png" alt="猫と暮らそう" width="940" height="587">
      </div>
    </div>
    <section class="ly_section ly_section__info">
      <div class="ly_sectionInner ly_section_innerInfo js_section_innerInfo">
        <h2 class="el_lv2Heading el_lv2Heading__info">お知らせ</h2>
        <ul class="bl_vertPosts">
          <?php
          $the_query = new WP_Query(array(
            'post_type' => 'blog',
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'order' => 'DESC'
          ));
          $utc_published = date('Y-m-dTH:i:sZ', get_post_timestamp());
          $published = get_the_date("Y.m.d");
          if ($the_query->have_posts()) :
          ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="bl_vertPosts_item">
                <time class="bl_vertPosts_date" date-time="<?php echo $utc_published; ?>" itemprop="datePublished"><?php echo $published; ?></time><a class="bl_vertPosts_ttl" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 33, '...'); ?></a>
              </li>
          <?php endwhile;
          endif;
          wp_reset_postdata(); ?>
        </ul>
      </div>
    </section>
    <section class="ly_section ly_section__pet">
      <div class="ly_sectionInner">
        <h2 class="el_lv2Heading js_fadeUp">ペットを探す<br><span>Find a pet</span></h2>
        <ul class="bl_cardUnit bl_cardUnit__col4Pet js_fadeUp">
          <?php
          $the_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 8,
            'post_status' => 'publish',
            'order' => 'DESC',
          ));
          if ($the_query->have_posts()) :
          ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="bl_card">
                <h3 class="bl_card_ttl">
                  <a class="bl_card_link" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 13, '...'); ?></a>
                </h3>
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
        <a class="el_btn el_btn__archive js_fadeUp" href="<?php echo esc_url(home_url()); ?>/archive-pet">猫種一覧を見る</a>
      </div>
    </section>
    <section class="ly_section ly_section__shop" id="shop">
      <div class="ly_sectionInner">
        <h2 class="el_lv2Heading js_fadeUp">お店を探す<br><span>Find a store</span></h2>
        <div class="bl_map js_fadeUp">
          <img src="<?php echo get_template_directory_uri(); ?>/img/home/map.png" alt="日本地図のイラスト" width="506" height="454">
          <a class="el_btn el_btn__mapSapporo" href="<?php echo esc_url(home_url()); ?>/tag/sapporo">札幌店</a>
          <a class="el_btn el_btn__mapMiyagi" href="<?php echo esc_url(home_url()); ?>/tag/miyagi">宮城店</a>
          <a class="el_btn el_btn__mapSinjuku" href="<?php echo esc_url(home_url()); ?>/tag/sinjuku">新宿店</a>
          <a class="el_btn el_btn__mapIshikawa" href="<?php echo esc_url(home_url()); ?>/tag/ishikawa">石川店</a>
          <a class="el_btn el_btn__mapUmeda" href="<?php echo esc_url(home_url()); ?>/tag/umeda">梅田店</a>
          <a class="el_btn el_btn__mapShizuoka" href="<?php echo esc_url(home_url()); ?>/tag/shizuoka">静岡店</a>
          <a class="el_btn el_btn__mapFukuoka" href="<?php echo esc_url(home_url()); ?>/tag/fukuoka">福岡店</a>
          <a class="el_btn el_btn__mapKagoshima" href="<?php echo esc_url(home_url()); ?>/tag/kagoshima">鹿児島店</a>
        </div>
        <a class="el_btn el_btn__archive js_fadeUp" href="<?php echo esc_url(home_url()); ?>/shoplist">店舗一覧を見る</a>
      </div>
    </section>
    <section class="ly_section ly_section__blog">
      <div class="ly_sectionInner">
        <h2 class="el_lv2Heading js_fadeUp">ブログ<br><span>Blog</span></h2>
        <ul class="bl_cardUnit bl_cardUnit__col4Blog js_fadeUp">
          <?php
          $the_query = new WP_Query(array(
            'post_type' => 'blog',
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'order' => 'DESC'
          ));
          $utc_published = date('Y-m-dTH:i:sZ', get_post_timestamp());
          $published = get_the_date("Y.m.d");
          if ($the_query->have_posts()) :
          ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="bl_card">
                <time class="bl_card_time" datetime="<?php echo $utc_published; ?>" itemprop="datePublished"><?php echo $published; ?></time>
                <h3 class="bl_card_ttl">
                  <a class="bl_card_link" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 33, '...'); ?></a>
                </h3>
                <?php
                // 投稿があれば表示
                $image = get_field('blog_thumbnail');
                $url = $image['sizes']['large'];
                $alt = $image['alt'];
                if (!empty($url)) :
                ?>
                  <figure class="bl_card_imgWrapper">
                    <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" width="208" height="208">
                  </figure>
                <?php endif; ?>
              </li>
          <?php endwhile;
          endif;
          wp_reset_postdata(); ?>
        </ul>
        <a class="el_btn el_btn__archive js_fadeUp" href="<?php echo esc_url(home_url()); ?>/archive-blog">ブログ一覧を見る</a>
      </div>
    </section>
    <section class="ly_section ly_section__about">
      <div class="ly_sectionInner">
        <h2 class="el_lv2Heading js_fadeUp">サイトについて<br><span>About</span></h2>
        <div class="bl_aboutContent js_fadeUp">
          <h3 class="bl_about_ttl">ペットと人との笑顔ある未来の創造</h3>
          <p class="bl_about_txt">家族の絆を深める、子供の情操教育、ヒーリング効果など、<br class="br">ペットと暮らすメリットが証明されてきており、<br class="br">それらの効果は人々の暮らしに必要不可欠な”笑顔”を<br class="br">もたらすことができます。<br>CAT BELLは、ペットというかけがえのない生命を<br class="br">お客様へご提供することで、笑顔ある未来を創造し、<br class="br">より豊かな社会環境の構築に貢献いたします。</p>
        </div>
        <img class="js_fadeUp" src="<?php echo get_template_directory_uri(); ?>/img/home/about_01.png" alt="" width="363" height="403">
      </div>
    </section>
  </main>
  <?php get_template_part('template-parts/footer', 'content'); ?>
  <?php get_footer(); ?>
</body>

</html>
