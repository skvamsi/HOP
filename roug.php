<?php
include("connection.php");

 if (!empty(trim($_POST["msg"]))) {
        if(isset($_POST['id']) && isset($_POST['msg'])) {
            $id = $_POST['id'];
            $msg = $_POST['msg'];
            
            // Handle text-only message
            $grade = 0;
            $sql = "INSERT INTO comments (user_id, comment, grade) VALUES (?, ?, ?)";
            
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "isi", $id, $msg, $grade);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            echo "true"; 
        }
}
 if (empty($_POST["msg"]))
{
        if(isset($_FILES['img']) && isset($_POST['id'])) {
                $id = $_POST['id'];
                $file = $_FILES['img'];
                $filename = $file['name'];
                $tmp_name = $file['tmp_name'];
                $destination = 'msg/' . $filename;
                move_uploaded_file($tmp_name, $destination);

                // Handle message with image
                $grade = 1;
                $sql = "INSERT INTO comments (user_id, image, grade) VALUES (?, ?, ?)";

                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "isi", $id, $filename, $grade);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                echo "true"; 
        }
}
 if (empty($_POST["msg"]))
{
        if(isset($_FILES['vid']) && isset($_POST['id'])) {
            $id = $_POST['id'];
            // handle your file upload here
            $file1 = $_FILES['vid'];
            $filename1 = $file1['name'];
            $tmp_name = $file1['tmp_name'];
            $destination = 'msg/' . $filename1;
            move_uploaded_file($tmp_name, $destination);
            
            $grade = 2;
            $sql = "INSERT INTO comments (user_id, image, grade) VALUES (?, ?, ?)";
            
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "isi", $id, $filename1, $grade);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
             $_FILES['vid'] = NULL;
            echo "true"; 
        }
}
?>
