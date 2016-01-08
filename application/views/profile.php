<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Profile</title>
	<meta charset="UTF-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
	integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
	integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style type="text/css">
	* {
		margin: 0px; 
		padding: 0px; 
	}
	body {
		background-color: rgb(245,245,245)
	}
	.container {
		border: 2px solid gray;
		border-radius: 5px;  
		height: 500px; 
		overflow: auto; 
		background-color: white; 
		margin-top: 40px; 
	}
	.header {
		margin-top: 10px; 
	}
	</style>	
</head>
<body>
	<div class="container col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
		<div class="row">
			<div class='col-xs-3 col-xs-offset-1'>
				<h4>Welcome <?php echo $first_name; ?></h4>
			</div>
			<div class="col-xs-2 col-xs-offset-6 header">
				<a href='users/logout'><p>Logout</p></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-offset-2">
				<h4>User Information</h4>
			</div>
		</div>
		<div class="row">
			<!-- Display user information -->
			<div class="col-xs-offset-2">
				First Name: <? echo $first_name; ?> <br>
				Last Name: <? echo $last_name; ?> <br>
				Email Address: <? echo $email; ?> <br>
			</div>
		</div>

	</div> <!-- End Container -->
</body> 
</head>