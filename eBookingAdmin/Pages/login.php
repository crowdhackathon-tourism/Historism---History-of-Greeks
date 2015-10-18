<!DOCTYPE html>
<html lang="en" class="cover">
	<head>
		<meta charset="utf-8">
		<title>Sign In | GoExplore! Travel Website Template</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="../../assets/css/imports.css" media="screen">
		<link rel="stylesheet" href="../../assets/css/bootstrap.min.css" media="screen">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login">

		<div id="login">
			<h1><img src="../assets/images/login-logo.png" alt="GoExplore!" style="max-height:200px; width:auto; max-width:100%;"></h1>
			<form id="loginform"  action="Pages/loginResponse.php"  method="POST">

				<p>
					<label for="user_login">Username<br>
					<input type="text" name="username"  id="user_login" class="input" value="" size="20"></label>
				</p>

				<p>
					<label for="user_pass">Password<br>
					<input type="password" name="password"  id="user_pass" class="input" value="" size="20"></label>
				</p>

				<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>

				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary button-large" value="Log In">
				</p>

			</form>
		</div> <!-- /login -->

	</body>
</html>
