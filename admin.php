<?php
include("connection.php");

if (isset($_POST['adminData'])) {
    $data = $_POST['adminData'];
    $name = $data['name'];// Sanitize user input
    $password =  $data['password']; // Sanitize user input

    if (!empty($name) && !empty($password)) {

        $query = "SELECT * FROM admin WHERE name = '$name' LIMIT 1";
        
        $result = mysqli_query($con, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($password == $user_data['password']) { // Use password_verify to check hashed passwords
                    echo "true";
                    exit(); // Terminate script execution after sending response
                } else {
                    echo "Wrong email or password.";
                }
            } else {
                echo "User not registered.";
            }
        } else {
            echo "Error executing query.";
        }
    } else {
        echo "Email or Password is Empty.";
    }
}
?>
