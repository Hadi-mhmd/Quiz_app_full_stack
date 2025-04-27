<?php

session_start();
date_default_timezone_set('Asia/Kolkata');

// Debug output
// error_log("Session variables: " . print_r($_SESSION, true));

if(!isset($_SESSION["end_time"])) {
    echo "00:00:00";
} else {
    $current_time = date("Y-m-d H:i:s");
    $end_time = $_SESSION["end_time"];
    
    $remaining_seconds = strtotime($end_time) - strtotime($current_time);
    
    if($remaining_seconds <= 0) {
        echo "00:00:00";
    } else {
        echo gmdate("H:i:s", $remaining_seconds);
    }
}



?>