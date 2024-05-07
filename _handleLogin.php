<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db.php';
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"]; 
    
    $sql = "Select * from user where username='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        if (password_verify($password, $row['password'])){ 
           				
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['user_id'] = $user_id;
				echo '<script>alert("Welcome Back!");
				window.location.href="index.php";</script>';
				exit();
				
		}else{
			echo '<script>alert("Wrong Password!");
				window.location.href="login.php";</script>';
			
		}
    } 
    else{
       echo '<script>alert("Invalid Username!");
			window.location.href="login.php";</script>';
    }
}    
?>