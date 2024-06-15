<?php
session_start();
include("connection.php");

// Sanitize user inputs
$id = mysqli_real_escape_string($con, $_SESSION['id']);
$arg = mysqli_real_escape_string($con, $_POST['id']);

if(isset($id) && isset($arg)) {

   $query6 = "SELECT * FROM users WHERE id = '$id' limit 1";
   $result6 = mysqli_query($con, $query6);
    $query7 = "SELECT * FROM users WHERE id = '$arg' limit 1";
   $result7 = mysqli_query($con, $query7);

	$row1 = mysqli_fetch_assoc($result6);
	$row2 = mysqli_fetch_assoc($result7);

	// Print the IDs and names
	echo $row1['name'] . " <=> " . $row2['name'];
   
}
mysqli_close($con);
?>
