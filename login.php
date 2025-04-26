<?php
// include "connection.php";

// $login_failed = false;

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login"])) {
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     $res = mysqli_query($link, "SELECT * FROM registration WHERE username='$username' AND password='$password'");
//     $count = mysqli_num_rows($res);

//     if ($count == 0) {
//         $login_failed = true;
//     } else {
//         header("Location: demo.php");
//         exit();
//     }
// }

include "connection.php";

$login_failed = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $link->prepare("SELECT * FROM registration WHERE username = ? AND password = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $res=$stmt->get_result();

        if ($res->num_rows == 0) {
            $login_failed = true;
        } else {
            header("Location: demo.php");
            exit();
        }

        $stmt->close();
    } else {
        echo "Something went wrong with preparing the query.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-4">LOGIN FORM</h3>

    <form method="post" action="" name="form1">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" placeholder="username" required name="username" id="username" class="form-control">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" placeholder="**" required name="password" id="password" class="form-control">
      </div>

      <div class="mb-3">
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
      </div>

      <div class="text-center">
        <a href="register.php">Register</a>
      </div>

      <?php if ($login_failed): ?>
        <div class="alert alert-danger mt-3">
          <strong>Do not match!</strong> Invalid username or password
        </div>
      <?php endif; ?>
    </form>
  </div>

</body>
</html>