<?php
require_once '../include.php';

$userid = $_GET['userid'];

$sql = "select shopid from comments where userid = '${userid}' and score >= 4.0";

$row = fetchAll($sql);

$temp = array();

$result = array();

for($x = 0;$x < count($row);$x++){
	$shopid = (int)$row[$x]['shopid'];

	$sql = "select userid from comments where shopid = '${shopid}' and score >= 3.0 and userid <> '${userid}' group by userid";

	$rowrow = fetchAll($sql);


	for($y = 0;$y < count($rowrow);$y++){
		$userid2 = (int)$rowrow[$y]['userid'];

		$sql = "select shopid from comments where userid = '${userid2}' and shopid <> '${shopid}' and score >= 3.0 group by shopid";

		$rowrowrow = fetchAll($sql);

		for($z = 0;$z <count($rowrowrow);$z++){
			
			array_push($temp, $rowrowrow[$z]);
		}
	}
}

for($x = 0;$x < count($temp);$x++){
	$shopid = (int)$temp[$x]['shopid'];

	$sql = "select * from shops where shopid = '${shopid}'";

	$ttt = fetchOne($sql);

	$flag = true;
	for($y = 0;$y < count($result);$y++){
		if($ttt['shopid'] == $result[$y]['shopid']){
			$flag = false;
			break;
		}
	}

	if($flag){
		array_push($result, $ttt);
	}
}

for($x = 0;$x < count($result);$x++){
	$shopid = $result[$x]['shopid'];
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

	$result[$x]['commentsum'] = $sum;
	$result[$x]['avg_score1'] = number_format($avg_score1,1);
	$result[$x]['avg_score2'] = number_format($avg_score2,1);
	$result[$x]['avg_score3'] = number_format($avg_score3,1);
	$result[$x]['avg_cost'] = number_format($avg_cost,1);

	$sql = "select * from comments where shopid = '${shopid}' order by date desc limit 0,1";

	$rowrowrow = fetchOne($sql);

	$result[$x]['newcomment'] = $rowrowrow['content'];
}

echo json_encode($result);