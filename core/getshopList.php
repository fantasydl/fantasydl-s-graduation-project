<?php
require_once '../include.php';

$category = $_GET["category"];
$special = $_GET["special"];

if(empty($category)){
	$sql = "select * from shops where special = '${special}'";
}else if(empty($special)){
	$sql = "select * from shops where category = '${category}'";
}else{
	$sql = "select * from shops where category = '${category}' and special = '${special}'";
}



$row = fetchAll($sql);


for($x = 0;$x < count($row);$x++){
	$shopid = $row[$x]['shopid'];
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

	$row[$x]['commentsum'] = $sum;
	$row[$x]['avg_score1'] = number_format($avg_score1,1);
	$row[$x]['avg_score2'] = number_format($avg_score2,1);
	$row[$x]['avg_score3'] = number_format($avg_score3,1);
	$row[$x]['avg_cost'] = number_format($avg_cost,1);

	$sql = "select * from comments where shopid = '${shopid}' order by date desc limit 0,1";

	$rowrowrow = fetchOne($sql);

	$row[$x]['newcomment'] = $rowrowrow['content'];
}

if($row){
	echo json_encode($row);
}else{
	echo "failed";
}

?>