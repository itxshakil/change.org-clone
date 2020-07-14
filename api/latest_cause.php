<?php
require '../assets/setup/db.inc.php';


$sql = "SELECT causes.*,users.first_name,users.last_name FROM causes INNER JOIN users ON causes.user_id = users.id ORDER BY causes.id DESC LIMIT 3";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {

    $_SESSION['ERRORS']['scripterror'] = 'SQL ERROR';
    header("Location: ../");
    exit();
} else {
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
}
