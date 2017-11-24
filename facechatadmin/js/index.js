
function menuclick(obj) {
	if(obj.id=="m1"){ $("#ifr").attr('src','member.php'); }
	else if(obj.id=="m2"){ $("#ifr").attr('src','chat.php'); }
	else if(obj.id=="m3"){ $("#ifr").attr('src','point.php'); }
	else if(obj.id=="m4"){ $("#ifr").attr('src','check.php'); }
	else if(obj.id=="m5"){ $("#ifr").attr('src','notice.php'); }
	else if(obj.id=="m6"){ $("#ifr").attr('src','qna.php'); }
	else if(obj.id=="header"){ $("#ifr").attr('src','start.htm'); }
}