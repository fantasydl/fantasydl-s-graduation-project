<?php
require_once '../include.php';

$keywords = $_GET["keywords"];

$sql = "select * from shops where shopname like '%${keywords}%' or special like '%${keywords}%' or category like '%${keywords}%'";

$row = fetchAll($sql);

for($x = 0;$x < count($row);$x++){
	$row[$x]['isshop'] = true;
	$data[] = $row[$x];
}

$sql = "select * from travels where title like '%${keywords}%' or content like '%${keywords}%'";

$rowrow = fetchAll($sql);

for($y = 0;$y < count($rowrow);$y++){
	$rowrow[$y]['isshop'] = false;
	$data[] = $rowrow[$y];
}

echo json_encode($data);