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
                    <img src="includes/images/stenden.png">
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
                            echo "<li><a href='logout.php'>Log out</a></li>";
                            echo "<li><a href='login.php'>Log in </a></li>";
                            echo "<li><a href='portfolio.php'>Portfolio </a></li>";
                            echo "<li><a href='register.php'>Register </a></li>";
                        echo "</ul>";
                    echo "</div>";
                ?>
                <div class="clear"></div>
            </div>