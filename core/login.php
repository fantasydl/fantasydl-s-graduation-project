<?php
require_once '../include.php';

$username = $_GET["username"];
$userpsw = $_GET["userpsw"];

$sql = "select * from users where username = '${username}' and userpsw = '${userpsw}'";

$row = fetchOne($sql);

if($row){
	echo $row['username'];
}else{
	echo "failed";
}

?>