<?php include "includes/topinclude.php"; ?>
	<div class="inhoud">
		<form action="#" method="post">
			<label class="formlabel">Username: </label><input type="text" name="username"><br>
			<label class="formlabel">Password: </label><input type="password" name="password"><br>
			<input type="submit" name="sub">
		</form>
           
		<?php
                
			if (isset($_POST["sub"])) {
				require "connection_database.php";
				if (empty($_POST["username"]) || empty($_POST["password"])) {
					echo "You have tof hdshsvdjk";
				} else {
					$username = $_POST["username"];
					$password = $_POST["password"];
					$string = "SELECT Gebruiker, Wachtwoord, GebruikerID, rechtcode FROM gebruiker WHERE BINARY gebruiker = '$username'";
					$result = mysqli_query($DBConnect, $string);
					$count = mysqli_num_rows($result);
					$row = mysqli_fetch_assoc($result);
                                        $password_crypt = $row['Wachtwoord'];
                                    
					if ($count == 1) {
						$_SESSION['id'] = $row["GebruikerID"];
						
						if ($row["rechtcode"]== 2){
							$_SESSION['login_docent']= 2;
						} elseif($row["rechtcode"]== 3){
							$_SESSION['login_slber']= 3;
						} else {
							$_SESSION['login_user'] = 1;
						}
						$_SESSION['username']= $username;

						header("location: index.php");
					} else {
						echo "Je gebruikersnaam of wachtwoord is verkeerd";
					}
				}
			}
		?>
	</div>
<?php include "includes/botinclude.php"; ?>
