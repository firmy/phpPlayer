<?php
#########################################################################
# File Name: dbInfuse.php
# Author: firmy
# mail: firmy@foxmail.com
# Created Time: 2013/03/07 - 18:09
#########################################################################
//PHP 防注入示例
$magic_quotes_gpc = get_magic_quotes_gpc(); 
@extract(daddslashes($_COOKIE)); 
@extract(daddslashes($_POST)); 
@extract(daddslashes($_GET)); 
if(!$magic_quotes_gpc) { 
    $_FILES = daddslashes($_FILES); 
} 

/**
 * 字符串过滤
 */
function daddslashes($string, $force = 0) { 
    if(!$GLOBALS['magic_quotes_gpc'] || $force) { 
        if(is_array($string)) { 
            foreach($string as $key => $val) { 
                $string[$key] = daddslashes($val, $force); 
            } 
        } else { 
            $string = addslashes($string); 
        } 
    } 
    return $string; 
} 

/**
 *sql过滤
 */
public function query($sql) {
    if(!mysql_real_escape_string($sql)){
        return false;
    }
    $this->query_result = mysql_query ( $sql,$this->link );
    if ($this->query_result === false) {
        throw new Exception ( "sql执行出错:" . $sql . "   " . mysql_error () );
    }
    return $this->query_result;
}
