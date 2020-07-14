<?php

session_start();

require '../../assets/includes/auth_functions.php';
require '../../assets/includes/datacheck.php';
require '../../assets/includes/security_functions.php';

check_logged_out();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    /*
    * -------------------------------------------------------------------------------
    *   Securing against Header Injection
    * -------------------------------------------------------------------------------
    */

    foreach ($_POST as $key => $value) {

        $_POST[$key] = _cleaninjections(trim($value));
    }


    require '../../assets/setup/db.inc.php';

    //filter POST data
    function input_filter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = input_filter($_POST['username']);
    $email = input_filter($_POST['email']);
    $password = input_filter($_POST['password']);
    $passwordRepeat  = input_filter($_POST['confirmpassword']);
    $full_name = input_filter($_POST['first_name']);
    $last_name = input_filter($_POST['last_name']);

    /*
    * -------------------------------------------------------------------------------
    *   Data Validation
    * -------------------------------------------------------------------------------
    */

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {

        $_SESSION['ERRORS']['formerror'] = 'Please fill all details and, try again';
        header("Location: ../");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

        $_SESSION['ERRORS']['usernameerror'] = 'Invalid username';
        header("Location: ../");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $_SESSION['ERRORS']['emailerror'] = 'Invalid email.';
        header("Location: ../");
        exit();
    } else if ($password !== $passwordRepeat) {

        $_SESSION['ERRORS']['passworderror'] = 'Password do not match.';
        header("Location: ../");
        exit();
    } else {

        if (!availableUsername($conn, $username)) {

            $_SESSION['ERRORS']['usernameerror'] = 'Username already taken.';
            header("Location: ../");
            exit();
        }
        if (!availableEmail($conn, $email)) {

            $_SESSION['ERRORS']['emailerror'] = 'Email-address already registered.';
            header("Location: ../");
            exit();
        }

        /*
        * -------------------------------------------------------------------------------
        *   User Creation
        * -------------------------------------------------------------------------------
        */


        $sql = "INSERT into users(username, email, password, first_name, last_name, created_at) values ( ?,?,?,?,?,NOW() )";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
            header("Location: ../");
            exit();
        } else {
            $passsword = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $passsword, $full_name, $last_name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $_SESSION['STATUS']['loginstatus'] = 'Account Created, Please Login';
            header("Location: ../../login/");
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
die(123);
    header("Location: ../");
    exit();
}
