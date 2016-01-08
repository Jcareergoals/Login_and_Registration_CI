<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Registration</title>
	<meta charset='UTF-8'>
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
		.container {
		width: 960px; 
		border: 2px solid gray;
		border-radius: 5px; 
		padding: 20px;  
		margin: 40px auto; 
		}
		.form-horizontal {
			margin-top: 25px; 
		}
		span {
			color: red; 
		}	
	</style>	
</head>
<body>
	<?php $this->load->library('form_validation'); ?>
	<div class="container">
		<!-- ===================== Login Form ============================== -->
		<form action="/users/user_login" method='post' class="form-horizontal">
			<!-- Email Field -->
			<div class="form-group">
				<input type='hidden' name='form' value='login'>
				<label for='email' class='control-label col-xs-1 col-sm-2'>Email:</label>
				<div class="col-xs-5">
					<input type='text' id='email' name='email' class='form-control'>
					<? echo "<span>".$this->session->flashdata('email')."<span>"; ?>
				</div>
			</div>
			<!-- Password Field -->
			<div class="form-group">
				<label for="password" class='control-label col-xs-1 col-sm-2'>Password:</label>
				<div class="col-xs-5">
					<input type='password' id='password' name='password' class='form-control'>
					<?php echo "<span>".$this->session->flashdata('password')."</span>"; ?>
				</div>
			</div>
			<div class="col-xs-offset-5 col-sm-offset-6">
				<button type='submit' class='btn btn-default'>Login</button>
			</div>
		</form>  <!-- ============= End of Login Form ================== -->

		<!-- ======================== Registration Form =================== -->
		<form action='/users/user_login' method='post' class="form-horizontal">
			<!-- First Name field -->
			<div class="form-group">
				<input type='hidden' name='form' value='register'>
				<label for='first_name' class='col-xs-1 col-sm-2 control-label'>First Name:</label>
				<div class="col-xs-5">
					<input type='text' id='first_name' name='first_name' class='form-control'>
					<? echo "<span>".$this->session->flashdata('first_name')."<span>"; ?>
				</div>
			</div>
			<!-- Last Name Field -->
			<div class="form-group">
				<label for='last_name' class='control-label col-xs-1 col-sm-2'>Last Name:</label>
				<div class="col-xs-5">
					<input type='text' id='last_name' name='last_name' class='form-control'>
					<? echo "<span>".$this->session->flashdata('last_name')."<span>"; ?>
				</div>
			</div>
			<!-- Email Field -->
			<div class="form-group">
				<label for='email2' class='control-label col-xs-1 col-sm-2'>Email</label>
				<div class="col-xs-5">
					<input type='text' id='email2' name='email2' class='form-control'>
					<? echo "<span>".$this->session->flashdata('email2')."</span>"; ?>
				</div>
			</div>
			<!-- Password Field -->
			<div class="form-group">
				<label for='password2' class='control-label col-xs-1 col-sm-2'>Password</label>
				<div class="col-xs-5">
					<input type='password' id='password2' name='password2' class='form-control'>
					<? echo "<span>".$this->session->flashdata('password2')."</span>"; ?>
				</div>
			</div>
			<!-- Password Confirmation Field -->
			<div class="form-group">
				<label for='pass_conf' class='control-label col-xs-1 col-sm-2'>Confirm Password</label>
				<div class="col-xs-5">
					<input type='password' id='pass_conf' name='pass_conf' class='form-control'>
					<? echo "<span>".$this->session->flashdata('pass_conf')."</span>"; ?>
				</div>
			</div>
			<!-- Registration Form Submit Button -->
			<div class="col-xs-offset-5 col-sm-offset-6">
				<button type='submit' class='btn btn-default'>Register</button>
			</div>
		</form>  <!-- =============== End of Registration Form ============ -->
	</div> <!-- End Container -->
</body> 
</head>