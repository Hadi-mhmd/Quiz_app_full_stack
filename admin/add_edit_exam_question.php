<?php
include "header.php";
include "../connection.php";?>
<!-- Main Content -->
<div class="content">
    <div><h3>select the exam to add and edit its questions</h3>
    <div class="card">
    <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
          <thead>
            <tr>
              <th style="border: 1px solid #ddd; padding: 8px;">#</th>
              <th style="border: 1px solid #ddd; padding: 8px;">Category</th>
              <th style="border: 1px solid #ddd; padding: 8px;">Time (Min)</th>
              <th style="border: 1px solid #ddd; padding: 8px;">Select</th>
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
              <td style="border: 1px solid #ddd; padding: 4px;"><a href="add_edit_question.php?id=<?php echo $row["id"]?>">Select</a></td>
              

            </tr>
            <?php
          }
          ?>
            
          </tbody>
        </table>
    </div>
    </div>
</div>

</body>
</html>
