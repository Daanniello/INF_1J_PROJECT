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
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/css.css"> 
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="headerimg">
                    <a href="index.php"><img src="includes/images/stenden_logo.png"></a>
                </div>
                <?php
                    print_r($_SESSION);
                    if (isset($_SESSION['username'])) {
                        echo "Hello {$_SESSION['username']}!";
                        #echo "GebruikerID: {$_SESSION['ID']}";
                    }
                    echo "</div>";
                    echo "<div class='nav'>";
                        echo "<ul>";
							echo "<li class='li_opmaak'><a href='index.php' class='a_opmaak' >Home</a></li>";
							if(isset($_SESSION["id"])) {
								echo "<li class='li_opmaak'><a href='logout.php' class='a_opmaak' >Log out</a></li>";
							} else {
								echo "<li class='li_opmaak'><a href='login.php' class='a_opmaak'>Log in </a></li>";
								echo "<li class='li_opmaak'><a href='register.php' class='a_opmaak'>Register </a></li>";
							}
							echo "<li class='li_opmaak'><a href='portfolio.php' class='a_opmaak'>Portfolio </a></li>";
								
							
                        echo "</ul>";
                    echo "</div>";
                ?>
                <div class="clear"></div>
