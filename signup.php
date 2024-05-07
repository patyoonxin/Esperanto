<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Login</title>
	<style>
	*
	{
		margin:0;
		padding:0;
		box-sizing:border-box;
	}
	body
	{
		min-height:100vh;
		/*background: #0c192c;*/
		background:black;
		justify-content: center;
		align-items:center;
	}
	.container
	{
		position:relative;
		width:100%;
		height:100vh;
		overflow:hidden;
	}
	
	div.relative {
		position: relative;
		text-align:center;
		margin: auto;
		width: 640px;
		padding: 50px;
		font-family: "Lucida Console", "Courier New", monospace;
		color:white;
	}
	.buttonStart{
		position:relative;
		display:inline-block;
		font-size:1.5em;
		letter-spacing: .1em;
		color: #0ef;
		text-decoration:none;
		text-transform:uppercase;
		border: 2px solid #0ef;
		padding: 10px 30px;
		z-index:1;
		overflow:hidden;
		transition:color 1s, box-shadow 1s;
		
	}
	.buttonStart:hover
	{
		color:#fff;
		box-shadow: 
			0 0 10px #0ef,
			0 0 20px #0ef,
			0 0 40px #0ef,
			0 0 80px #0ef,
			0 0 160px #0ef;
		transition-delay:0s,1s;
	}
	.buttonStart::before
	{
		content: '';
		position:absolute;
		top:0;
		left:-50px;
		width:0;
		height:100%;
		background: #0ef;
		transform: skewX(35deg);
		z-index:-1;
		transition:1s;
	}
	.buttonStart:hover:before
	{
		width:100%;
		
	}

	</style>
</head>
<body>
	<?php include 'db.php';?>
	<?php include 'nav.php'; ?>
  
	<div class="content">
	<div class="container">
	<div class="relative">
			<?php
			if(isset($_SESSION['status']))
			{
				echo"<h4>".$_SESSION['status']."</h4>";
				unset($_SESSION['status']);
				echo"<br>";
			}else{
			
            echo"<h1 style='font-size: 55px;'>SignUp Here</h1>";
			}
			?>


            <form action="_handleSignup.php" method="post">
              <div class="form-group">
                  <b><label for="username" style="font-size:25px;">Username:</label></b>
                  <input class="form-control" id="username" name="username" placeholder="Choose an Unique Username" type="text" >
			
              </div>
              
              <div class="form-group">
                  <b><label for="email" style="font-size:25px;">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              
              <div class="form-group">
                  <b><label for="password" style="font-size:25px;">Password:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required data-toggle="password" >
              </div>
              <div class="form-group">
                  <b><label for="password1" style="font-size:25px;">Renter Password:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Renter Password" type="password" required data-toggle="password">
				
              </div>
              <button type="submit" class="buttonStart" name="register_btn" >Submit</button>
            </form>
            		
			
          
      </div>
    </div>
</div>
	
</body>
</html>
