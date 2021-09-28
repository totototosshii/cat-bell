<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
  <?php get_header(); ?>
</head>

<body class="ly_under js_noScroll">
  <?php get_template_part('template-parts/header', 'content'); ?>
  <main class="ly_main">
    <ol class="bl_breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item"><span itemprop="name">ホーム</span></a>
        <meta itemprop="position" content="1">
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo esc_url(home_url()); ?>/archive-pet" itemprop="item"><span itemprop="name">猫種一覧</span></a>
        <meta itemprop="position" content="2">
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="<?php echo get_the_permalink(); ?>" itemprop="item"><span itemprop="name"><?php echo get_the_title(); ?></span></a>
        <meta itemprop="position" content="3">
      </li>
    </ol>
    <section class="ly_section hp_pb0">
      <div class="ly_sectionInner ly_sectionCat_detail">
        <div class="bl_mediaCat_wrapper">
          <div class="bl_mediaCat_imgWrapper">
            <?php
            // 投稿があれば表示
            $image = get_field('cat_main_image');
            $url = $image['sizes']['large'];
            $alt = $image['alt'];
            if (!empty($url)) :
            ?>
              <figure class="bl_mediaCat_img">
                <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" width="584" height="384">
              </figure>
            <?php endif; ?>
            <ul>
              <?php if (have_rows('cat_sub_images')) : ?>
                <?php while (have_rows('cat_sub_images')) : the_row(); ?>
                  <?php
                  // 投稿があれば表示
                  $image = get_sub_field('cat_sub_image');
                  $url = $image['sizes']['large'];
                  $alt = $image['alt'];
                  if (!empty($url)) :
                  ?>
                    <li class="bl_mediaCat_imgItem">
                      <img src="<?php echo $url; ?>" alt="<?php echo $alt ?>" width="134" height="134">
                    </li>
                  <?php endif; ?>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="bl_mediaCat_body">
            <h2 class="bl_mediaCat_ttl"><?php the_title() ?></h2>
            <dl class="bl_mediaCat_sta">
              <div class="bl_mediaCat_staInner">
                <dt>生年月日</dt>
                <dd><?php the_field('birthday'); ?></dd>
              </div>
              <div class="bl_mediaCat_staInner">
                <dt>性別</dt>
                <dd><?php the_field('sex'); ?></dd>
              </div>
              <div class="bl_mediaCat_staInner">
                <dt>生体価格</dt>
                <dd><span><?php the_field('living_body_price'); ?></span>円（税抜）</dd>
              </div>
              <div class="bl_mediaCat_staInner">
                <dt>血統書</dt>
                <dd><?php the_field('pedigree'); ?></dd>
              </div>
            </dl>
          </div>
        </div>
        <div class="bl_mediaCat_txtWrapper">
          <h3 class="bl_mediaCat_head">コメント</h3>
          <div class="bl_mediaCat_txtContent">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile;
            endif; ?>
          </div>
        </div>
      </div>
    </section>
    <section class="ly_section ly_section__shopDetail hp_pt64">
      <div class="ly_sectionInner hp_mw876">
        <?php
        $tags = get_the_tags();
        foreach ($tags as $tag) {
          if ($tag->name == "札幌店") {
        ?>
            <div class="bl_halfMedia bl_shopPet">
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
                <a class="el_btn el_btn__shopDetail" href="<?php echo esc_url(home_url()); ?>/tag/sapporo">この店舗の猫を見る</a>
              </div>
              <figure class="bl_halfMedia_imgWrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/shop/sapporo-scaled.jpg" alt="札幌店" width="424" height="232">
              </figure>
            </div>

          <?php
          } else if ($tag->name == "宮城店") { ?>
            <div class="bl_halfMedia bl_shopPet">
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
                <a class="el_btn el_btn__shopDetail" href="<?php echo esc_url(home_url()); ?>/tag/miyagi">この店舗の猫を見る</a>
              </div>
              <figure class="bl_halfMedia_imgWrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/shop/miyagi-scaled.jpg" alt="宮城店" width="424" height="232">
              </figure>
            </div>

          <?php
          } else if ($tag->name == "新宿店") { ?>
            <div class="bl_halfMedia bl_shopPet">
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
                <a class="el_btn el_btn__shopDetail" href="<?php echo esc_url(home_url()); ?>/tag/sinjuku">この店舗の猫を見る</a>
              </div>
              <figure class="bl_halfMedia_imgWrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/shop/sinjyuku.jpg" alt="新宿店" width="424" height="232">
              </figure>
            </div>

          <?php
          } else if ($tag->name == "石川店") { ?>
            <div class="bl_halfMedia bl_shopPet">
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
                <a class="el_btn el_btn__shopDetail" href="<?php echo esc_url(home_url()); ?>/tag/ishikawa">この店舗の猫を見る</a>
              </div>
              <figure class="bl_halfMedia_imgWrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/shop/ishikawa.jpg" alt="石川店" width="424" height="232">
              </figure>
            </div>

          <?php
          } else if ($tag->name == "梅田店") { ?>
            <div class="bl_halfMedia bl_shopPet">
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
                <a class="el_btn el_btn__shopDetail" href="<?php echo esc_url(home_url()); ?>/tag/umeda">この店舗の猫を見る</a>
              </div>
              <figure class="bl_halfMedia_imgWrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/shop/umeda-scaled.jpg" alt="梅田店" width="424" height="232">
              </figure>
            </div>

          <?php
          } else if ($tag->name == "静岡店") { ?>
            <div class="bl_halfMedia bl_shopPet">
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
                <a class="el_btn el_btn__shopDetail" href="<?php echo esc_url(home_url()); ?>/tag/shizuoka">この店舗の猫を見る</a>
              </div>
              <figure class="bl_halfMedia_imgWrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/shop/shizuoka-scaled.jpg" alt="静岡店" width="424" height="232">
              </figure>
            </div>

          <?php
          } else if ($tag->name == "福岡店") { ?>
            <div class="bl_halfMedia bl_shopPet">
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
                <a class="el_btn el_btn__shopDetail" href="<?php echo esc_url(home_url()); ?>/tag/fukuoka">この店舗の猫を見る</a>
              </div>
              <figure class="bl_halfMedia_imgWrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/shop/fukuoka-scaled.jpg" alt="福岡店" width="424" height="232">
              </figure>
            </div>

          <?php
          } else { ?>
            <div class="bl_halfMedia bl_shopPet">
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
                <a class="el_btn el_btn__shopDetail" href="<?php echo esc_url(home_url()); ?>/tag/kagoshima">この店舗の猫を見る</a>
              </div>
              <figure class="bl_halfMedia_imgWrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/shop/kagosima-scaled.jpg" alt="鹿児島店" width="424" height="232">
              </figure>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </section>
    <section class="ly_section ly_section__attention">
      <div class="ly_sectionInner">
        <h3 class="bl_attentionHeading">ほかにもこんな猫種が注目されています！</h3>
        <ul class="bl_cardUnit bl_cardUnit__col4Pet hp_pr100 hp_pl0">
          <?php
          $the_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'order' => 'DESC',
          ));
          if ($the_query->have_posts()) :
          ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="bl_card">
                <h3 class="bl_card_ttl">
                  <a class="bl_card_link" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 17, '...'); ?></a>
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
      </div>
    </section>
  </main>
  <?php get_template_part('template-parts/footer', 'content'); ?>
  <?php get_footer(); ?>
</body>

</html>
