<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Sistem Stok</title>
<link rel="stylesheet" type="text/css" href="mycss/login.css" />
<script type="text/javascript" src="jquery_easyui/jquery.min.js"></script>
<script type="text/javascript" src="libs_js/login.js"></script>
</head>

<body>
<div class="lg-container">
		<h1>LOGIN USER</h1>
		<form action="akses/p_login_gudang.php" id="lg-form" name="lg-form" method="post">
			
		  <div>
			<label for="username">Username:</label>
			  <input type="text" name="username" id="username" placeholder="username"/>
		  </div>
			
			<div>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" placeholder="password" />
			</div>
			
			<div>				
				<button type="submit" id="login">Login</button>
			</div>
			
		</form>
		<div id="message"></div>
</div>
</body>
</html>