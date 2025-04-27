<?php
include "header.php";
include "../connection.php";
if (!isset($_GET["id"])) {
    header("Location: add_edit_exam_question.php");
    exit();
}
$id = $_GET["id"];

$exam_category='';
$result=mysqli_query($link,"select * from exam where id=$id");
while($row=mysqli_fetch_array($result)){
    $exam_category=$row["category"];
}

?>
<!-- Main Content -->
<div class="content">
<div><h1>Add Questions in the <?php echo "<font color='green'>" . $exam_category . "</font>"; ?> Exam</h1></div>

<div style="flex: 1; min-width: 300px;">
  <div class="card">
    <h3>Add new Questions </h3>
    <form action="" name="form1" method="POST">
      <div class="form-group">
        <label>Question</label>
        <input type="text" id="question" name="question" placeholder="Add new question" required >
      </div>

      <!-- Options grouped in two columns -->
      <div style="display: flex; gap: 20px;">
        <div class="form-group" style="flex: 1;">
          <label>Add option 1</label>
          <input type="text" id="opt1" name="opt1" placeholder="Add option one answer" required>
        </div>

        <div class="form-group" style="flex: 1;">
          <label>Add option 2</label>
          <input type="text" id="opt2" name="opt2" placeholder="Add option two answer" required>
        </div>
      </div>

      <div style="display: flex; gap: 20px; margin-top: 20px;">
        <div class="form-group" style="flex: 1;">
          <label>Add option 3</label>
          <input type="text" id="opt3" name="opt3" placeholder="Add option three answer" required>
        </div>

        <div class="form-group" style="flex: 1;">
          <label>Add option 4</label>
          <input type="text" id="opt4" name="opt4" placeholder="Add option four answer" required>
        </div>
      </div>

      <div class="form-group" style="margin-top: 20px;">
        <label>Add the correct answer</label>
        <input type="text" name="answer" placeholder="Add the correct answer for this question" required>
      </div>

      <button type="submit" name="submit1" class="btn">Add Question</button>
    </form>
  </div>
</div>
<div class="card">
  <h3>Existing Questions</h3>
  <table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
    <thead>
      <tr>
        <th>Question No</th>
        <th>Question</th>
        <th>Option 1</th>
        <th>Option 2</th>
        <th>Option 3</th>
        <th>Option 4</th>
        <th>Answer</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$exam_category' ORDER BY question_no ASC") or die(mysqli_error($link));
      while ($row = mysqli_fetch_assoc($res)) {
          echo "<tr>";
          echo "<td>" . $row["question_no"] . "</td>";
          echo "<td>" . htmlspecialchars($row["question"]) . "</td>";
          echo "<td>" . htmlspecialchars($row["opt1"]) . "</td>";
          echo "<td>" . htmlspecialchars($row["opt2"]) . "</td>";
          echo "<td>" . htmlspecialchars($row["opt3"]) . "</td>";
          echo "<td>" . htmlspecialchars($row["opt4"]) . "</td>";
          echo "<td>" . htmlspecialchars($row["answer"]) . "</td>";
          echo "<td>
                <a href='edit_option.php?id=" . $row["id"] . "&id1=" . $id . "'>Edit</a> | 
            <a href='delete_option.php?id=" . $row["id"] . "&id1=" . $id . "' onclick=\"return confirm('Are you sure you want to delete this question?');\">Delete</a>
                </td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>

 <?php
if (isset($_POST["submit1"])) {
    // Sanitize the exam category
    $exam_category_safe = mysqli_real_escape_string($link, $exam_category);

    // Initialize loop
    $loop = 0;

    // Fetch all questions in the given category ordered by id
    $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$exam_category_safe' ORDER BY id ASC") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        // Reorder all existing questions
        while ($row = mysqli_fetch_assoc($res)) {
            $loop++;
            $id_safe = (int)$row['id']; // Force integer
            mysqli_query($link, "UPDATE questions SET question_no='$loop' WHERE id=$id_safe") or die(mysqli_error($link));
        }
    }

    // Now, prepare to insert the new question
    $loop++; // Increment loop for the new question

    // Secure POST inputs
    $question = mysqli_real_escape_string($link, $_POST['question']);
    $opt1 = mysqli_real_escape_string($link, $_POST['opt1']);
    $opt2 = mysqli_real_escape_string($link, $_POST['opt2']);
    $opt3 = mysqli_real_escape_string($link, $_POST['opt3']);
    $opt4 = mysqli_real_escape_string($link, $_POST['opt4']);
    $answer = mysqli_real_escape_string($link, $_POST['answer']);

    // Insert the new question
    $query = "
        INSERT INTO questions (id, question_no, question, opt1, opt2, opt3, opt4, answer, category) 
        VALUES (NULL, '$loop', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$answer', '$exam_category_safe')
    ";

    mysqli_query($link, $query) or die(mysqli_error($link));

    // Optional: Redirect or show success message
    echo "Question added successfully!";
}


?> 
