<?php
require_once '../include.php';

$travelid = $_GET["travelid"];

$sql = "select * from travels where travelid = '${travelid}'";

$row = fetchOne($sql);

if($row){
	echo json_encode($row);
}else{
	echo 'failed';
}

