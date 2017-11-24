function imgclick(obj)
{
	window.open(obj.src,'_blank');
}

function del(no)
{
	$.post("member_del.php",
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
	$.post("member_update.php",
    {
        no:no,
        name:$('#'+cnt+"name").val(),
        sex:$('#'+cnt+"sex").val(),
        age:$('#'+cnt+"age").val(),
        topic:encodeURI($('#'+cnt+"loc").val()),
        phone:$('#'+cnt+"phone").val(),
				like:$('#'+cnt+"likes").val(),
        point:$('#'+cnt+"points").val(),
        lat:$('#'+cnt+"lat").val(),
        lng:$('#'+cnt+"lng").val()
    },
    function(data, status){
        alert('업데이트 완료되었습니다.');
        location.reload();
    });
}

function chat(id,name)
{
    alert(id+"__"+name+"과 채팅하기");
}

function save(){
    if(pfurl)
    {
        var nick=$("#nick").val();
        var sex=$("#sex").val();
        var age=$("#age").val();
        var topic=$("#topic").val();
        var phone=$("#phone").val();
        var point=$("#point").val();
        var lat=$("#lat").val();
        var lng=$("#lng").val();
        if(nick&&sex&&age&&topic&&phone&&point&&lat&&lng){
            $.post("member_insert.php",
            {
                nick:nick,
                pfurl:pfurl,
                sex:sex,
                age:age,
                topic:topic,
                phone:phone,
                point:point,
                lat:lat,
                lng:lng
            },
            function(data, status){
                alert('회원추가가 완료되었습니다.');
                pfurl='';
                location.reload();
            });
        }else{
            alert('내용을 채워주세요.');
        }

    }else{
        alert('프로필 사진을 선택해주세요.');
    }
}
