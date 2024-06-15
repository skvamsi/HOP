<?php
session_start();
include("connection.php");
$id =$_SESSION['id'];

if(isset($id)) {
    // Query to retrieve comments
    $query6 = "SELECT * FROM comments order by id desc";
    $result6 = mysqli_query($con, $query6);

    // Check for errors in the query
    if (!$result6) {
        die("Query failed: " . mysqli_error($con));
    }

    // Check if there are comments
    if (mysqli_num_rows($result6) > 0) {
        // Loop through comments
       	foreach($result6 as $ROW6){
            $Other_id = $ROW6['user_id'];
            $query4="select * from users where id = '$Other_id' limit 1";
              $result4=mysqli_query($con,$query4);
              $pic_data =  mysqli_fetch_assoc($result4);
         
            if ($ROW6['user_id'] == $id) {
                include("otherCmt.php");
            } 
            if($ROW6['user_id'] != $id){
                 include("ursCmt.php");
                
            }
        }
    } else {
        echo "<center><b>no comments sry</b></center>"; // Indicate no comments found
    }
} else {
    echo "Error: User ID not defined"; // Indicate error if $Id variable is not defined
}
?>
