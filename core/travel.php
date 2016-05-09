<?php
require_once '../include.php';

$str = file_get_contents("php://input");

$arr = json_decode($str, true);

$travelid = $arr['travelid'];

if($travelid){
	if($row = update("travels", $arr, "travelid={$travelid}")){
		echo json_encode($row);
	}else{
		echo "failed";
	}
}else{
	if(insert("travels", $arr)){
		echo "success";
	}else{
		echo "failed";
	}
}
