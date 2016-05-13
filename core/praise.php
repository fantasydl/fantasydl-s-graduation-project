<?php
require_once '../include.php';

$str = file_get_contents("php://input");

$arr = json_decode($str, true);

$commentid = $arr['commentid'];

$isCom = $arr['isCom'];

$arr = array();

$arr['praise'] = 'praise+1';

if($isCom){
	if(update("comments", $arr, "commentid=${commentid}")){
		echo "success";
	}else{
		echo "failed";
	}
}else{
	if(update("tcomments", $arr, "commentid=${commentid}")){
		echo "success";
	}else{
		echo "failed";
	}
}
