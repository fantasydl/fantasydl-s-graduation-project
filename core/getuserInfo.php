<?php
require_once '../include.php';

$username = $_GET["username"];

$sql = "select * from users where username = '${username}'";

$row = fetchOne($sql);

if($row){
	echo json_encode($row);
}else{
	echo "failed";
}

?>