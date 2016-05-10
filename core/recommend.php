<?php
require_once '../include.php';

$useid = $_GET['userid'];

$sql = "select userid,shopid,score from comments where userid = '${userid}'";

$array = fetchAll($sql);

$cos = array();  
$cos[0] = 0;  
$fm1 = 0;  

for($i=1;$i<count($array);$i++){  
    if($array[$i]['userid'] == $userid){  
        $rank = $i;
        return;
    }  
}

$temp = count($array[$rank]);

//开始计算cos  
//计算分母1  
for($i=1;$i<$temp;$i++){  
    if($array[$rank][$i] != null){ 
        $fm1 += $array[$rank][$i] * $array[$rank][$i];  
    }  
}  
  
$fm1 = sqrt($fm1);  
  
for($i=0;$i<count($array);$i++){  
    $fz = 0;  
    $fm2 = 0;  
    echo "Cos(".$array[$rank][0].",".$array[$i][0].")=";  
      
    for($j=1;$j<$temp;$j++){  
        //计算分子  
        if($array[$rank][$j] != null && $array[$i][$j] != null){  
            $fz += $array[$rank][$j] * $array[$i][$j];  
        }  
        //计算分母2  
        if($array[$i][$j] != null){  
            $fm2 += $array[$i][$j] * $array[$i][$j];  
        }             
    }  
    $fm2 = sqrt($fm2);  
    $cos[$i] = $fz/$fm1/$fm2;  
    echo $cos[$i]."<br/>";  
} 

function quicksort($str){  
    if(count($str)<=1) return $str;//如果个数不大于一，直接返回  
    $key=$str[0];//取一个值，稍后用来比较；  
    $left_arr=array();  
    $right_arr=array();  
      
    for($i=1;$i<count($str);$i++){//比$key大的放在右边，小的放在左边；  
        if($str[$i]>=$key)  
        $left_arr[]=$str[$i];  
        else  
        $right_arr[]=$str[$i];  
    }  
    $left_arr=quicksort($left_arr);//进行递归；  
    $right_arr=quicksort($right_arr);  
    return array_merge($left_arr,array($key),$right_arr);//将左中右的值合并成一个数组；  
}  
  
$neighbour = array();//$neighbour只是对cos值进行排序并存储  
$neighbour = quicksort($cos);  


//$neighbour_set 存储最近邻的人和cos值  
$neighbour_set = array();  
for($i=0;$i<3;$i++){  
    for($j=0;$j<5;$j++){  
        if($neighbour[$i] == $cos[$j]){  
            $neighbour_set[$i][0] = $j;  
            $neighbour_set[$i][1] = $cos[$j];  
            $neighbour_set[$i][2] = $array[$j][6];//邻居对f的评分  
            $neighbour_set[$i][3] = $array[$j][7];//邻居对g的评分  
            $neighbour_set[$i][4] = $array[$j][8];//邻居对h的评分  
        }  
    }  
}  
print_r($neighbour_set);  
echo "<p><br/>";  

//计算评分
$p_arr = array();  
$pfz_f = 0;  
$pfm_f = 0;  
for($i=0;$i<3;$i++){  
    $pfz_f += $neighbour_set[$i][1] * $neighbour_set[$i][2];  
    $pfm_f += $neighbour_set[$i][1];  
}  
$p_arr[0][0] = 6;  
$p_arr[0][1] = $pfz_f/sqrt($pfm_f);  
if($p_arr[0][1]>3){  
    echo "推荐f";  
}  
  
$pfz_g = 0;  
$pfm_g = 0;  
for($i=0;$i<3;$i++){  
    $pfz_g += $neighbour_set[$i][1] * $neighbour_set[$i][3];  
    $pfm_g += $neighbour_set[$i][1];  
    $p_arr[1][0] = 7;  
    $p_arr[1][1] = $pfz_g/sqrt($pfm_g);  
}  
if($p_arr[0][1]>3){  
    echo "推荐g";  
}  
   
$pfz_h = 0;  
$pfm_h = 0;  
for($i=0;$i<3;$i++){  
    $pfz_h += $neighbour_set[$i][1] * $neighbour_set[$i][4];  
    $pfm_h += $neighbour_set[$i][1];  
    $p_arr[2][0] = 8;  
    $p_arr[2][1] = $pfz_h/sqrt($pfm_h);  
}  
print_r($p_arr);  
if($p_arr[0][1]>3){  
    echo "推荐h";  
}  

$f_result = array();

// $shopid = 

$sql = "select * from shops where shopid = '${shopid}'";

$f_result[] = fetchOne($sql);

echo json_encode($f_result);



