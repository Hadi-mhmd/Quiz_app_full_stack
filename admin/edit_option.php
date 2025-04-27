<?php
include "header.php";
include "../connection.php";
$id=$_GET["id"];
$id1=$_GET["id1"];
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$res=mysqli_query($link,"select * from questions where id=$id");
while($row=mysqli_fetch_array($res)){
    $question = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $answer = $row["answer"];
    
}
?>
<div class="content">
    <div><h1>UPDATE Question</h1>
    <div class="card">
    <h3>Update question and option </h3>
    <form action="" name="form1" method="POST">
      <div class="form-group">
        <label>Question</label>
        <input type="text" id="question" name="question"  value="<?php echo $question?>" required >
      </div>

      <!-- Options grouped in two columns -->
      <div style="display: flex; gap: 20px;">
        <div class="form-group" style="flex: 1;">
          <label>Add option 1</label>
          <input type="text" id="opt1" name="opt1"  value="<?php echo $opt1?>" required>
        </div>

        <div class="form-group" style="flex: 1;">
          <label>Add option 2</label>
          <input type="text" id="opt2" name="opt2" placeholder="Add option two answer" value="<?php echo $opt2?>" required>
        </div>
      </div>

      <div style="display: flex; gap: 20px; margin-top: 20px;">
        <div class="form-group" style="flex: 1;">
          <label>Add option 3</label>
          <input type="text" id="opt3" name="opt3" placeholder="Add option three answer" value="<?php echo $opt3?>"required>
        </div>

        <div class="form-group" style="flex: 1;">
          <label>Add option 4</label>
          <input type="text" id="opt4" name="opt4" placeholder="Add option four answer" value="<?php echo $opt4?>" required>
        </div>
      </div>

      <div class="form-group" style="margin-top: 20px;">
        <label>Add the correct answer</label>
        <input type="text" name="answer" placeholder="Add the correct answer for this question" value="<?php echo $answer?>" required>
      </div>

      <button type="submit" name="submit1" class="btn">Update this question</button>
    </form>
  </div>
    </div>
</div>

</body>
</html>
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link,"update questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' where id=$id");

    ?>
    <script type="text/javascript">
        window.location="add_edit_question.php?id=<?php echo $id1;?>";
    </script>
    <?php
}



?>
