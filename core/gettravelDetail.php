<?php
require_once '../include.php';

$travelid = $_GET["travelid"];

$sql = "select * from travels where travelid = '${travelid}'";

$row = fetchOne($sql);

$userid = $row['userid'];

$sql = $sql = "select * from users where userid = '${userid}'";

$rowrow = fetchOne($sql);

$row['authorname'] = $rowrow['nickname'];
$row['authoricon'] = $rowrow['icon'];
$row['authorinfo'] = $rowrow['introduce'];

if($row){
	echo json_encode($row);
}else{
	echo 'failed';
}

