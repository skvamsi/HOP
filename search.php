<?php
session_start();
include("connection.php");
$id =$_SESSION['id'];
if(isset($_POST['id'])){
    $val = $_POST['id'];
    if($val != 0){
        $searchTerm = $_POST['data']; // Retrieve search term
        $query =    "SELECT * FROM users 
                    WHERE id != '$id' 
                    AND (user_id LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%')
                    ORDER BY id DESC";                
        $result1 = mysqli_query($con, $query);

        foreach($result1 as $ROW7) {
            include("person.php");
        }
    } else {
        $sql = "SELECT * FROM users WHERE id != '$id'";
        $res = mysqli_query($con, $sql);
        foreach($res as $ROW7) { // Corrected variable name
            include("person.php");
        }
    }
}
?>
