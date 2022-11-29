<?php

if (!isset($_SESSION['countdown'])){
    $_SESSION['countdown'] = 120;
    $_SESSION['time_started'] = time();
}

$now = time(); 
$timeSince = $now - $_SESSION['time_started'];

$remainingSeconds = abs($_SESSION['countdown'] - $timeSince);

if ($remainingSeconds > 360 ){
    session_unset();
    session_destroy();
     header("location: index.php");
    exit();
}