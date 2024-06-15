<?php
session_start();
include("connection.php");
        $id = $_SESSION['id'];
    $file = $_FILES['img'];
    $filename = $file['name'];
    $tmp_name = $file['tmp_name'];
    $destination = 'uploads/' . $filename;

    if(move_uploaded_file($tmp_name, $destination)) {
        
        $sql = "UPDATE users SET image = ? WHERE id = '$id'"; 
        
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $filename); 
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        echo "true"; 
    } else {
        echo "Error uploading file"; 
    }
    
    mysqli_close($con);
