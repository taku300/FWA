/**
 * 入力欄追加処理
 */
$(function() {
    // ボタン制御
    // 追加ボタン
    $('.add').on('click', function() {
        // HTMLのコピー作成
        var clone = $(this).parent().clone(true);
        // id='count'内の要素数をカウント 判定用
        var count = $('#count div').length;
        // コピーしたボタンをhidden
        clone.children('button').hide(); // TODO:一括処理
        // コピーしていないボタンをhidden
        $('#count button').hide(); // TODO:一括処理
        // 親要素にid付与 判定用
        $(this).parent().attr('id', count);
        // コピーしたinput定義
        var input = clone.children('input');
        // コピーしたinputに値が履いている場合引き継がれるので空にする
        input.val('');
        // コピーした要素にid付与 判定用
        input.attr('id', count);
        // 作成したHTML要素を追加
        clone.insertAfter($(this).parent());
    });
    // 削除ボタン
    $('.del').on('click', function() {
        var target = $(this).parent();
        if (target.parent().children().length > 1) {
            target.remove();
        }
    });
    // fileの値変更時にボタン表示
    $('.file').on('change', function(){
        $(this).parent().children('button').show();
    });
});