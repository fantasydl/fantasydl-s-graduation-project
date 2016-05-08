<?php
require_once '../include.php';

$shopid = $_GET["shopid"];

if($shopid == 0){
	$sql = "select * from commentlists order by date desc limit 0,3";
}else{
	$sql = "select * from commentlists where shopid = '${shopid}'";
}

$row = fetchAll($sql);

if($row){
	echo json_encode($row);
}else{
	echo "failed";
}
