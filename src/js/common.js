// 使用例
// export function 関数名(){
//   スクリプト
// }

export function common() {
  // iOSのブラウザバック時に強制リロード
  // 参考→https://stray-light.info/wp/ios-safari-backbutton/
  window.onpageshow = (event) => {
    if (event.persisted) {
      window.location.reload();
    }
  };

  $(window).on('load', function () {
    // 1秒かけてテキストを表示
    $('.js_lv2Heading__fv').css({ opacity: '1', transition: '1s' });
    $('.js_fvContent_txt').css({ opacity: '1', transition: '1s' });
    $('.js_fvBtn_wrap').css({ opacity: '1', transition: '1s' });
    $('.js_section_innerInfo').css({ opacity: '1', transition: '1s' });
    $(function () {
      setTimeout(function () {
        // 1秒後にis_activeクラスを付与
        $('.js_lv2Heading__fv').addClass('is_active');
        $('.js_fvContent_txt').addClass('is_active');
        $('.js_fvBtn_wrap').addClass('is_active');
        $('.js_section_innerInfo').addClass('is_active');
      }, 1000)
      setTimeout(function () {
        // お知らせの背景にborder-radiusを適用
        $('.js_section_innerInfo').css({ borderRadius: '16px' });
      }, 2000)
    })
  });

  // ローディングアニメーション
  // 参考→https://www.webcreatorbox.com/tech/loading-animation
  window.onload = () => {
    const loader = document.getElementById('js_loading');
    loader.classList.add('is_active');
  };

  // フェードインアニメーション
  $(function () {
  // aimation呼び出し(ページ内にjs_fadeUpクラスが存在した場合は「true」)
  if ($('.js_fadeUp').length) {
    scrollAnimation();
  }
  // aimation関数
  function scrollAnimation() {
    $(window).scroll(function () {
      $('.js_fadeUp').each(function () {
        // ページ内の全トリガー要素js_fadeUpに対して以下の処理を実行
        let position = $(this).offset().top,// クラスが付与されている要素のtopからの高さを取得
          scroll = $(window).scrollTop(),// ブラウザのスクロール位置を取得
          windowHeight = $(window).height();// windowの高さを取得
        if (scroll > position - windowHeight + 150) {
          $(this).addClass('is_active');
        }
      });
    });
  }
    $(window).trigger('scroll');
  });

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
    // 最初の８件は削除
    $('.bl_cardUnit__col3Pet > .bl_card:nth-of-type(-n+8)').remove();
    let moreNum = 6;
    $('.bl_cardUnit__col3Pet .bl_card:nth-child(n + ' + (moreNum + 1) + ')').addClass('is_active');
    $('.js_morePet').on('click', function () {
      $('.bl_cardUnit__col3Pet .bl_card.is_active').slice(0, 6).removeClass('is_active');
      if ($('.bl_cardUnit__col3Pet .bl_card.is_active').length == 0) {
        $('.js_morePet').fadeOut();
      }
    });
  });

  // 猫詳細ページの画像切り替え
  $(window).on('load', function () {
    // 最初のliにis_activeを追加
    $('.bl_mediaCat_imgItem:first-of-type').addClass('is_active');
  });
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
