<?php
session_start();
include("connection.php"); // Ensure connection.php is correctly set up with mysqli_connect

$id = $_SESSION['id'];
$last123 = $_SESSION['last_privateId'];

if (isset($_POST['chater']) && isset($last123)) {
    $last_id = $_POST['chater']; // Assuming 'chater' is the ID of the last comment shown

    $sql = "SELECT * FROM private WHERE id > ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $last123);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $_SESSION['last_privateId'] = $row['id'];
            $u1 = $row['user_id'];
            $u2 = $row['person_id'];
            if (($id == $u1 || $id == $u2) && ($last_id == $u2 || $last_id == $u1)) {
                echo "true";
            }
        }
    }
}
?>
