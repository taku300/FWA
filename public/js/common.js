$(document).ready(function () {
    //////////////////////
    //ヘッダーの透明度の調整
    var $headerLeftParts = $("#header-left-parts");
    console.log($(window).scrollTop());
    //初期位置が482より下だった時
    if ($(window).scrollTop() >= 482) {
        $headerLeftParts.removeClass("opacity-60");
    }
    //スクロールした時
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 482) {
            $headerLeftParts.removeClass("opacity-60");
        } else {
            $headerLeftParts.addClass("opacity-60");
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
    var $hamburger = $("#hamburger");
    var $sideMenu = $("#side-menu");
    // ハンバーガーメニューフェードイン
    $hamburger.click(function () {
        $sideMenu.fadeIn();
    })
    // ハンバーガーメニューフェードアウト
    $sideMenu.children().children().eq(0).click(function (e) {
        $sideMenu.fadeOut();
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
