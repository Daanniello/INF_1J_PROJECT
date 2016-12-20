<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/css.css"> 
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php
                print_r($_SESSION);
				echo "<br>";
                echo "<a href='logout.php'>Log out </a> <br>";
                echo "<a href='login.php'>Log in </a> <br>";
                echo "<a href='portfolio.php'>Portfolio </a><br>";
                echo "<a href='register.php'>Register </a><br>";
                if (isset($_SESSION['username']))
                {
                    echo "Hello {$_SESSION['username']}!";
                    #echo "GebruikerID: {$_SESSION['ID']}";
                }
                ?>
                <img src="includes/images/stenden.png">

            </div>