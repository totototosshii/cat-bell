<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
  <?php get_header(); ?>
</head>

<body class="ly_under hp-pt0 ly_blogWrapper js_noScroll">
  <?php get_template_part('template-parts/header', 'content'); ?>
  <div class="ly_breadcrumbWrapper">
    <ol class="bl_breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item"><span itemprop="name">ホーム</span></a>
        <meta itemprop="position" content="1">
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url()); ?>/archive-blog" itemprop="item"><span itemprop="name">ブログ一覧</span></a>
        <meta itemprop="position" content="2">
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo get_the_permalink(); ?>" itemprop="item"><span itemprop="name"><?php echo get_the_title(); ?></span></a>
        <meta itemprop="position" content="3">
      </li>
    </ol>
  </div>
  <div class="ly_blogInner">
    <main class="ly_main ly_blogSingle">
      <article class="bl_blogMedia_detail">
        <div class="bl_blogMedia_thumb">
          <?php
          // 投稿があれば表示
          $image = get_field('blog_thumbnail');
          $url = $image['sizes']['large'];
          $alt = $image['alt'];
          if (!empty($url)) :
          ?>
            <figure class="bl_blogMedia_inner">
              <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" width="980" height="400">
            </figure>
          <?php endif; ?>
        </div>
        <div class="bl_blogMedia_body">
          <time date-time="<?php the_time(); ?>"><?php the_time(); ?></time>
          <h2 class="bl_blogMedia_ttlH2"><?php the_title(); ?></h2>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <?php the_content(); ?>
          <?php endwhile;
          endif; ?>
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
      <section class="ly_section ly_section__shopDetail">
        <div class="ly_sectionInner">
          <?php
          $terms = get_the_terms($post->ID, 'shop_cat');
          if ($terms) {
            foreach ($terms as $term) {
              if ($term->name == "札幌店") {
          ?>
                <div class="bl_halfMedia_shop">
                  <div class="bl_halfMedia_body">
                    <h3 class="bl_halfMedia_ttl">札幌店</h3>
                    <dl class="bl_basicInfo_wrap">
                      <div class="bl_basicInfo">
                        <dt>住所</dt>
                        <dd>北海道札幌市1-11-11キャットベル</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>TEL</dt>
                        <dd>11-1111-1111</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>営業時間</dt>
                        <dd>平日11:00～19:30/土日祝11:00～20:00</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt></dt>
                        <dd>休日:年中無休</dd>
                      </div>
                    </dl>
                  </div>
                  <figure class="bl_halfMedia_imgWrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shop/sapporo-scaled.jpg" alt="札幌店" width="296" height="142">
                  </figure>
                </div>
                <a class="el_btn el_btn__shopLink" href="<?php echo esc_url(home_url()); ?>/tag/sapporo">この店舗の猫を見る</a>

              <?php
              } else if ($term->name == "宮城店") { ?>
                <div class="bl_halfMedia_shop">
                  <div class="bl_halfMedia_body">
                    <h3 class="bl_halfMedia_ttl">宮城店</h3>
                    <dl class="bl_basicInfo_wrap">
                      <div class="bl_basicInfo">
                        <dt>住所</dt>
                        <dd>宮城県仙台市青葉区2-22-22キャットベル</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>TEL</dt>
                        <dd>22-2222-2222</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>営業時間</dt>
                        <dd>平日11:00～19:30/土日祝11:00～20:00</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt></dt>
                        <dd>休日:年中無休</dd>
                      </div>
                    </dl>
                  </div>
                  <figure class="bl_halfMedia_imgWrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shop/miyagi-scaled.jpg" alt="宮城店" width="296" height="142">
                  </figure>
                </div>
                <a class="el_btn el_btn__shopLink" href="<?php echo esc_url(home_url()); ?>/tag/miyagi">この店舗の猫を見る</a>

              <?php
              } else if ($term->name == "新宿店") { ?>
                <div class="bl_halfMedia_shop">
                  <div class="bl_halfMedia_body">
                    <h3 class="bl_halfMedia_ttl">新宿店</h3>
                    <dl class="bl_basicInfo_wrap">
                      <div class="bl_basicInfo">
                        <dt>住所</dt>
                        <dd>東京都新宿区3-33-33キャットベル</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>TEL</dt>
                        <dd>33-3333-3333</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>営業時間</dt>
                        <dd>平日11:00～19:30/土日祝11:00～20:00</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt></dt>
                        <dd>休日:年中無休</dd>
                      </div>
                    </dl>
                  </div>
                  <figure class="bl_halfMedia_imgWrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shop/sinjyuku.jpg" alt="新宿店" width="296" height="142">
                  </figure>
                </div>
                <a class="el_btn el_btn__shopLink" href="<?php echo esc_url(home_url()); ?>/tag/sinjuku">この店舗の猫を見る</a>

              <?php
              } else if ($term->name == "石川店") { ?>
                <div class="bl_halfMedia_shop">
                  <div class="bl_halfMedia_body">
                    <h3 class="bl_halfMedia_ttl">石川店</h3>
                    <dl class="bl_basicInfo_wrap">
                      <div class="bl_basicInfo">
                        <dt>住所</dt>
                        <dd>石川県石川市4-44-44キャットベル</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>TEL</dt>
                        <dd>44-4444-4444</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>営業時間</dt>
                        <dd>平日11:00～19:30/土日祝11:00～20:00</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt></dt>
                        <dd>休日:年中無休</dd>
                      </div>
                    </dl>
                  </div>
                  <figure class="bl_halfMedia_imgWrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shop/ishikawa.jpg" alt="石川店" width="296" height="142">
                  </figure>
                </div>
                <a class="el_btn el_btn__shopLink" href="<?php echo esc_url(home_url()); ?>/tag/ishikawa">この店舗の猫を見る</a>

              <?php
              } else if ($term->name == "梅田店") { ?>
                <div class="bl_halfMedia_shop">
                  <div class="bl_halfMedia_body">
                    <h3 class="bl_halfMedia_ttl">梅田店</h3>
                    <dl class="bl_basicInfo_wrap">
                      <div class="bl_basicInfo">
                        <dt>住所</dt>
                        <dd>大阪府大阪市5-55-55キャットベル</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>TEL</dt>
                        <dd>55-5555-5555</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>営業時間</dt>
                        <dd>平日11:00～19:30/土日祝11:00～20:00</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt></dt>
                        <dd>休日:年中無休</dd>
                      </div>
                    </dl>
                  </div>
                  <figure class="bl_halfMedia_imgWrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shop/umeda-scaled.jpg" alt="梅田店" width="296" height="142">
                  </figure>
                </div>
                <a class="el_btn el_btn__shopLink" href="<?php echo esc_url(home_url()); ?>/tag/umeda">この店舗の猫を見る</a>

              <?php
              } else if ($term->name == "静岡店") { ?>
                <div class="bl_halfMedia_shop">
                  <div class="bl_halfMedia_body">
                    <h3 class="bl_halfMedia_ttl">静岡店</h3>
                    <dl class="bl_basicInfo_wrap">
                      <div class="bl_basicInfo">
                        <dt>住所</dt>
                        <dd>静岡県静岡市6-66-66キャットベル</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>TEL</dt>
                        <dd>66-6666-6666</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>営業時間</dt>
                        <dd>平日11:00～19:30/土日祝11:00～20:00</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt></dt>
                        <dd>休日:年中無休</dd>
                      </div>
                    </dl>
                  </div>
                  <figure class="bl_halfMedia_imgWrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shop/shizuoka-scaled.jpg" alt="静岡店" width="296" height="142">
                  </figure>
                </div>
                <a class="el_btn el_btn__shopLink" href="<?php echo esc_url(home_url()); ?>/tag/shizuoka">この店舗の猫を見る</a>

              <?php
              } else if ($term->name == "福岡店") { ?>
                <div class="bl_halfMedia_shop">
                  <div class="bl_halfMedia_body">
                    <h3 class="bl_halfMedia_ttl">福岡店</h3>
                    <dl class="bl_basicInfo_wrap">
                      <div class="bl_basicInfo">
                        <dt>住所</dt>
                        <dd>福岡県福岡市7-77-77キャットベル</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>TEL</dt>
                        <dd>77-7777-7777</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>営業時間</dt>
                        <dd>平日11:00～19:30/土日祝11:00～20:00</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt></dt>
                        <dd>休日:年中無休</dd>
                      </div>
                    </dl>
                  </div>
                  <figure class="bl_halfMedia_imgWrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shop/fukuoka-scaled.jpg" alt="福岡店" width="296" height="142">
                  </figure>
                </div>
                <a class="el_btn el_btn__shopLink" href="<?php echo esc_url(home_url()); ?>/tag/fukuoka">この店舗の猫を見る</a>

              <?php
              } else { ?>
                <div class="bl_halfMedia_shop">
                  <div class="bl_halfMedia_body">
                    <h3 class="bl_halfMedia_ttl">鹿児島店</h3>
                    <dl class="bl_basicInfo_wrap">
                      <div class="bl_basicInfo">
                        <dt>住所</dt>
                        <dd>鹿児島県鹿児島市8-88-88キャットベル</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>TEL</dt>
                        <dd>88-8888-8888</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt>営業時間</dt>
                        <dd>平日11:00～19:30/土日祝11:00～20:00</dd>
                      </div>
                      <div class="bl_basicInfo">
                        <dt></dt>
                        <dd>休日:年中無休</dd>
                      </div>
                    </dl>
                  </div>
                  <figure class="bl_halfMedia_imgWrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shop/kagosima-scaled.jpg" alt="鹿児島店" width="296" height="142">
                  </figure>
                </div>
                <a class="el_btn el_btn__shopLink" href="<?php echo esc_url(home_url()); ?>/tag/kagoshima">この店舗の猫を見る</a>
          <?php
              }
            }
          }
          ?>
        </div>
      </section>
      <section class="ly_section ly_section__newPost">
        <div class="ly_sectionInner">
          <h3 class="bl_cardUnit__col4Ttl">
            <?php
            $terms = get_the_terms($post->ID, 'shop_cat');
            if ($terms) {
              foreach ($terms as $term) {
                if ($term->name == "札幌店") {
            ?>
                  <?php echo $term->name ?>の最新ブログ

                <?php
                } else if ($term->name == "宮城店") { ?>
                  <?php echo $term->name ?>の最新ブログ

                <?php
                } else if ($term->name == "新宿店") { ?>
                  <?php echo $term->name ?>の最新ブログ

                <?php
                } else if ($term->name == "石川店") { ?>
                  <?php echo $term->name ?>の最新ブログ

                <?php
                } else if ($term->name == "梅田店") { ?>
                  <?php echo $term->name ?>の最新ブログ

                <?php
                } else if ($term->name == "静岡店") { ?>
                  <?php echo $term->name ?>の最新ブログ

                <?php
                } else if ($term->name == "福岡店") { ?>
                  <?php echo $term->name ?>の最新ブログ

                <?php
                } else { ?>
                  <?php echo $term->name ?>の最新ブログ
            <?php
                }
              }
            }
            ?>
          </h3>
          <ul class="bl_cardUnit bl_cardUnit__col4newPost">
            <?php
            $taxonomy_slug = 'shop_cat'; // タクソノミーのスラッグを指定
            $post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
            $post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
            if ($post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
              $terms_slug = array(); // 配列のセット
              foreach ($post_terms as $value) { // 配列の作成
                $terms_slug[] = $value->slug; // タームのスラッグを配列に追加
              }
            }
            $args = array(
              'post_type' => $post_type_slug, // 投稿タイプを指定
              'posts_per_page' => 4, // 表示件数を指定
              'orderby' =>  'rand', // ランダムに投稿を取得
              'post__not_in' => array($post->ID), // 現在の投稿を除外
              'tax_query' => array( // タクソノミーパラメーターを使用
                array(
                  'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
                  'field' => 'slug', // スラッグに一致するタームを返す
                  'terms' => $terms_slug // タームの配列を指定
                )
              )
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
            ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="bl_card">
                  <time class="bl_card_time" datetime="<?php the_time(); ?>"><?php the_time(); ?></time>
                  <h3 class="bl_card_ttl"><a class="bl_card_link" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 26, '...'); ?></a></h3>
                  <?php
                  // 投稿があれば表示
                  $image = get_field('blog_thumbnail');
                  $url = $image['sizes']['large'];
                  $alt = $image['alt'];
                  if (!empty($url)) :
                  ?>
                    <figure class="bl_card_imgWrapper">
                      <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" width="147" height="147">
                    </figure>
                  <?php endif; ?>
                </li>
              <?php endwhile; ?>
            <?php else : ?>
              <li style="line-height: 1.5;"><?php echo $term->name ?>の他の投稿はありません。</li>
            <?php endif;
            wp_reset_postdata(); ?>
          </ul>
          <a class="el_btn el_btn__archive" href="<?php echo esc_url(home_url()); ?>/archive-blog">ブログ一覧を見る</a>
        </div>
      </section>
    </main>
    <aside class="ly_aside hp_pt475">
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
