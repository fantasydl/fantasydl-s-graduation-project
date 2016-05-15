<?php
require_once '../include.php';

$username = $_GET["username"];

$sql = "select * from users where username = '${username}'";

if(fetchOne($sql)){
	echo 'failed';
}