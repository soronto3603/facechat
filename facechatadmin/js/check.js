function chgstate(no,id){

	var proc=$("#"+id+"state").val();
	$.post("check_update.php",
    {
        no:no,
        proc:proc
    },
    function(data, status){
        alert('상태 변경이 완료되었습니다.');
        location.reload();
    });

}

function del(no)
{
    $.post("check_del.php",
    {
        no:no
    },
    function(data, status){
        alert('삭제가 완료되었습니다.');
        location.reload();
    });
}