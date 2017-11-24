function del(no)
{
	$.post("notice_del.php",
    {
        no:no
    },
    function(data, status){
        alert('삭제가 완료되었습니다.');
        location.reload();
    });
}

function update(no,cnt)
{
	$.post("notice_update.php",
    {
        no:no,
        title:encodeURI($('#'+cnt+"title").val()),
        content:encodeURI($('#'+cnt+"content").val())
    },
    function(data, status){
        alert('업데이트 완료되었습니다.');
        location.reload();
    });
}

function save()
{
    var title=$('#stitle').val();
    var content=$('#scontent').val();
    
    $.post("notice_insert.php",
    {
        title:encodeURI(title),
        content:encodeURI(content)
    },
    function(data, status){
        alert("저장이 완료되었습니다.");
        location.reload();
    });
}