$(function() {
    // ボタン制御
    if($('#del-flg').val() == null){
        $('#del-flg').attr('id', 'del-flg');
        $('#addButton').hidden();
    }else if ($('#del-flg').val() != null){
        $('#del-flg').removeAttr('id');
        $('#addButton').show();
    }
});