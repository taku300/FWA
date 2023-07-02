/**
 * 入力欄追加処理
 */
$(function() {
    // ボタン制御
    // お知らせ資料追加ボタン
    var newsId = $('#news-id').data('news-id')
    $('.js-add-document').on('click', function() {
        var newListNum = $(this).parent().parent().children().length - 1;
        // HTMLのコピー作成
        var clone = $(this).parent().clone(true);
        var label = clone.find('label');
        // コピーしたinput定義
        var input = clone.children('input');

        if ($(this).parent().parent().children().length == 1) {
            $(this).parent().find('label').addClass('hidden')
            $(this).parent().find('button').addClass('hidden')
        }
        // コピーしたinputに値が履いている場合引き継がれるので空にする
        console.log(input.eq(0));
        label.attr('for', `news_documents[${newListNum}][title]`);
        label.attr('name', `news_documents[${newListNum}][title]`);
        input.val('');
        input.eq(0).attr('name', `news_documents[${newListNum}][id]`);
        input.eq(0).val(null);
        input.eq(1).attr('id', `news_documents[${newListNum}][title]`);
        input.eq(1).attr('name', `news_documents[${newListNum}][title]`);
        input.eq(1).removeClass('hidden');
        input.eq(2).attr('name', `news_documents[${newListNum}][document_file]`);
        input.eq(2).removeClass('hidden');
        input.eq(3).attr('name', `news_documents[${newListNum}][document_path]`);
        input.eq(4).attr('name', `news_documents[${newListNum}][news_id]`);
        input.eq(4).val(newsId);
        clone.find('button').removeClass('hidden');

        // 作成したHTML要素を追加
        clone.appendTo($(this).parent().parent());
    });

    // お知らせリンク追加ボタン
    $('.js-add-link').on('click', function() {
        var newListNum = $(this).parent().parent().children().length - 1;
        // HTMLのコピー作成
        var clone = $(this).parent().clone(true);
        var label = clone.find('label');
        // コピーしたinput定義
        var input = clone.children('input');

        if ($(this).parent().parent().children().length == 1) {
            $(this).parent().find('label').addClass('hidden')
            $(this).parent().find('button').addClass('hidden')
        }
        // コピーしたinputに値が履いている場合引き継がれるので空にする
        console.log(input.eq(0));
        label.attr('for', `news_links[${newListNum}][title]`);
        label.attr('name', `news_links[${newListNum}][title]`);
        input.val('');
        input.eq(0).attr('name', `news_links[${newListNum}][id]`);
        input.eq(0).val(null);
        input.eq(1).attr('id', `news_links[${newListNum}][title]`);
        input.eq(1).attr('name', `news_links[${newListNum}][title]`);
        input.eq(1).removeClass('hidden');
        input.eq(2).attr('name', `news_links[${newListNum}][link_path]`);
        input.eq(2).removeClass('hidden');
        input.eq(3).attr('name', `news_links[${newListNum}][news_id]`);
        input.eq(3).val(newsId);
        clone.find('button').removeClass('hidden');

        // 作成したHTML要素を追加
        clone.appendTo($(this).parent().parent());
    });

    // お知らせ画像追加ボタン
    $('.js-add-image').on('click', function() {
        var newListNum = $(this).parent().parent().children().length - 1;
        // HTMLのコピー作成
        var clone = $(this).parent().clone(true);
        var label = clone.find('label');
        // コピーしたinput定義
        var input = clone.children('input');

        if ($(this).parent().parent().children().length == 1) {
            $(this).parent().find('label').addClass('hidden')
            $(this).parent().find('button').addClass('hidden')
        }
        // コピーしたinputに値が履いている場合引き継がれるので空にする
        console.log(input.eq(0));
        label.attr('for', `news_images[${newListNum}][news_image_path]`);
        label.attr('name', `news_images[${newListNum}][news_image_path]`);
        input.val('');
        input.eq(0).attr('name', `news_images[${newListNum}][id]`);
        input.eq(0).val(null);
        input.eq(1).attr('name', `news_images[${newListNum}][news_image_path]`);
        input.eq(1).removeClass('hidden');
        input.eq(2).attr('name', `news_images[${newListNum}][news_id]`);
        input.eq(2).val(newsId);
        clone.find('button').removeClass('hidden');

        // 作成したHTML要素を追加
        clone.appendTo($(this).parent().parent());
    });

    // 削除ボタン
    $('.js-del').on('click', function() {
        console.log($(this).parent().parent().children().length)
        if ($(this).parent().parent().children().length == 2) {
            $(this).parent().parent().find('label').removeClass('hidden')
            $(this).parent().parent().find('button').eq(0).removeClass('hidden')
        }
        var target = $(this).parent();
            target.remove();
    });

    // fileの値変更時にボタン表示
    $('.file').on('change', function(){
        fileName = $(this).prop('files')[0].name;
        console.log(fileName);
        $(this).parent().children('input').eq(3).val(fileName);
    });
    $('.path').on('input', function(){
        $(this).parent().children('button').show();
    });
});
