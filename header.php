<?php
//session_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Online Quiz System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <ul class="nav-menu">
        <li><a href="#">Select Exam</a></li>
        <li><a href="#">Last Result</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li class="username">
        <span style="color: green;"><?php echo $_SESSION["username"]; ?></span>
      </li>
      </ul>
    </header>

    <div class="breadcrumb" id="countdowntimer" style="display: block;">

      
    </div>
    <script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);
    function timer()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="result.php";
                }

                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET","forajax/load_timer.php",true);
        xmlhttp.send(null);
    }

    </script>