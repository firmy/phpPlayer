<?php
#########################################################################
# File Name: getMonkeyKing.php
# Author: firmy
# mail: firmy@foxmail.com
# Created Time: 2013/03/01 - 16:07
#########################################################################

//猴子选大王的程序。首先输入猴子的数目m，然后输入每次查猴子的数目n。每数N次删除一个猴子。最后剩下的是大王。

$monkeyNum = $argv[1];
$num = $argv[2];
getKing($monkeyNum,$num);

function getKing($m,$n){
    //构造队列
    for($i=1;$i<=$m;$i++){
        $list[$i] = $i;
    }
    $j = 1;//设定指针
    $k = 1;
    while(count($list)>1){
        $k = ($k==($n+1))?1:$k;
        echo current($list)."=>{$k}\n";
        if(($j%$n) == 0){
            echo "===========throw {$list[$j]} out,next================\n";
            unset($list[$j]);
        }else{
            array_push($list,$list[$j]);
            unset($list[$j]);
        }
        $j++; //从下一只猴子开始数
        $k++;
    }
    echo "the king is :".current($list).";haha!!!\n";

    return $list;
}

