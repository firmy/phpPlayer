<?php
#########################################################################
# File Name: sort.php
# Author: firmy
# mail: firmy@foxmail.com
# Created Time: 2013/03/05 - 17:26
#########################################################################
//受python列表的启发，改变一下排序的思路，写个很二的排序算法
$fun = $argv[1];
$funArr = array(
    "asc" => "min",
    "desc" => "max",
    );
echo $fun;
if(empty($fun)||!in_array($fun,array("asc","desc"))){
    echo "php sort.php [asc|desc]\n";
}else{
  echo  $fun = $funArr[$fun]; 
    sortFun($fun);
}
function sortFun($fun){
    $arr = array(1,2,3,4,66,55,44,3,11);
    $num = count($arr);
    for ($i = 0;$i<$num;$i++){
        $max = call_user_func($fun,$arr);
        $key = array_keys($arr,$max); 
        $sortArr[] = $max;
        unset($arr[$key[0]]);
    }
    print_r($sortArr);
}
