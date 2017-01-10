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
        <title>Homo</title>
        <link rel="stylesheet" type="text/css" href="style/css.css"> 
    </head>
    <div class="social">
        <a href="https://twitter.com/stenden" target="_blank"><img class='image_socialx' src="includes/images/twitter.png" ></a>
        <a href="https://www.instagram.com/stenden/" target="_blank"><img class='image_social' src="includes/images/instagram.png" ></a>
        <a href="https://www.instagram.com/stenden/" target="_blank"><img class='image_social' src="includes/images/facebook.png" ></a>
        <a href="https://www.youtube.com/user/marketingstenden" target="_blank"><img class='image_social' src="includes/images/youtube.png" ></a>
    </div>
    <body>
        <div class="container">
            <div class="header">
                <div class="headerimg">
                    <a href="index.php"><img src="includes/images/stenden_logo.png"></a>
                </div>
                <div class="titel">
                    <h1>Port Stenden</h1>
                </div>
                <div class="avatar">
                    <?php
                    if (isset($_SESSION['username']))
                    {
                        require 'connection_database.php';
                        $query = "SELECT * FROM student WHERE GebruikerID = '{$_SESSION['login_user']}'";
                        $show = mysqli_query($DBConnect, $query);
                        $row = mysqli_fetch_assoc($show);
                        $fish = substr($row["Profielfoto"], strrpos($row["Profielfoto"], "."), 5);
                        echo "<a href='portfolio.php'><img src='includes/profielfoto/{$_SESSION['username']}{$fish}' width='100' height='100' ></a>";
                    } else
                    {
                        echo "<a href='portfolio.php'><img src='includes/images/avatar.png' width='100' height='100' ></a>";
                    }
                        ?>

                    </div>
                    <?php
                    print_r($_SESSION);
                    if (isset($_SESSION['username']))
                    {
                        echo "Hello {$_SESSION['username']}!";
                        #echo "GebruikerID: {$_SESSION['ID']}";
                    }
                    echo "</div>";
                    echo "<div class='nav'>";
						echo "<ul>";
							echo "<li class='li_opmaak'><a href='index.php' class='a_opmaak' >Home</a></li>";
							if (isset($_SESSION["id"]))
							{
								echo "<li class='li_opmaak'><a href='logout.php' class='a_opmaak' >Log out</a></li>";
								echo "<li class='li_opmaak'><a href='portfolio.php' class='a_opmaak'>Portfolio </a></li>";
							} else
							{
								echo "<li class='li_opmaak'><a href='login.php' class='a_opmaak'>Log in </a></li>";
								echo "<li class='li_opmaak'><a href='register.php' class='a_opmaak'>Register </a></li>";
							}
						echo "</ul>";
                    echo "</div>";
                    ?>

                <div class="clear"></div>
