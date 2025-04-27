<?php
session_start();
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.html";
        </script>
    <?php
}
include "connection.php";
include "header.php" ;
?>

    <main class="main">
      <div class="content-box">
        <?php
        $res=mysqli_query($link,"select * from exam");
        while($row=mysqli_fetch_array($res))
        {
            ?>
    
            <input 
                type="button" 
                class="btn btn-primary form-control" 
                value="<?php echo htmlspecialchars($row['category']); ?>" 
                style="margin-top: 10px; background-color: #007bff; color: white; font-weight: bold; border-radius: 8px; padding: 12px 20px; font-size: 18px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" 
                onclick="set_exam_type_session(this.value)">

            <?php
        }
        ?>
      </div>
    </main>

  </div>

</body>
</html>


    <script type="text/javascript">
    //     function set_exam_type_session(exam_category) {
    //     var xmlhttp = new XMLHttpRequest();
    //     xmlhttp.onreadystatechange = function() {
    //         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    //             if(xmlhttp.responseText.includes("success")) {
    //                 window.location = "dashboard.php";
    //             } else {
    //                 alert("Error: " + xmlhttp.responseText);
    //             }
    //         }
    //     };
    //     xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category=" + encodeURIComponent(exam_category), true);
    //     xmlhttp.send(null);
    // }
//     function set_exam_type_session(exam_category) {
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//             var response = JSON.parse(xmlhttp.responseText);

//             if(response.status === "success") {
//                 localStorage.setItem("exam_time_in_min", response.exam_time_in_min);
//                 localStorage.setItem("exam_start_time", Date.now());

//                 window.location = "dashboard.php";
//             } else {
//                 alert("Error: " + response.message);
//             }
//         }
//     };
//     xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category=" + encodeURIComponent(exam_category), true);
//     xmlhttp.send();
// }
</script>
<script type="text/javascript">
    function set_exam_type_session(exam_category)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+ exam_category,true);
        xmlhttp.send(null);
    }
</script>



