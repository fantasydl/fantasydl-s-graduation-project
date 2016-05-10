<?php
require_once '../include.php';

$sql = "select * from shops where category = '景点' order by comcount desc limit 0,5";

$row = fetchAll($sql);

$result['view'] = $row;


$sql = "select * from shops where category = '美食' order by comcount desc limit 0,5";

$rowrow = fetchAll($sql);

$result['food'] = $rowrow;

echo json_encode($result);
