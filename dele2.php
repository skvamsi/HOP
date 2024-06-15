<?php
	session_start();
	include("connection.php");
	$ad = $_SESSION['id'];
	if(isset($_POST['id'])) {
		$id = $_POST['id'];
		// Prepare the SQL statement with a placeholder
		$sql = "DELETE FROM committee WHERE id = ?";
		// Prepare the statement
		$stmt = mysqli_prepare($con, $sql);
		if ($stmt) {
			// Bind parameters
			mysqli_stmt_bind_param($stmt, "i", $id); // Assuming id is an integer, change the "i" if it's not
			// Execute the statement
			mysqli_stmt_execute($stmt);
			// Check if deletion was successful
			if(mysqli_stmt_affected_rows($stmt) > 0) {
				echo "Refresh to see changes..";
			} else {
				echo "No records were deleted.";
			}
			// Close the statement
			mysqli_stmt_close($stmt);
		} else {
			// Error handling
			echo "Something went wrong..call to vamsi...";
		}
		// Close the connection
		mysqli_close($con);
	}
?>
