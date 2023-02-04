$(function() {
    // ボタン制御
    if($('#del-flg').val() == null){
        $('#addButton').hidden();
    }else if ($('#del-flg').val() != null){
        $('#addButton').show();
    }
    // input追加
    $('#addButton').on('click', function() {
        $('#del-flg').removeAttr('id');
        $('div div').append('<input id="del-flg">');
    })
});