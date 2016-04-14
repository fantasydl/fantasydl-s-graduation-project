<?php
require_once '../include.php';

$shopid = $_GET["shopid"];

if($shopid == 0 || empty($shopid)){
	echo 'failed';
}else{
	$sql = "select * from shops where shopid = '${shopid}'";

	$row = fetchOne($sql);

	if($row){
		echo json_encode($row);
	}else{
		echo "failed";
	}
}

?>