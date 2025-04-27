<?php
include "connection.php";

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    $check_stmt = $link->prepare("SELECT * FROM registration WHERE username = ?");
    if ($check_stmt) {
        $check_stmt->bind_param("s", $username);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            $response['status'] = 'failure';
            $response['message'] = 'Username already exists.';
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
                if ($insert_stmt->execute()) {
                    $response['status'] = 'success';
                    $response['message'] = 'Registration completed successfully.';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Database insert failed.';
                }
                $insert_stmt->close();
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Database prepare failed.';
            }
        }
        $check_stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Database connection failed.';
    }
}

// Always return JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
