<?php
/****************************************************************
 * Carrot Project Framework 1.0
 * Develop by Andrew Quaye
 * Copyright iQuipe Digital Enterprise
 * Email iquipe@outlook.com
 * Mobile +233 548 263 738
 * License MIT
 ***************************************************************/
session_start();
include_once("./control/global.php");
include_once("./control/shell.php");
include_once("./control/control.php");
include_once("./control/function.php");
include_once("./control/model.php");
include_once("./control/navgation.php");

use shell\shell_execute;
$uSHELL = new shell_execute;

if(!isset($_REQUEST['_submit'])){
    if(!isset($_REQUEST['page'])){
        if(!isset($_REQUEST['main'])){
            session_destroy();
            require_once($_temp['login']);
            exit(0);
        }else{
            __main($apps,$template,$request);
        }
    }else{
        __page($apps,$template,$request);
    }
}else{
     __model($apps,$template,$request);
}
?>