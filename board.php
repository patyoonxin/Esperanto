<!DOCTYPE html>
<html lang="en">
<head>
  <title>Leaderboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
	*
	{
		margin:0;
		padding:0;
		box-sizing:border-box;
	}
	body
	{
		font-family: "Lucida Console", "Courier New", monospace;
		background:black;
		justify-content: center;
		align-items:center;
	
	}
	.container
	{
		position:relative;
		overflow:hidden;
	}
	div.relative {
		position: relative;
		margin: auto;
		width: 640px;
		padding: 50px;
		font-family: "Lucida Console", "Courier New", monospace;
		color:white;
	}



	</style>
</head>
<body>
	<?php include 'db.php';?>
	<?php include 'nav.php'; ?>

	<div class="container">
		
		<div class="relative">
			<h2  style="font-size: 45px;text-align:center;"><b>LeaderBoard<b></h2>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Ranking</th>
						<th scope="col">Username</th>
						<th scope="col">Points</th>
					</tr>
				</thead>
				<tbody>
    <?php 

					$result = mysqli_query($conn, "SELECT username,score FROM user ORDER BY score DESC"); 
			
					$ranking = 1; 
					if (mysqli_num_rows($result)) { 
						while ($row = mysqli_fetch_array($result)) { 
							echo "<tr><th class='col-md-2'>{$ranking}</th> 
								<td>{$row['username']}</td> 
								<td>{$row['score']}</td></tr>"; 
							$ranking++; 
						} 
					} 
	?> 
    
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>