<!--
  Template Name: 店舗一覧
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: https://ogp.me/ns/article#">
  <?php get_header(); ?>
</head>

<body class="ly_under js_noScroll">
  <?php get_template_part('template-parts/loading'); ?>
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/shop/sapporo-scaled.jpg" alt="札幌店" width="474" height="260">
          </figure>
        </div>
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/shop/miyagi-scaled.jpg" alt="宮城店" width="474" height="260">
          </figure>
        </div>
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/shop/sinjyuku.jpg" alt="新宿店" width="474" height="260">
          </figure>
        </div>
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/shop/ishikawa.jpg" alt="石川店" width="474" height="260">
          </figure>
        </div>
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/shop/umeda-scaled.jpg" alt="梅田店" width="474" height="260">
          </figure>
        </div>
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/shop/shizuoka-scaled.jpg" alt="静岡店" width="474" height="260">
          </figure>
        </div>
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/shop/fukuoka-scaled.jpg" alt="福岡店" width="474" height="260">
          </figure>
        </div>
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/shop/kagosima-scaled.jpg" alt="鹿児島店" width="474" height="260">
          </figure>
        </div>
      </div>
    </section>
  </main>
  <?php get_template_part('template-parts/footer', 'content'); ?>
  <?php get_footer(); ?>
</body>

</html>
