<?php

	//LOGIN.PHP
	//echo $_POST["email"];
	
	//kontrollime et keegi vajutas input nuppu
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//echo "keegi vajutas nuppu";
		//konrollin, et epost poleks tühi
		$email_error = "";
		$password_error = "";
		if ( empty($_POST["email"]) ) {
			$email_error = "See väli on kohustuslik";
		}
		//kontrolln, et parool ei oleks tühi
		if ( empty($_POST["firstname"]) ) {
			$firstname_error = "See väli on kohustuslik";
		}
		if ( empty($_POST["lastname"]) ) {
			$lastname_error = "See väli on kohustuslik";
		}
		
		if ( empty($_POST["password"]) ) {
			$password_error = "Parool on kohustuslik";
		} else {
		
		
		
			if(strlen($_POST["password"]) < 8) {
				$password_error = "Peab olema vähemalt 8 tähemärki pikk!";
			}
	}
	}
?>

<html>
<head>
<title>Login page</title>
</head>
<body>
	<h2>Log in</h2>
		<form action="login.php" method="post">
		<input name="email" type="email" placeholder="E-post"> <?php echo $email_error ?> <br> <br>
		<input name="password" type="password" placeholder="Parool"> <?php echo $password_error ?> <br> <br>
		<input type="submit" value="Log in"> <br> <br>
		</form>
		<h2>Create user </h2>


		<input name="email" type="email" placeholder="E-post"> <?php echo $email_error ?> <br> <br>

		<input name="password" type="password" placeholder="Parool"> <?php echo $password_error ?> <br> <br>

		<input name="firstname" type="firstname" placeholder="Eesnimi"> <?php echo $firstname_error ?> <br> <br>
		<input name="lastname" type="lastname" placeholder="Perekonnanimi"> <?php echo $lastname_error ?> <br> <br>
		<input type="submit" value="Sign up"> <br> <br>

		</form>
	
</body>
</html>




