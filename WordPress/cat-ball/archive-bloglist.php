<!--
	Template Name: ブログ一覧
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
  <?php get_header(); ?>
</head>

<body class="ly_under hp-pt0 ly_blogWrapper js_noScroll">
  <?php get_template_part('template-parts/loading'); ?>
  <?php get_template_part('template-parts/header', 'content'); ?>
  <div class="ly_breadcrumbWrapper">
    <ol class="bl_breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item"><span itemprop="name">ホーム</span></a>
        <meta itemprop="position" content="1">
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url()); ?>/archive-blog" itemprop="item"><span itemprop="name">ブログ一覧</span></a>
        <meta itemprop="position" content="2">
      </li>
    </ol>
  </div>
  <div class="ly_blogInner">
    <main class="ly_main">
      <ul class="bl_blogList">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $the_query = new WP_Query(array(
          'paged' => $paged,
          'post_type' => 'blog',
          'posts_per_page' => 7,
          'post_status' => 'publish',
          'order' => 'DESC'
        ));
        $max_num_pages = $the_query->max_num_pages;
        if ($the_query->have_posts()) :
        ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="bl_blogMedia_contents">
              <article>
                <?php $image = get_field('blog_thumbnail');
                // 投稿があれば表示
                if (!empty($image)) : ?>
                  <figure class="bl_blogMedia_thumb">
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" width="980" height="400">
                  </figure>
                <?php endif; ?>
                <div class="bl_blogMedia_body">
                  <time date-time="<?php the_time('Y.n.j'); ?>"><?php the_time('Y.n.j'); ?></time>
                  <p class="bl_blogMedia_txt">
                    <?php echo wp_trim_words(get_the_excerpt(), 98, '...'); ?>
                  </p>
                  <h2 class="bl_blogMedia_ttl">
                    <a class="bl_blogMedia_ttlLink" href="<?php the_permalink(); ?>">
                      <?php echo wp_trim_words(get_the_title(), 37); ?>
                    </a>
                  </h2>
                  <ul class="blogMedia_tag">
                    <?php
                    $terms = get_the_terms($post->ID, 'key-word');
                    foreach ($terms as $term) {
                      echo '<li class="blogMedia_tagList"><a class="blogMedia_tagLink" href="' . get_term_link($term->slug, 'key-word') . '">' . '#' . $term->name . '</a></li>';
                    }
                    ?>
                  </ul>
                </div>
              </article>
            </li>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
      </ul>
      <?php
      // ページネーション
      if (function_exists("pagination")) {
        pagination($max_num_pages);
      }
      ?>
    </main>
    <aside class="ly_aside">
      <h3 class="bl_asideHead_pickUp">ピックアップ</h3>
      <ul class="bl_asideBlog_list">
        <?php
        $the_query = new WP_Query(array(
          'post_type' => 'blog',
          'posts_per_page' => 3,
          'post_status' => 'publish',
          'order' => 'DESC',
          'tax_query' => array( // タクソノミーパラメーターを使用
            array(
              'taxonomy' => 'pickup_cat', // タームを取得タクソノミーを指定
              'field' => 'slug', // スラッグに一致するタームを返す
              'terms' => array(
                'pick-up'
              ) // カスタム分類の取得したい項目
            )
          )
        ));
        if ($the_query->have_posts()) :
        ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="bl_asideBlog_contents">
              <article>
                <?php
                // 投稿があれば表示
                $image = get_field('blog_thumbnail');
                $url = $image['sizes']['large'];
                $alt = $image['alt'];
                if (!empty($url)) :
                ?>
                  <figure class="bl_asideBlog_thumb">
                    <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" width="184" height="184">
                  </figure>
                <?php endif; ?>
                <div class="bl_asideBlog_body">
                  <h4 class="bl_asideBlog_ttl"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 32, '...'); ?></a></h4>
                  <time date-time="<?php the_time(); ?>"><?php the_time(); ?></time>
                </div>
              </article>
            </li>
          <?php endwhile; ?>
        <?php else : ?>
          <li style="line-height: 1.5;">ピックアップ記事はありません。</li>
        <?php endif;
        wp_reset_postdata(); ?>
      </ul>
      <h3 class="bl_asideHead_keyWord">キーワード</h3>
      <ul class="bl_asideKey_wordList">
        <?php
        $terms = get_terms('key-word');
        foreach ($terms as $term) {
          echo '<li><a class="bl_asideKey_wordLink" href="' . get_term_link($term->slug, 'key-word') . '">' . '#' . $term->name . '</a></li>';
        }
        ?>
      </ul>
    </aside>
  </div>
  <?php get_template_part('template-parts/footer', 'content'); ?>
  <?php get_footer(); ?>
</body>

</html>
