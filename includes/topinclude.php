<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stenden Portfolio</title>
        <link rel="stylesheet" type="text/css" href="style/css.css"> 
        <link rel="icon" href="includes/images/stenden_logo.png" type="image/x-icon"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="social">
            <a href="https://twitter.com/stenden" target="_blank">					<img class='image_social' src="includes/images/twitter.png" alt="Twitter"></a>
            <a href="https://www.instagram.com/stenden/" target="_blank">			<img class='image_social' src="includes/images/instagram.png" alt="Instagram"></a>
            <a href="https://www.facebook.com/stenden/" target="_blank">			<img class='image_social' src="includes/images/facebook.png" alt="Facebook"></a>
            <a href="https://www.youtube.com/user/marketingstenden" target="_blank"><img class='image_social' src="includes/images/youtube.png" alt="Youtube"></a>
        </div>
        <div class="container">
            <div class="header">
                <div class="headerimg">
                    <a href="index.php"><img src="includes/images/stenden_logo.png" alt="Stenden"></a>
                </div>
                <div class="titel">
                    <span>Port Stenden</span>
                    
                </div>

                <div class="avatar">
                    <?php
                    if (isset($_SESSION['username']))
                    {
                        require 'connection_database.php';
                        $query = "SELECT * FROM student WHERE GebruikerID = '{$_SESSION['id']}'";
                        $show = mysqli_query($DBConnect, $query);
                        $row = mysqli_fetch_assoc($show);
                        $proffoto = $row["Profielfoto"];
                        $pointpos = strrpos($row["Profielfoto"], ".");
                        $fish = substr($proffoto, $pointpos, 5);

                        echo "<a href='portfolio.php'><img src='includes/profielfoto/{$_SESSION['username']}{$fish}' alt='profielfoto' width='100' height='100' ></a>";
                    } else
                    {
                        echo "<a href='index.php'><img src='includes/images/avatar.png' alt='avatar' width='100' height='100' ></a>";
                    }
                    ?>

                </div>

                <div class="information">
                    <?php
                    if (isset($_SESSION['username']))
                    {
                        echo "<ul>
                        <li>{$row['Naam']}</li>
                        <li>{$row['Email']}</li>
                        <li>{$row['TelefoonNummer']}</li>
                    </ul>";
                    } else
                    {
                        
                    }
					
                    if (isset($_SESSION['username']))
                    {
                        require 'Connection_database.php';


                        echo "<br><form enctype='multipart/form-data' action='#' method='post'><input type='file' name='upload'><br><input type='submit' name='sub_foto' value='Change Photo'></form>";
                        if (isset($_POST['sub_foto']))
                        {
                            if (empty($_FILES['upload']['name']))
                            {
                                echo "<br><br>You can not leave it empty";
                            } else
                            {
                                $upload = $_FILES['upload']['name'];
                                $ext2 = pathinfo($upload, PATHINFO_EXTENSION);
                                $string = "UPDATE student SET Profielfoto = '.$ext2' WHERE GebruikerID = '{$_SESSION['id']}' ";
                                mysqli_query($DBConnect, $string);
                                $target_path = "includes/profielfoto/";

                                $target_path = $target_path . $_SESSION['username'] . substr(basename($_FILES['upload']['name']), strrpos(basename($_FILES['upload']['name']), "."), 5);

                                if (move_uploaded_file($_FILES['upload']['tmp_name'], $target_path))
                                {
                                    
                                } else
                                {
                                    echo "There was an error uploading the file, please try again!";
                                } echo "<br><br> It can take some time to change...";
                                echo "<meta http-equiv='refresh' content='0' ";
                            }
                        }
                    } else
                    {
                        
                    }
                    ?> 
                </div>
				
				<div class="session">
					<?php //print_r($_SESSION); ?>
				</div>
				
				<div class="nav">
                <?php
					echo "";
					echo "<ul>";
					echo "<li class='li_opmaak'><a href='index.php' >Home</a></li>";
					if (isset($_SESSION["id"])) {
						echo "<li class='li_opmaak'><a href='comment.php'>Comment</a></li>";
						if (isset($_SESSION['login_user'])) {
							echo "<li class='li_opmaak'><a href='portfolio.php'>Portfolio </a></li>";
							echo "<li class='li_opmaak'><a href='editpage.php'>Edit profile</a></li>";
							echo "<li class='li_opmaak'><a href='cijfer.php'>Cijfers</a></li>";
							echo "<li class='li_opmaak'><a href='cv.php'>Curriculum vitae</a></li>";
                                                        echo "<li class='li_opmaak'><a href='testPriveComment.php'>Prive berichten</a></li>";
						}
						if (isset($_SESSION['login_docent']) || isset($_SESSION['login_slber'])) {
							echo "<li class='li_opmaak'><a href='docent.php'>Studenten</a></li>";
						}
                                                if (isset($_SESSION['login_admin'])){
                                                        echo "<li class='li_opmaak'><a href='rechtaanpassen.php'>Recht Aanpassen</a></li>";
                                                }
						echo "<li class='li_opmaak'><a href='logout.php'>Log out</a></li>";
					} else {
						echo "<li class='li_opmaak'><a href='login.php'>Log in </a></li>";
						echo "<li class='li_opmaak'><a href='register.php'>Register </a></li>";
					}
					echo "</ul>";
                ?>
				</div>
				<div class="clear"></div>
			</div>