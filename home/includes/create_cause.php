<?php

session_start();

require '../../assets/includes/auth_functions.php';
require '../../assets/includes/security_functions.php';

check_logged_in();

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

    $title = input_filter($_POST['title']);
    $description = input_filter($_POST['description']);
    $user_id = $_SESSION['id'];

    /*
    * -------------------------------------------------------------------------------
    *   Data Validation
    * -------------------------------------------------------------------------------
    */

    if (empty($title) && empty($description)) {

        $_SESSION['ERRORS']['formerror'] = 'Please fill all details and, try again';
        header("Location: ../");
        exit();
    } else if (!filter_var($title, FILTER_SANITIZE_STRING)) {

        $_SESSION['ERRORS']['titleerror'] = 'Title contains Invalid character';
        header("Location: ../");
        exit();
    } else if (!filter_var($description, FILTER_SANITIZE_STRING)) {

        $_SESSION['ERRORS']['descriptionerror'] = 'Description contains Invalid character';
        header("Location: ../");
        exit();
    } else {

        /*
        * -------------------------------------------------------------------------------
        *   Cause Creation
        * -------------------------------------------------------------------------------
        */


        $sql = "INSERT into causes(title, description, user_id, created_at)
                values ( ?,?,?,NOW() )";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
            header("Location: ../");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ssi", $title, $description, $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $cause_id =  mysqli_stmt_insert_id($stmt);

            $_SESSION['STATUS']['causestatus'] = 'Cause Created Successfully , Please Share';
            header("Location: ../../causes?id=" . $cause_id);
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
