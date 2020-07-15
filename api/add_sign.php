<?php
session_start();

require '../assets/includes/auth_functions.php';
require '../assets/includes/datacheck.php';
require '../assets/includes/security_functions.php';
check_logged_in();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {

        $_POST[$key] = _cleaninjections(trim($value));
    }

    require '../assets/setup/db.inc.php';

    //filter POST data
    function input_filter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $comment = input_filter($_POST['comment']);
    $cause_id = input_filter($_POST['cause_id']);
    $user_id = $_SESSION['id'];

    if (empty($comment) || empty($cause_id) || empty($user_id)) {
        echo 'false';
    } else {

        $sql = "INSERT into signs(causes_id, user_id, comment, created_at) values ( ?,?,?,NOW() )";
        $stmt = mysqli_stmt_init($conn);

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
            echo 'false';
        } else {
            mysqli_stmt_bind_param($stmt, "iis", $cause_id, $user_id, $comment);
            mysqli_stmt_execute($stmt);
            $response = mysqli_stmt_store_result($stmt);
            echo json_encode(true);
        }
    }
}
