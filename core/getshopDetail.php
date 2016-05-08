<?php
require_once '../include.php';

$shopid = $_GET["shopid"];

if($shopid == 0 || empty($shopid)){
	echo 'failed';
}else{
	$sql = "select * from shops where shopid = '${shopid}'";

	$row = fetchOne($sql);

	$sql = "select * from comments where shopid = '${shopid}'";

	$rowrow = fetchAll($sql);

	$sum = 0;
	$avg_cost = 0;
	$avg_score1 = 0;
	$avg_score2 = 0;
	$avg_score3 = 0;
	for($y = 0;$y < count($rowrow);$y++){
		$sum++;
		$avg_cost = $avg_cost + $rowrow[$y]['percost'];
		$avg_score1 = $avg_score1 + $rowrow[$y]['score1'];
		$avg_score2 = $avg_score2 + $rowrow[$y]['score2'];
		$avg_score3 = $avg_score3 + $rowrow[$y]['score3'];
	}
	$avg_cost = $avg_cost/count($rowrow);
	$avg_score1 = $avg_score1/count($rowrow);
	$avg_score2 = $avg_score2/count($rowrow);
	$avg_score3 = $avg_score3/count($rowrow);

	$row['commentsum'] = $sum;
	$row['avg_score1'] = number_format($avg_score1,1);
	$row['avg_score2'] = number_format($avg_score2,1);
	$row['avg_score3'] = number_format($avg_score3,1);
	$row['avg_cost'] = number_format($avg_cost,1);

	if($row){
		echo json_encode($row);
	}else{
		echo "failed";
	}
}

