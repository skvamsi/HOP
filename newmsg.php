<?php
    session_start();
    include("connection.php"); // Ensure connection.php is correctly set up with mysqli_connect
    $id =$_SESSION['id'];
    $last_id = $_SESSION['last_publicId'];
    if (isset($last_id)) {
        // Use prepared statements to avoid SQL injection
        $sql = "SELECT * FROM comments WHERE id > ?"; 
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $last_id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $_SESSION['last_publicId'] = $row['id'];
                echo "true";
            }
        }
    } else {
        echo "<center><b>No comments found.</b></center>";
    }
?>
