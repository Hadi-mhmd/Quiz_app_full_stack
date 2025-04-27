<?php include "header.php";
include "../connection.php" ?>

<div class="content">
  <div style="display: flex; gap: 20px; flex-wrap: wrap;">

    <div style="flex: 1; min-width: 300px;">
      <div class="card">
        <h3>Add Exam</h3>
        <form action="" name="form1" method="POST">
          <div class="form-group">
            <label for="examCategory">New Exam Category</label>
            <input type="text" id="examCategory" name="examCategory" required>
          </div>

          <div class="form-group">
            <label for="examTime">Exam Time (in minutes)</label>
            <input type="number" id="examTime" name="examTime" required min="1">
          </div>

          <button type="submit" name="submit1" class="btn">Add Exam</button>
        </form>
      </div>
    </div>

    <div style="flex: 1; min-width: 300px;">
      <div class="card">
        <h3>Exam Categories</h3>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
          <thead>
            <tr>
              <th style="border: 1px solid #ddd; padding: 8px;">#</th>
              <th style="border: 1px solid #ddd; padding: 8px;">Category</th>
              <th style="border: 1px solid #ddd; padding: 8px;">Time (Min)</th>
              <th style="border: 1px solid #ddd; padding: 8px;">Edit</th>
              <th style="border: 1px solid #ddd; padding: 8px;">Delete</th>
            </tr>
          </thead>

          <tbody>
          <?php
          $count=0;
          $res=mysqli_query($link,"select * from exam");
          while($row=mysqli_fetch_array($res)){
            $count=$count+1;
            ?>
            <tr>
              <th style="border: 1px solid #ddd; padding: 4px;"><?php echo $count;?></th>
              <td style="border: 1px solid #ddd; padding: 4px;"><?php echo $row["category"];?></td>
              <td style="border: 1px solid #ddd; padding: 4px;"><?php echo $row["exam_time_in_min"];?></td>
              <td style="border: 1px solid #ddd; padding: 4px;"><a href="edit_exam.php?id=<?php echo $row["id"]?>">Edit</a></td>
              <td style="border: 1px solid #ddd; padding: 4px;"><a href="delete_exam.php?id=<?php echo $row["id"]?>">Delete</a></td>
            </tr>
            <?php
          }
          ?>
            
          </tbody>
        </table>
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

    mysqli_query($link, "INSERT INTO exam (category, exam_time_in_min) VALUES ('$examCategory', $examTime)") 
        or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        alert("Exam added successfully");
        window.location.href = window.location.href;//to get updated without refresh
    </script>
    <?php
}
?>




