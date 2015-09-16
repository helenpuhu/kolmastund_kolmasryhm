<?php

	//LOGIN.PHP

	
//errori muutujad peavad igal juhul olemas olema	
	$email_error = "";
	$password_error = "";
	$name_error = "";
	
	//muutujad andmebaasi väärtuste jaoks
	$email = "";
	$name = "";
	
	//kontrollime et keegi vajutas input nuppu
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//echo "keegi vajutas nuppu";
		
		//echo "vajutas login nuppu!"
		if(isset($_POST["login"])){
			echo "vajutas login nuppu!";
			
			//kontrollin, et e-post poleks tühi
			if ( empty($_POST["email"]) ) {
				$email_error = "See väli on kohustuslik";
			} else {
				$email = test_input($_POST["email"]);
			}
			
			//kontrollin, et parool ei oleks tühi
			if ( empty($_POST["password"]) ) {
				$password_error = "Parool on kohustuslik";
			} else {
			
			
			//kontrollin, et parool oleks vähemalt 8 sümbolit pikk
				if(strlen($_POST["password"]) < 8) {
					$password_error = "Peab olema vähemalt 8 tähemärki pikk!";
				}
			}
			
			//kontrollin, et poleks erroreid
			if($email_error == "" && $password_error == "") {
				echo "kontrollisin sisselogimist ".$email." ja parool";
			}
			
			
				//keegi vajutas create nuppu
			} elseif(isset($_POST["create"])){
				echo "vajutas create nuppu!";
				
				//valideerimine create user vormile
				//kontrollin, et nimi ei ole tühi
				if (empty($_POST["name"])) {
					$name_error = "see väli on kohustuslik";
			} else{
				//kõik korras
				//test_input eemaldab pahatahtlikud osad
				$name = test_input($_POST["name"]);
			}
			
			if($name_error == "") {
				echo "salvestan andmebaasi:" .$name;
			}
		}
	}
			
		//kontrollin, et epost poleks tühi
		
		if ( empty($_POST["email"]) ) {
			$email_error = "See väli on kohustuslik";
		}
		//kontrollin, et parool ei oleks tühi
		if ( empty($_POST["name"]) ) {
			$name_error = "See väli on kohustuslik";
		}
	
		
		if ( empty($_POST["password"]) ) {
			$password_error = "Parool on kohustuslik";
		} else {
		
		
		
			if(strlen($_POST["password"]) < 8) {
				$password_error = "Peab olema vähemalt 8 tähemärki pikk!";
			}
		}
	
	
		function test_input($data) {
			//võtab ära tühikud, enterid, tabid
			$data = trim($data);
			//tagurpidi kaldkriipsud
			$data = stripslashes($data);
			//teeb htmli tekstiks
			$data = htmlspecialchars($data);
			return $data;
		}
		
?>
<?php 


$page_title = "Login";
$page_file_name = "login.php";
?>
<?php require_once("../header.php"); ?>
	<h2>Log in</h2>
		<form action="login.php" method="post">
			<input name="email" type="email" placeholder="E-post"> <?php echo $email; ?> <?php echo $email_error; ?> <br> <br>
			<input name="password" type="password" placeholder="Parool"> <?php echo $password_error ?> <br> <br>
			<input name="login" type="submit" value="Log in"> <br> <br>
		</form>
		<h2>Create user </h2>

		<form action="login.php" method="post">
		<input name="email" type="email" placeholder="E-post">* <?php echo $name; ?> <?php echo $email_error; ?> <br> <br>
		<input name="password" type="password" placeholder="Parool">* <?php echo $password_error; ?> <br> <br>
		<input name="name" type="name" placeholder="Eesnimi Perekonnanimi">* <?php echo $name_error; ?> <br> <br>

		<input name="create" type="submit" value="Create"> <br> <br>

		</form>
	
<?php require_once("../footer.php"); ?>


