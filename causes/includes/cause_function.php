<?php

    require_once '../assets/setup/db.inc.php';

    $id = $_GET['id'];

    $sql = "SELECT causes.*,users.first_name,users.last_name FROM causes INNER JOIN users ON causes.user_id = users.id  WHERE causes.id=? LIMIT 1";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
        header("Location: ../");
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $cause = mysqli_fetch_assoc($result);
    }