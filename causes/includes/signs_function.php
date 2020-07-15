<?php


function isSignedCurrentUser($conn)
{
    $id = $_SESSION['id'];
    $cause_id = $_GET['id'];

    $sql = "SELECT * FROM signs WHERE user_id=? AND causes_id =?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
        header("Location: ../");
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, "ii", $id, $cause_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $count = mysqli_num_rows($result);
        mysqli_free_result($result);

        return (bool) $count;
    }
}
