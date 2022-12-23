$(document).ready(function () {
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

});
s
