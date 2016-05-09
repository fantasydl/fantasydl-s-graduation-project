<?php
require_once '../include.php';

$str = file_get_contents("php://input");

$arr = json_decode($str, true);

$userid = $arr['userid'];

unset($arr['userid']);

if($row = update("users", $arr, "userid=${userid}")){
	echo json_encode($row);
}else{
	echo "failed";
}
