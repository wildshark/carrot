<?php

$GLOBALS['appname'] ="Bankash";
$GLOBALS['ver'] ="ver 0.1";
$GLOBALS['date'] = date("d-m-Y");
$GLOBALS['time'] = date("H-i-s A");
$GLOBALS['title'] = "BANKASH <small>1.2</small>";
$GLOBALS['header-title'] = "<title>BANKASH</title>";

$GLOBALS['FP_key'] = "";
$GLOBALS['PSP_key'] = "";

$_template = [
    "login"=>"./frame/login.php",
    "forget"=>"./frame/forget.php",
    "home"=>"./frame/dashboard.php",
    "table"=>"./frame/table.php",
    "form"=>"./frame/form.php",
    "404"=>"./frame/404.php",
    "505"=>"./frame/500.php",
    "error"=>"./frame/error.php",
    "typography"=>"./frame/typography.php"
];
