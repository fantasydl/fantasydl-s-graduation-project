<?php
require_once '../include.php';

$sql = "select * from travels";

$row = fetchAll($sql);

for($x = 0;$x < count($row);$x++){
	$userid = $row[$x]['userid'];
	$sql = "select * from users where userid = '${userid}'";

	$rowrow = fetchOne($sql);

	$row[$x]['authorname'] = $rowrow['nickname'];
	$row[$x]['authorcover'] = $rowrow['icon'];

	$travelid = $row[$x]['travelid'];

	$sql = "select * from tcomments where travelid = '${travelid} order by date desc limit 0,1'";

	$rowrowrow = fetchOne($sql);

	$userid = $rowrowrow['userid'];
	$row[$x]['newcommentuserid'] = $rowrowrow['userid'];
	$row[$x]['newcommentusercontent'] = $rowrowrow['content'];

	$sql = "select * from users where userid = '${userid}'";

	$rowrowrowrow = fetchOne($sql);
	$row[$x]['newcommentusername'] = $rowrowrowrow['nickname'];
	$row[$x]['newcommentusericon'] = $rowrowrowrow['icon'];
}

if($row){
	echo json_encode($row);
}else{
	echo "failed";
}

