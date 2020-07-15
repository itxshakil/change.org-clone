<?php
require '../assets/setup/db.inc.php';

$cause_id = $_GET['id'];

// header("Location: ../");

$sql = "SELECT COUNT(id) FROM signs WHERE causes_id =?  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {

    $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
    echo 'false';
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "i", $cause_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
}
