<?php
session_start();
include "../connection.php";
include "header.php";?>
<!-- Main Content -->
<div class="content">
    <div><h1>Dashboard</h1>
    <div class="card">
    <div class="content-box">
        <center>
        <h1>OLD EXAM RESULS</h1>
        </center>

        
        <?php
        $res=mysqli_query($link,"select * from result order by id desc");
        $count=mysqli_num_rows($res);

        if($count==0){
            ?>
            <center>
            <h1>NO OLD EXAM FOUND</h1>
            </center>
            <?php
        }else{
            
            echo "<table class='table'>";
            echo "<tr>"; 
            echo "<th>Username</th>";
            echo "<th>Exam Type</th>";
            echo "<th>Total Questions</th>";
            echo "<th>Correct Answers</th>";
            echo "<th>Wrong Answers</th>";
            echo "<th>Exam Date</th>";
            echo "</tr>"; 

            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["exam_type"] . "</td>";
                echo "<td>" . $row["total_question"] . "</td>";
                echo "<td>" . $row["correct_answer"] . "</td>";
                echo "<td>" . $row["wrong_answer"] . "</td>";
                echo "<td>" . $row["exam_time"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        ?>
      </div>
    </div>
    </div>
</div>
<style>
.content-box {
    padding: 20px;
    font-family: Arial, sans-serif;
}

table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th {
    background-color: #4CAF50;
    color: white;
    padding: 12px 15px;
    text-align: left;
    font-size: 14px;
}

td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
    font-size: 12px;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

h1 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

center {
    margin: 20px;
}
</style>


</body>
</html>
