<?php
require_once '../include.php';

$travelid = $_GET["travelid"];

$sql = "select * from tcomments where travelid = '${travelid}'";

$row = fetchAll($sql);

for($x = 0;$x < count($row);$x++){
	$userid = $row[$x]['userid'];

	$sql = "select * from users where userid = '${userid}'";

	$rowrow = fetchOne($sql);

	$row[$x]['username'] = $rowrow['nickname'];
	$row[$x]['usericon'] = $rowrow['icon'];
}

if($row){
	echo json_encode($row);
}else{
	echo "failed";
}
