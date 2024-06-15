	<?php
	include("connection.php");
	$data3="";
	if($_SERVER['REQUEST_METHOD']== "POST")
	{
		//Something was posted
		$user1=$_POST['s-name'];
		$Id=$_POST['s-id'];
		$email =$_POST['s-email'];
		$password_1 =  $_POST['s-pass1'];
  		$password_2 =  $_POST['s-pass2'];
  		$imageFilename=" ";
  		if (isset($_FILES['s-image'])){
			    $image = $_FILES['s-image'];
			    if (is_uploaded_file($image['tmp_name'])) {
			        $imageFilename = $image['name'];
			        $imageTmpName = $image['tmp_name'];

			        $uploadsDir = 'uploads/';
			        move_uploaded_file($imageTmpName, $uploadsDir . $imageFilename);
			     }
		  }
  		
		 if($password_1 != $password_2) {
			$data3= "The two passwords do not match";
 		 }
 		
			
 		if (!empty($user1) && !is_numeric($user1)  && preg_match('/^[a-zA-Z]/', $user1))
 			{
				if (!empty(trim($email)) && !empty(trim($password_1)) && !empty(trim($Id)) && !empty(trim($imageFilename))	&& !empty(trim($password_1)) )
				{
					$query="select * from users where email= '$email' and user_id='$Id' limit 1";
					$result=mysqli_query($con,$query);
					if($result)
					{
						if($result && mysqli_num_rows($result)==0)
						{

							$sql = "INSERT INTO users (name, user_id, email, password, image) VALUES (?, ?, ?, ?, ?)";

							$stmt = mysqli_prepare($con, $sql);

							// Assuming $u_id, $pst_id, $type, $tag1, $tag2, and $u1_id are your variables
							mysqli_stmt_bind_param($stmt, "sssss", $user1, $Id, $email, $password_1, $imageFilename);

							// Execute the prepared statement
							mysqli_stmt_execute($stmt);

							// Close the statement
							mysqli_stmt_close($stmt);
							header("Location:index.php");
							die;
						}else{
							$data3="Sorry this email or Id is already registred..";
						}
					}
				}else
				{
					$data3= "please enter some valid information..";
				}
			
			}else{
				$data3="username starts with letter only..";
			}

 		
 	}	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>signup</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/cae14f18b4.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="soo.css">
	<style type="text/css">
		 input[type="file"]{
            display: none;
        }
	</style>
</head>
<body>

	<div class="container-fluid mt-0">
  		<div class="row">

  			<div class="col-lg-12 home">
  				<div class="inner-div1">
  					<center style="color: red"><?php echo $data3;?></center>
  				</div>
  				<div class="inner-div2">
  					<div class="inner-div3">
  						WELCOME
  					</div>	
  					<div class="inner-div8">
  						<div class="inner-div9">
  							   <i class="fa-solid fa-tower-broadcast"></i>
  							 <label>Emergency</label>
  						</div>
  						<div class="inner-div9">
  							 <i class="fa-solid fa-hospital"></i>
  							 <label>Helped Members</label>
  						</div>
  						<div class="inner-div9">
  							 <i class="fa-solid fa-hospital-user"></i>
  							 <label>Committee Members</label>
  						</div>
  						<div class="inner-div9">
  							 <i class="fa-solid fa-hand-holding-heart"></i>
  							<label>Donation</label>
  						</div>
  						<div class="inner-div9">
  							<i class="fa-solid fa-link"></i>
  							 <label>Hop-Messenger</label>
  						</div>

					<div class="inner-div9">
						 <i class="fa-solid fa-lock"></i>
						 <label>Hop-Admin</label>
						</div>  			
					</div>	
  					<div class="inner-div4">
  						<div class="inner-div5">
  							signup
  						</div>
  						<div class="inner-div6">
	  						<form method="post" enctype="multipart/form-data" onsubmit="return validee()">
	  							<div class="inner-div7">
	  								<i class="fa-solid fa-user"></i><input type="text" name="s-name" placeholder="Enter username.." id="username" class="form-control">
	  							</div>
	  							 <div class="inner-div7">
	  								<i class="fa-solid fa-id-card-clip"></i><input type="text" name="s-id" placeholder="Enter Id.." id = "userId" class="form-control">
	  							</div>
	  							<div class="inner-div7">
	  								<i class="fa-solid fa-envelope"></i><input type="email" name="s-email" placeholder="Enter email.." id="mail" class="form-control">
	  							</div>
	  							<div class="inner-div7">
	  								<i class="fa-solid fa-key"></i><input type="password" name="s-pass1" placeholder="Enter password.." id="pass1" class="form-control">
	  							</div>
	  							<div class="inner-div7">
	  								<i class="fa-solid fa-lock"></i></i><input type="password" name="s-pass2" placeholder="ReEnter password.."id="pass2" class="form-control">
	  							</div>
	  							<div class="inner-div7">
	  								<i class="fa-solid fa-id-badge"></i><input type="file" name="s-image" id="s-img" accept="image/*"><label for="s-img" style="cursor:pointer;" id="sim">Update Dp</label>
	  							</div>
	  							<div class="inner-div7">
	  								<center><button type="submit" class="btn btn-secondary" id="s-sb"> Signup</button></center>
	  							</div>

	  						</form>
	  						<div class="inner-div7">
	  								<a href="index.php">LogIn</a>
	  							</div>
  						</div>
  					</div>	
  				</div>
  			</div>
  		</div>
  	</div>

 <script>
function validee(){
        
        var data1 = $('#username').val();
		var data2 = $('#userId').val();
		var data3 = $('#mail').val();
		var data4 = $('#pass1').val();
		var data6 = $('#pass2').val();
		var data5 = $('#s-img').val();

	    // Check if any of the text fields are empty
    if (data1.trim().length === 0 || data2.trim().length === 0 || data3.trim().length === 0 || data4.trim().length === 0 || data6.trim().length === 0) {
        alert('All fields must be filled.');
        return false;
    }

    // Check if any of the text fields exceed the length limit
    if (data1.length > 20 || data2.length > 20) {
        alert('Enter valid length (less than or equal to 15).');
        return false;
    }

    // Check if an image is uploaded
    if (data5.length === 0) {
        alert('Please upload an image.');
        return false;
    }

    return true;
}

 
        function adjustForKeyboard() {
            if (document.activeElement.tagName === 'INPUT' || document.activeElement.tagName === 'TEXTAREA') {
                document.body.classList.add('keyboard-open');
                setTimeout(() => {
                    document.activeElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300); // Adjust delay as needed
            } else {
                document.body.classList.remove('keyboard-open');
            }
        }

        window.addEventListener('resize', adjustForKeyboard);
        document.addEventListener('focusin', adjustForKeyboard);
        document.addEventListener('focusout', adjustForKeyboard);
</script>
</body>
</html>