<?php
session_start();
include('db.php');


if (isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
   

  
		// Check whether this username exists
		$existSql = "SELECT * FROM `user` WHERE username = '$username'";
		$result = mysqli_query($conn, $existSql);
		$numExistRows = mysqli_num_rows($result);
		if($numExistRows > 0){
					echo '<script>alert("Username Registered! Please choose again.");
				window.location.href="signup.php";</script>';
			}
		else{
        
			if(($password == $cpassword)){
				$hash = password_hash($password, PASSWORD_DEFAULT);
				$_query = "INSERT INTO `user` ( `username`,`email`, `password`, `score`) VALUES ('$username', '$email', '$hash', 0)";   
				$query_run = mysqli_query($conn, $_query);
					if ($query_run)
					{
	
						$_SESSION['status'] = "Registration Successful! ";
						echo '<script>alert("Registration Successful! ");
						window.location.href="login.php";</script>';
					}		
					else 
					{
						$_SESSION['status'] = "Registration Failed";
						//header("Location: /DailyFreshOrderingSystem/index.php?signupsuccess=false&error=$showError");
						echo '<script>alert("Registration Failed! ");
						window.location.href="signup.php";</script>';
					}
			}
			else{
				//$showError = "Passwords do not match";
				//header("Location: /DailyFreshOrderingSystem/index.php?signupsuccess=false&error=$showError");
				echo '<script>alert("Password not match! Please try again. ");
				window.location.href="signup.php";</script>';
				}  
			}				
		
    
} 
?>
