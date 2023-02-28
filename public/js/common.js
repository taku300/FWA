$(document).ready(function () {
    /**
     * 共通
     */
    $("input"). keydown(function(e) {
        if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
            return false;
        } else {
            return true;
        }
    });

    /**
     * ロゴ背景の透明度の調整
     */
    var $headerPartsLoge = $(".js-header-parts-logo");
    console.log('ScrollTop is ' + $(window).scrollTop());

    /**
     * 初期位置が482より下だった時
     */
    if ($(window).scrollTop() >= 550) {
        $headerPartsLoge.addClass("hidden");
    }

    /**
     * スクロールした時
     */
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 550) {
            $headerPartsLoge.addClass("hidden");
        } else {
            $headerPartsLoge.removeClass("hidden");
        }
    });

    /**
     * top-heroの切り替え
     */
    const images = $('.top-image');
    let imageIndex = -1;
    images.hide();
    showNextImage();

    /**
     * ハンバーガーメニュー
     */
    var $showSideMenu = $("#show-side-menu");
    var $sideMenu = $("#side-menu");

    /**
     * ハンバーガーメニューフェードイン
     */
    $showSideMenu.click(function () {
        $sideMenu.fadeIn();
    })

    /**
     * ハンバーガーメニューフェードアウト
     */
    $sideMenu.children().children().eq(0).click(function (e) {
        $sideMenu.fadeOut();
    })

    /**
     * ハンバーガーメニューの透明度の調整
     */
    var $headerParts = $(".js-header-parts");

    /**
     * 初期位置が482より下だった時
     */
    if ($(window).scrollTop() >= 650) {
        $headerParts.removeClass("opacity-60");
    }

    /**
     * スクロールした時
     */
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 650) {
            $headerParts.removeClass("opacity-60");
        } else {
            $headerParts.addClass("opacity-60");
        }
    });

    /**
     * フラッシュメッセージ
     */
    var $flashMessage = $("#js-flash-message");
    var $flashMessageDelete = $("#js-flash-message-delete");
    $flashMessageDelete.click(function () {
        $flashMessage.addClass('hidden');
    })

    /**
     * 検索メニューフェードイン
    */
    var $showSearchMenu = $("#show-search-menu");
    var $searchMenu = $("#search-menu");
    $showSearchMenu.click(function () {
        $searchMenu.fadeIn();
    })

    /**
     * 検索メニューフェードアウト
     */
    $searchMenu.children().children().eq(0).click(function (e) {
        $searchMenu.fadeOut();
    })

    /**
     * function
     *
     * function top-hero
     */
    function showNextImage() {
        imageIndex++;
        images.eq(imageIndex % images.length).fadeIn(800).delay(5000).fadeOut(300,showNextImage);
    }


    /**
     * function
     *
     * function showModal $fadeoutModal
     */
    var $showModal = $('.js-show-modal');
    var $fadeoutModal = $('.js-fadeout-modal');
    var $slideUpAnimationModal = $('#hs-slide-up-animation-modal');
    $showModal.click(function () {
        $slideUpAnimationModal.removeClass('hidden');
    })
    $fadeoutModal.click(function () {
        $slideUpAnimationModal.addClass('hidden');
    })

    var $affiliationSubmit = $('.js-affiliation-submit');
    var $affiliationInput = $('.js-affiliation-input');
    var $affiliationSelection = $('select[name="affiliation_id"]');
    console.log($affiliationSelection);
    $affiliationSubmit.click(function () {
        if ($affiliationInput.val() === '') {
            alert("テキストを入力してください");
            return false;
        } else {
            //   alert("送信しました");
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
                $.ajax({
                    //POST通信
                    type: "post",
                    //ここでデータの送信先URLを指定します。
                    url: "/admins/affiliations",
                    dataType: "json",
                    data: {
                        name: $affiliationInput.val(),
                    },
                })
                //通信が成功したとき
                .then((res) => {
                    console.log(res);
                    $slideUpAnimationModal.addClass('hidden');
                    $affiliationSelection.append(`<option value="${res.affiliationId}">${res.name}</option>`)
                })
                //通信が失敗したとき
                .fail((error) => {
                    alert("エラーが発生しました。");
                    console.log(error.statusText);
                    $slideUpAnimationModal.addClass('hidden');
                });
        }
    })

});
