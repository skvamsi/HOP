<?php
session_start();
include("connection.php");
$ad = $_SESSION['id'];
if(isset($_POST['info'])) {
    // Query to retrieve details of the person
    $id = $_POST['info'];
    $query6 = "SELECT * FROM emergency where id = '$id' limit 1";
    $result6 = mysqli_query($con, $query6);
    $row = mysqli_fetch_assoc($result6);

    // Check for errors in the query
    if (!$result6) {
        die("Query failed: " . mysqli_error($con));
    }
    if($row){
        $name = $row['name'];
        $R_id = $row['R_id'];
        $need = $row['need'];
        $image = $row['image']; 
        $admin = $row['admin'];
        $city = $row['city'];
        $campus = "RAJIV GANDHI UNIVERSITY OF KNOWLEDGE AND TECHNOLOGIES, ONGOLE AP";
        
        $sql = "INSERT INTO helped (name, R_id, city, need, image, extra, campus) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $R_id, $city, $need, $image, $ad, $campus);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        if($stmt){
            // Execute delete query
            $del = "DELETE FROM emergency WHERE id = '$id'";
            $res = mysqli_query($con, $del); // Corrected parameter order
            if($res){
                echo "Imported successfully";
            }
            else {
                echo "Error deleting record: " . mysqli_error($con);
            }
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}
?>
