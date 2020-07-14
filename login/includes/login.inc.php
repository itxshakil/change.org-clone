<?php

session_start();

require '../../assets/includes/auth_functions.php';
require '../../assets/includes/datacheck.php';
require '../../assets/includes/security_functions.php';

check_logged_out();

if ($_SERVER['REQUEST_METHOD'] != "POST") {

    header("Location: ../");
    exit();
} else {

    /*
    * -------------------------------------------------------------------------------
    *   Securing against Header Injection
    * -------------------------------------------------------------------------------
    */

    foreach ($_POST as $key => $value) {

        $_POST[$key] = _cleaninjections(trim($value));
    }


    require '../../assets/setup/db.inc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {

        $_SESSION['STATUS']['loginstatus'] = 'Fields cannot be empty';
        header("Location: ../");
        exit();
    } else {
        /*
        * -------------------------------------------------------------------------------
        *   Creating SESSION Variables
        * -------------------------------------------------------------------------------
        */

        $sql = "SELECT * FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
            header("Location: ../");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                if (password_verify($password, $row['password'])) {
                    session_start();

                    $_SESSION['auth'] = 'loggedin';

                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['created_at'] = $row['created_at'];
                    $_SESSION['updated_at'] = $row['updated_at'];

                    header("Location: ../../home/");
                    exit();
                } else {

                    $_SESSION['ERRORS']['wrongpassword'] = 'Invalid Login Details';
                    header("Location: ../");
                    exit();
                }
            } else {

                $_SESSION['ERRORS']['nouser'] = 'Username does not exist';
                header("Location: ../");
                exit();
            }
        }
    }
}
