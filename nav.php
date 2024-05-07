<style>
	.nav{
		width:100%;
		background-color:black ;
		overflow: hidden;

	}
	.nav a{
		padding: 14px 16px;
		float: left;
		text-decoration: none;
		color: #fff;
		font-family: "Lucida Console", "Courier New", monospace;
		font-size: 20px;
		
	}
	.nav a:hover{
		background-color:#fff;
		color: black;
	}
	.nav a.active{
		background-color:#088;
		color: white;
	}

</style>
<?php 
	session_start();
	
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
		$loggedin= true;
		$user_id = $_SESSION['user_id'];
		$username = $_SESSION['username'];

	}
	else{
		$loggedin = false;
		$user_id = 0;
	}


	echo '<div class="nav">
			<a href="index.php" class="active">Esperanto</a>';
			
	if($loggedin){
		
		echo '<a style="float:right" href="profile.php">Profile</a>
			  <a style="float:right" href="board.php">Leaderboard</a>';
		
	}else{
		echo '<a style="float:right" href="login.php">Login</a>
			  <a style="float:right" href="board.php">Leaderboard</a>';
	}
			
			
	echo '</div>';
	
?>
	
