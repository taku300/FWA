$(document).ready(function () {
    //////////////////////
    //top-heroの切り替え
    const images = $('.top-image')
    let imageIndex = -1;
    images.hide()
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
