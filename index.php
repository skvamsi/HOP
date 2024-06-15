<?php
	session_start();
	include("connection.php");

	if($_SERVER['REQUEST_METHOD']== "POST")
	{

		$email=$_POST['l-name'];
		$password=$_POST['l-pass'];
 	
		if(!empty($email) && !empty($password))
		{
		

			$query="select * from users where name= '$email' or user_id='$email' limit 1";
			$result=mysqli_query($con,$query);
			if($result)
			{
				if($result && mysqli_num_rows($result)>0)
				{
					$user_data=mysqli_fetch_assoc($result);
					if($user_data['password']=== $password)
					{
						$_SESSION['id']=$user_data['id'];
						header("Location:hk.php");
						die;
					}
					else{
						 $error_message = 'Wrong email or password.';
					}
				}
				else{
					 $error_message = 'User Not Registered Sorry.';
				}
			}
			else
			{
				echo '<div class="error-message">Invalid Query.</div>';
			}
		}
		else
		{

			 $error_message = 'Email or Password is Empty.';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/cae14f18b4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="ins.css">
			<script>
    function validateForm() {
        var email = document.forms["loginForm"]["l-name"].value;
        var password = document.forms["loginForm"]["l-pass"].value;

        
        if (email === "") {
            alert("Id must be filled out");
            return false;
        }

        
        if (password === "") {
            alert("Password must be filled out");
            return false;
        }
    }
</script>
</head>
<body>
	

	<div class="container-fluid mt-0">
  		<div class="row">
  			<div class="col-lg-12 home">
  				<div class="inner-div6">
  					<div class="inner-div7">Help Our People</div>
  					<div class="inner-div8"><a href="signup.php">Signup</a>	</div>
  				</div>
  				<div class="inner-div1">
  					<div class="inner-div3">
  							<center style=" color: red"><?php if (isset($error_message)){ echo $error_message;
				} ?></center>
  						</div>  
  					
					<div class="inner-div2">
						
  						<div class="inner-div3">
  							User Login
  						</div>  
  						<div class="inner-div4">
  							<form method="post" onsubmit="return validateForm()" name="loginForm">
  								<div class="inner-div5">
  									<i class="fa-solid fa-user" id="ic"></i><input type="text" name="l-name" class="form-control" placeholder="UserName..">
  								</div>
  								<div class="inner-div5">
  									<i class="fa-solid fa-key" id="ic"></i><input type="password" name="l-pass" class="form-control" placeholder="User Password..">
  								</div> 
  								<div class="inner-div5">
	  								<center><button type="submit" class="btn btn-secondary" id="l-sb"><i class="fa-solid fa-share-from-square"></i></button></center>
	  							</div>
  							</form> 
  							<div class="inner-div5">
  								<div id="frg"><a href="#">Forgot Password</a></div>
  							</div>
  						</div>  	
  					</div>  					
  				</div>
  			</div>
  		</div>
  	</div>
</body>
</html>