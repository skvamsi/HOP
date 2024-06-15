<?php
	session_start();
	include("connection.php");
	$id = $_SESSION['id'];
	if(isset($_POST['info'])){
		$info = $_POST['info'];
		$sql = "SELECT * FROM committee WHERE city = '$info'";
		$res = mysqli_query($con, $sql);
		if($res){
			foreach($res as $ROW3) {
				if($ROW3['city'] == $info){
					include("item-cs.php");
				}
				else if($ROW3['city'] == $info){
					include("item-cs.php");
				}else {
					include("item-cs.php");
				}
			}
		}else {
			echo "sorry not having any info...";
		}
	}
?>
