<?php
// include "connection.php";

// $success = false;
// $failure = false;

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit1'])) {
//     $username = $_POST['username'];
//     $res = mysqli_query($link, "SELECT * FROM registration WHERE username='$username'");
//     $count = mysqli_num_rows($res);

//     if ($count > 0) {
//         $failure = true;
//     } else {
//         mysqli_query($link, "INSERT INTO registration VALUES (NULL, '$_POST[firstname]', '$_POST[lastname]', '$username', '$_POST[password]', '$_POST[email]', '$_POST[contact]')");
//         $success = true;
//     }
// }
include "connection.php";

$success = false;
$failure = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit1'])) {
    $username = $_POST['username'];

    $check_stmt = $link->prepare("SELECT * FROM registration WHERE username = ?");
    if ($check_stmt) {
        $check_stmt->bind_param("s", $username);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            $failure = true;
        } else {
            $insert_stmt = $link->prepare("INSERT INTO registration (id, firstname, lastname, username, password, email, contact) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
            if ($insert_stmt) {
                $insert_stmt->bind_param(
                    "ssssss",
                    $_POST['firstname'],
                    $_POST['lastname'],
                    $username,
                    $_POST['password'],
                    $_POST['email'],
                    $_POST['contact']
                );
                $insert_stmt->execute();
                $success = true;
                $insert_stmt->close();
            }
        }

        $check_stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="login">
    <form method="post" action="">
      <h1 style="text-align: center;">REGISTER</h1>

      <label>First Name</label>
      <input type="text" name="firstname" required>

      <label>Last Name</label>
      <input type="text" name="lastname" required>

      <label>Username</label>
      <input type="text" name="username" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Contact</label>
      <input type="text" name="contact" required>

      <input name="submit1" type="submit" value="Register">
      <p>Already have an account? <a href="login.php">Sign in</a></p>

      <?php if ($success): ?>
        <div class="alert alert-success" style="margin-top: 10px;">
          <strong>Success!</strong> Your registration was completed.
        </div>
      <?php elseif ($failure): ?>
        <div class="alert alert-danger" style="margin-top: 10px;">
          <strong>Already Exist!</strong> This username already exists.
        </div>
      <?php endif; ?>
    </form>
  </div>
</body>
</html>