<?php

function check_logged_in()
{

    if (isset($_SESSION['auth'])) {

        return true;
    } else {

        header("Location: ../login/");
        exit();
    }
}

function check_logged_out()
{

    if (!isset($_SESSION['auth'])) {

        return true;
    } else {

        header("Location: ../home/");
        exit();
    }
}

function force_login($email)
{

    require '../assets/setup/db.inc.php';

    $sql = "SELECT * FROM users WHERE email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        return false;
    } else {

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {

            return false;
        } else {
            $_SESSION['auth'] = 'loggedin';

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['created_at'] = $row['created_at'];            return true;
        }
    }
}