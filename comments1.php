<?php
session_start();
include("connection.php");
$id =$_SESSION['id'];

$id1 = $_POST['otid'];

    



if(isset($id) && isset($id1)) {
    // Query to retrieve comments
    $query6 = "SELECT * FROM private WHERE (user_id = '$id' AND person_id = '$id1') OR (user_id = '$id1' AND person_id = '$id') ORDER BY id DESC";

    $result6 = mysqli_query($con, $query6);

    // Check for errors in the query
    if (!$result6) {
        die("Query failed: " . mysqli_error($con));
    }

    // Check if there are comments
    if (mysqli_num_rows($result6) > 0) {
        // Loop through comments
       	foreach($result6 as $ROW6){
        
            if ($ROW6['person_id'] != $id1) {
                $query4="select * from users where id = '$id'";
                $result4=mysqli_query($con,$query4);
                $pic_data =  mysqli_fetch_assoc($result4);
                include("otcmt.php");
            } 
             if($ROW6['user_id'] == $id) {
                $query4="select * from users where id = '$id1'";
                $result4=mysqli_query($con,$query4);
                $pic_data =  mysqli_fetch_assoc($result4);
                include("mycmt.php");
                
                
            }
        }
    } else {
        echo "<center><b> message make things clear <b><center>"; // Indicate no comments found
    }
} else {
    echo "Error: User ID not defined"; // Indicate error if $Id variable is not defined
}
?>
