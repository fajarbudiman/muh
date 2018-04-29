<html>
<head>
	<title>Sistem Akademik</title>
	<link href="css/login.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.jpg">
</head>
<body>
<div class="login-box">
	<h1>Login System</h1>
	<form method="POST" action="cek_login.php">
	<div class="textbox">
		<i class="fa fa-user" aria-hidden="true"></i>
		<input name="username" type="text" placeholder="NUPTK">
	</div>

	<div class="textbox">
	<i class="fa fa-lock"></i>
	<input name="password" type="password" placeholder="Password">
	</div>

	<div>
		<select name="level" class="select">
			<option value='++' selected>---- Pilih Level ----</option>
			<option value='1'>Administrator</option>
			<option value='2'>Staff Kampus</option>
		</select>
	</div>
	<br>
	<div id="login-box-field">
		<input class="btn" type="submit" value="Login"><br><br>
	</div>
	</form>
</div>

</body>
</html>