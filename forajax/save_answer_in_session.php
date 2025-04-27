<?php
session_start();
//passed from dashboard function
$questionno=$_GET["questionno"];
$value1=$_GET["value1"];
$_SESSION["answer"][$questionno]=$value1;
?>