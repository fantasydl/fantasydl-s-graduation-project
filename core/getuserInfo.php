<?php
require_once '../include.php';

$userid = $_GET["userid"];

$sql = "select * from users where userid = '${userid}'";

$row = fetchOne($sql);

if($row){
	echo json_encode($row);
}else{
	echo "failed";
}

