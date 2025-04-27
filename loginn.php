<?php
session_start(); 
include "connection.php";

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $link->prepare("SELECT * FROM registration WHERE username = ? AND password = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows == 0) {
            $response['status'] = 'failure';
            $response['message'] = 'Invalid username or password.';
        } else {
            $_SESSION['username'] = $username;
            $response['status'] = 'success';
            $response['message'] = 'Login successful!';
        }

        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Server error. Please try again.';
    }
}

// Always return JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
