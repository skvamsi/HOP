<?php
	include("connection.php");
	
	//emergency upload
	if (isset($_POST['e-btn'])) {
    // Check if all necessary fields are not empty
    if (!empty($_POST["e-name"]) && !empty($_POST["e-id"]) && !empty($_POST["e-city"]) && !empty($_POST["e-txt"])) {
        // Extract form data
        $name = $_POST['e-name'];
        $id = $_POST['e-id'];
        $city = $_POST['e-city'];
        $txt = $_POST['e-txt'];
        
        // Check if an image is uploaded
        if (isset($_FILES['e-image']) && $_FILES['e-image']['error'] === UPLOAD_ERR_OK) {
            // Get image details
            $image = $_FILES['e-image'];
            $imageFilename = $image['name'];
            $imageTmpName = $image['tmp_name'];

            // Specify upload directory
            $uploadsDir = 'upload/';
            
            // Move the uploaded file to the upload directory
            if (move_uploaded_file($imageTmpName, $uploadsDir . $imageFilename)) {
                // Insert data into the database
                $sql = "INSERT INTO emergency (name, R_id, city, need, image) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $sql);
                
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "sssss", $name, $id, $city, $txt, $imageFilename);
                
                // Execute the prepared statement
                mysqli_stmt_execute($stmt);
                
                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "Failed to move the uploaded file.";
            }
        } else {
            echo "No image uploaded.";
        }
    } else {
        echo "All fields are required.";
    }
}


		//helped upload
	if (isset($_POST['h-btn'])) {
	   
	        if (!empty(trim($_POST["h-name"])) && !empty(trim($_POST["h-id"])) && !empty(trim($_POST["h-city"])) && !empty(trim($_POST["h-campus"])) && !empty(trim($_POST["h-txt"])))
	        {
	            if (isset($_POST["h-name"]) && isset($_POST["h-id"]) && isset($_POST["h-city"]) && isset($_POST["h-campus"]) && isset($_POST["h-txt"])){

	            	$name = $_POST['h-name'];
	            	$id = $_POST['h-id'];
	            	$city = $_POST['h-city'];
	            	$campus = $_POST['h-campus'];
	            	$txt = $_POST['h-txt'];
				            	// Check if an image is uploaded
			        if (isset($_FILES['h-image']) && $_FILES['h-image']['error'] === UPLOAD_ERR_OK) {
			            // Get image details
			            $image = $_FILES['h-image'];
			            $imageFilename = $image['name'];
			            $imageTmpName = $image['tmp_name'];
			            $uploadsDir = 'upload/';
			            
			            // Move the uploaded file to the upload directory
			            if (move_uploaded_file($imageTmpName, $uploadsDir . $imageFilename)) {
			                // Insert data into the database
			                $sql = "INSERT INTO helped (name, R_id, city, need, image, campus) VALUES (?, ?, ?, ?, ?, ?)";
			                $stmt = mysqli_prepare($con, $sql);
			                
			                // Bind parameters
			                mysqli_stmt_bind_param($stmt, "ssssss", $name, $id, $city, $txt, $imageFilename, $campus);

						// Execute the prepared statement
						mysqli_stmt_execute($stmt);

						// Close the statement
						mysqli_stmt_close($stmt);
					}
				}
			}
		}
	}

			//committee upload
	if (isset($_POST['c-btn'])) {
	   
	        if (!empty(trim($_POST["c-name"])) && !empty(trim($_POST["c-id"])) && !empty(trim($_POST["c-city"])) && !empty(trim($_POST["c-campus"])) && !empty(trim($_POST["c-txt"])))
	        {
	            if (isset($_POST["c-name"]) && isset($_POST["c-id"]) && isset($_POST["c-city"]) && isset($_POST["c-campus"]) && isset($_POST["c-txt"])){

	            	$name = $_POST['c-name'];
	            	$id = $_POST['c-id'];
	            	$city = $_POST['c-city'];
	            	$campus = $_POST['c-campus'];
	            	$txt = $_POST['c-txt'];
	            // Check if an image is uploaded
			        if (isset($_FILES['c-image']) && $_FILES['c-image']['error'] === UPLOAD_ERR_OK) {
			            // Get image details
			            $image = $_FILES['c-image'];
			            $imageFilename = $image['name'];
			            $imageTmpName = $image['tmp_name'];
			            $uploadsDir = 'upload/';
			            
			            // Move the uploaded file to the upload directory
			            if (move_uploaded_file($imageTmpName, $uploadsDir . $imageFilename)) {
			                // Insert data into the database
			                $sql = "INSERT INTO committee (name, R_id, city, need, image, campus) VALUES (?, ?, ?, ?, ?, ?)";
			                $stmt = mysqli_prepare($con, $sql);
			                
			                // Bind parameters
			                mysqli_stmt_bind_param($stmt, "ssssss", $name, $id, $city, $txt, $imageFilename, $campus);

						// Execute the prepared statement
						mysqli_stmt_execute($stmt);

						// Close the statement
						mysqli_stmt_close($stmt);
					}
				}
			}
		}
	}