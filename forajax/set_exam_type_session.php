<?php
// session_start();
// include "../connection.php";
// $exam_category=$_GET["exam_category"];
// $_SESSION["exam_category"]=$exam_category;

// $res=mysqli_query($link,"select * from exam_category where category='$exam_category'");
// while($row=mysqli_fetch_array($res))
// {
//     $_SESSION["exam_time"]=$row["exam_time_in_min"];
// }
// date_default_timezone_set('Asia/Kolkata');
// $date = date("Y-m-d H:i:s");
// $_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
// $_SESSION["exam_start"]="yes";



// session_start();
// include "../connection.php";
// $exam_category = $_GET["exam_category"];
// $_SESSION["exam_category"] = $exam_category;

// // Get the exam time from database
// $res = mysqli_query($link, "select * from exam_category where category='$exam_category'");
// while($row = mysqli_fetch_array($res)) {
//     $_SESSION["exam_time"] = $row["exam_time_in_minutes"];
// }

// // Set timezone and initialize timer
// date_default_timezone_set('Asia/Kolkata');
// $date = date("Y-m-d H:i:s");
// $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
// $_SESSION["exam_start"] = "yes";

// // No redirection here - the AJAX call will handle it
// echo "success";


// session_start();
// include "../connection.php";

// // Get exam category from request
// $exam_category = isset($_GET["exam_category"]) ? $_GET["exam_category"] : "";

// if(empty($exam_category)) {
//     echo "Error: No exam category provided";
//     exit;
// }

// $_SESSION["exam_category"] = $exam_category;

// // Get exam time from database
// $res = mysqli_query($link, "select * from exam where category='$exam_category'");
// if($row = mysqli_fetch_array($res)) {
//     $_SESSION["exam_time"] = $row["exam_time_in_min"];
    
//     // Set timezone and initialize timer
//     date_default_timezone_set('Asia/Kolkata');
//     $date = date("Y-m-d H:i:s");
//     $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
//     $_SESSION["exam_start"] = "yes";
    
//     // Success response
//     echo "success";
// } else {
//     echo "Error: Exam category not found";
// }

// session_start();
// include "../connection.php";

// $exam_category = isset($_GET["exam_category"]) ? $_GET["exam_category"] : "";

// if(empty($exam_category)) {
//     echo json_encode(["status" => "error", "message" => "No exam category provided"]);
//     exit;
// }

// $_SESSION["exam_category"] = $exam_category;

// $res = mysqli_query($link, "SELECT exam_time_in_min FROM exam WHERE category='$exam_category'");
// if($row = mysqli_fetch_array($res)) {
//     $_SESSION["exam_time"] = $row["exam_time_in_min"];
    
//     // Set timezone and initialize exam times
//     date_default_timezone_set('Asia/Kolkata');
//     $current_time = time();
//     $_SESSION["exam_start_time"] = $current_time;
//     $_SESSION["exam_end_time"] = $current_time + ($_SESSION["exam_time"] * 60);
//     $_SESSION["exam_start"] = "yes";

//     echo json_encode(["status" => "success", "exam_time_in_min" => $row["exam_time_in_min"]]);
// } else {
//     echo json_encode(["status" => "error", "message" => "Exam category not found"]);

// session_start();
// include "../connection.php";

// $exam_category = isset($_GET["exam_category"]) ? $_GET["exam_category"] : "";

// if(empty($exam_category)) {
//     echo json_encode(["status" => "error", "message" => "No exam category provided"]);
//     exit;
// }

// $res = mysqli_query($link, "SELECT * FROM exam WHERE category='$exam_category'");
// if($row = mysqli_fetch_array($res)) {
//     $exam_time_in_min = $row["exam_time_in_min"];

//     // No need to set session timer anymore
//     $_SESSION["exam_category"] = $exam_category; // (optional)

//     echo json_encode(["status" => "success", "exam_time_in_min" => $exam_time_in_min]);
// } else {
//     echo json_encode(["status" => "error", "message" => "Exam category not found"]);
// }

session_start();
include "../connection.php";
$exam_category=$_GET["exam_category"];
$_SESSION["exam_category"]=$exam_category;

$res=mysqli_query($link,"select * from exam where category='$exam_category'");
while($row=mysqli_fetch_array($res))
{
    $_SESSION["exam_time"]=$row["exam_time_in_minutes"];
}
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";


?>