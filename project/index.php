<?php
/**************************************************************
 * 
 **************************************************************/
session_start();
include_once("./control/global.php");
include_once("./control/shell.php");
include_once("./control/control.php");
include_once("./control/function.php");
include_once("./control/model.php");
include_once("./control/navgation.php");

use shell\shell_execute;
$_shell = new shell_execute;

if(!isset($_REQUEST['_submit'])){
    if(!isset($_REQUEST['page'])){
        if(!isset($_REQUEST['main'])){
            session_destroy();
            require_once($_temp['login']);
            exit(0);
        }else{

        }
    }else{

    }
}else{
    
}

?>