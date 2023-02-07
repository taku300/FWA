$(document).ready(function () {
    //////////////////////
    //ヘッダーの透明度の調整
    var $headerParts = $(".js-header-parts");
    console.log($(window).scrollTop());
    //初期位置が482より下だった時
    if ($(window).scrollTop() >= 482) {
        $headerParts.removeClass("opacity-60");
    }
    //スクロールした時
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 482) {
            $headerParts.removeClass("opacity-60");
        } else {
            $headerParts.addClass("opacity-60");
        }
    });
    //////////////////////


    //////////////////////
    //top-heroの切り替え
    const images = $('.top-image');
    let imageIndex = -1;
    images.hide();
    showNextImage();
    //////////////////////


    //////////////////////
    // ハンバーガーメニュー
    var $showSideMenu = $("#show-side-menu");
    var $sideMenu = $("#side-menu");
    // ハンバーガーメニューフェードイン
    $showSideMenu.click(function () {
        $sideMenu.fadeIn();
    })
    // ハンバーガーメニューフェードアウト
    $sideMenu.children().children().eq(0).click(function (e) {
        $sideMenu.fadeOut();
    })
    //////////////////////

       //////////////////////
    // 検索メニュー
    var $showSearchMenu = $("#show-search-menu");
    var $searchMenu = $("#search-menu");
    // 検索メニューフェードイン
    $showSearchMenu.click(function () {
        $searchMenu.fadeIn();
    })
    // 検索メニューフェードアウト
    $searchMenu.children().children().eq(0).click(function (e) {
        $searchMenu.fadeOut();
    })
    //////////////////////



    /////////////
    //function///
    /////////////

    //////////////////////
    //function top-hero
    function showNextImage() {
        imageIndex++;
        images.eq(imageIndex % images.length).fadeIn(800).delay(5000).fadeOut(300,showNextImage);
    }
    //////////////////////
});
