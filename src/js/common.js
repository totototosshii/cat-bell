// 使用例
// export function 関数名(){
//   スクリプト
// }

export function common() {
  // iOSのブラウザバック時に強制リロード
  // 参考→https://stray-light.info/wp/ios-safari-backbutton/
  window.onpageshow = function (event) {
    if (event.persisted) {
      window.location.reload();
    }
  };

  // ドロワー
  $('.js_drawerBtn').on('click', function () {
    $(this).toggleClass('is_active');
    $('.js_headerNav').toggleClass('is_active');
    $('.js_noScroll').toggleClass('is_active');
  });

  // ヘッダースクロール時に背景追加
  $(window).on('scroll', function () {
    if ($('.js_headerScroll').height() < $(this).scrollTop()) {
      $('.js_headerScroll').addClass("is_active");
    } else {
      $('.js_headerScroll').removeClass("is_active");
    }
  });

  // 「すべての猫種一覧を見る」をクリックしたら６件ずつ追加で表示
  $(function () {
    let moreNum = 12;
    $('.bl_cardUnit__col3Pet .bl_card:nth-child(n + ' + (moreNum + 1) + ')').addClass('is_active');
    $('.js_morePet').on('click', function () {
      $('.bl_cardUnit__col3Pet .bl_card.is_active').slice(0, moreNum).removeClass('is_active');
      if ($('.bl_cardUnit__col3Pet .bl_card.is_active').length == 0) {
        $('.js_morePet').fadeOut();
      }
    });
  });

  // 猫詳細ページの画像切り替え
  $(function () {
    // サブ画像がクリックされた時
    $('.bl_mediaCat_imgItem img').on('click', function () {
      // クリックされたサブ画像のsrcを変数imgに代入
      let img = $(this).attr('src');
      // サブの[.bl_mediaCat_imgItem.is_active img]から[.is_active]を削除（ボーダーが消える）
      $('.bl_mediaCat_imgItem').removeClass('is_active');
      // クリックされたサブ画像の親要素[.bl_mediaCat_imgItem]に[.is_active]を追加（ボーダーが付く）
      $(this).parent().addClass('is_active');
      // メイン画像を0.05秒かけてフェードアウト
      $('.bl_mediaCat_img img').fadeOut(50, function () {
        // メイン画像のsrcに、クリックされたサブ画像のsrcを読み込んでフェードイン
        $('.bl_mediaCat_img img').attr('src', img).on('load', function () {
          $(this).fadeIn();
        });
      });
    });
  });

}
