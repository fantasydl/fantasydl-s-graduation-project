<?php
require_once '../include.php';

$shopid = $_GET["shopid"];

if($shopid == 0){
	$sql = "select * from commentlist order by date desc limit 0,3";
}else{
	$sql = "select * from commentlist where shopid = '${shopid}'";
}

$row = fetchAll($sql);

for($x = 0;$x < count($row);$x++){
	$commentid = $row[$x]['commentid'];

	$sql = "select albums from comments where commentid = '${commentid}'";

	$rowrow = fetchOne($sql);

	$row[$x]['albums'] = $rowrow['albums'];
}

if($row){
	echo json_encode($row);
}else{
	echo "failed";
}
