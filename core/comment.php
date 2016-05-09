<?php
require_once '../include.php';

$str = file_get_contents("php://input");

$arr = json_decode($str, true);

if(insert("comments", $arr)){
	echo "success";
}else{
	echo "failed";
}
