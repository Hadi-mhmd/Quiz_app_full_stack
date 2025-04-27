<?php include "header.php";
include "../connection.php";
$id=$_GET["id"];
$res=mysqli_query($link,"select * from exam where id=$id");
while($row=mysqli_fetch_array($res)){
    $exam_category=$row["category"];
    $exam_time=$row["exam_time_in_min"];
}
 ?>

<div class="content">
  <div style="display: flex; gap: 20px; flex-wrap: wrap;">

    <div style="flex: 1; min-width: 300px;">
      <div class="card">
        <h3>Edit Exam</h3>
        <form action="" name="form1" method="POST">
          <div class="form-group">
            <label for="examCategory">New Exam Category</label>
            <input type="text" id="examCategory" name="examCategory" required value="<?php echo $exam_category?>">
          </div>

          <div class="form-group">
            <label for="examTime">Exam Time (in minutes)</label>
            <input type="number" id="examTime" name="examTime" required min="1" value="<?php echo $exam_time?>">
          </div>

          <button type="submit" name="submit1" class="btn">Update this Exam</button>
        </form>
      </div>
    </div>

  </div>
</div>

</body>
</html>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit1"])) {
    $examCategory = mysqli_real_escape_string($link, $_POST['examCategory']);
    $examTime = (int) $_POST['examTime'];

    mysqli_query($link, "UPDATE exam set category='$_POST[examCategory]',exam_time_in_min='$_POST[examTime]'where id=$id") 
        or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        window.location="exam_category.php";
    </script>
    <?php
}
?>




