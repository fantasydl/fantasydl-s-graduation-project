<?php
require_once '../include.php';

$fileInfo=$_FILES['file'];
$info=uploadFile();
for($i = 0;$i < count($info);$i++){
	$result[$i]['icon'] = $info[$i]['name'];
}
echo json_encode($result);