<?php
include "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $link->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $res = $stmt->get_result();
        $count = $res->num_rows;

        if ($count == 0) {
            // If login failed
            echo 'failure';
        } else {
            // If login is successful
            echo 'success';
        }

        $stmt->close();
    } else {
        echo 'error'; // In case of query preparation failure
    }
}
?>
