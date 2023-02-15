/**
 * 入力欄追加処理
 */
$(function() {
    // ボタン制御
    var i = 0;
    $('.add').on('click', function() {
        i = i + 1;
        var clone = $(this).parent().clone(true);
        var input = clone.children('input');
        input.attr('name', 'news_documents[0][title]' + i);
        clone.insertAfter($(this).parent());
    });
    $('.del').on('click', function() {
        var target = $(this).parent();
        if (target.parent().children().length > 1) {
            target.remove();
        }
    });
});
