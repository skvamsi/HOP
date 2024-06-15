<?php
include("connection.php");

if(isset($_POST['id_1'])){
    $id=$_POST['id_1'];
    if(isset($id))
    	$data2="select * from users where id='$id' limit 1";
	    	$qt1=mysqli_query($con,$data2);
	    	$et=mysqli_fetch_assoc($qt1);
    	if($qt1 && mysqli_num_rows($qt1)>0){
    		$data1 = "UPDATE users SET image = 'def.png' WHERE id = '$id'";
    	    	$qt=mysqli_query($con,$data1);
    	    	echo"Dp Removed...";
    	   }else{
    	   	echo"Dp Not Uploaded..Sorry";
    	   }
}
else{
        echo"invalid request";
     }
?>

	