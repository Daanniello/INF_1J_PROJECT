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
    </head>
    <div class="social">
        <a href="https://twitter.com/stenden" target="_blank"><img class='image_socialx' src="includes/images/twitter.png" ></a>
        <a href="https://www.instagram.com/stenden/" target="_blank"><img class='image_social' src="includes/images/instagram.png" ></a>
        <a href="https://www.facebook.com/stenden/" target="_blank"><img class='image_social' src="includes/images/facebook.png" ></a>
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
                    <?php print_r($_SESSION); ?>
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

                        echo "<a href='portfolio.php'><img src='includes/profielfoto/{$_SESSION['username']}{$fish}' width='100' height='100' ></a>";
                    } else
                    {
                        echo "<a href='index.php'><img src='includes/images/avatar.png' width='100' height='100' ></a>";
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
                        <li><a href='cijfer.php'>Cijfers</a></li>
                        <li><a href='cv.php'>Curriculum vitae</a></li>
                    </ul>";
                    } else
                    {
                        
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['username']))
                    {
                        require 'Connection_database.php';


                        echo "</br><form enctype='multipart/form-data' action='#' method='post'><input type='file' name='upload'><br><input type='submit' name='sub_foto' value='Change Photo'></form>";
                        if (isset($_POST['sub_foto']))
                        {
                            if (empty($_FILES['upload']['name']))
                            {
                                echo "<br><br>You can not leave it empty";
                            } else
                            {
                                $upload = $_FILES['upload']['name'];
                                $string = "UPDATE student SET Profielfoto = '$upload' WHERE GebruikerID = '{$_SESSION['id']}' ";
                                mysqli_query($DBConnect, $string);
                                $target_path = "includes/profielfoto/";

                                $target_path = $target_path . $_SESSION['username'] . substr(basename($_FILES['upload']['name']), strrpos(basename($_FILES['upload']['name']), "."), 5);

                                if (move_uploaded_file($_FILES['upload']['tmp_name'], $target_path))
                                {
                                    
                                } else
                                {
                                    echo "There was an error uploading the file, please try again!";
                                } echo "<br><br> It can take some time to change...";
                            }
                        }
                    } else
                    {
                        
                    }
                    ?> 
                </div>
                <?php
                echo "</div>";
                echo "<div class='nav'>";
                echo "<ul>";
                echo "<li class='li_opmaak'><a href='index.php' class='a_opmaak' >Home</a></li>";
                if (isset($_SESSION["id"]))
                {
                    echo "<li class='li_opmaak'><a href='logout.php' class='a_opmaak' >Log out</a></li>";
                    echo "<li class='li_opmaak'><a href='portfolio.php' class='a_opmaak'>Portfolio </a></li>";
                    echo "<li class='li_opmaak'><a href='comment.php' class='a_opmaak' >Comment</a></li>";
                    echo "<li class='li_opmaak1'><a href='editpage.php' class='a_opmaak' >Edit profile</a></li>";
                    if (isset($_SESSION['login_docent'])){
                        echo "<li class='li_opmaak'><a href='docent.php' class='a_opmaak' >Studenten</a></li>";
                    }
                } else
                {
                    echo "<li class='li_opmaak'><a href='login.php' class='a_opmaak'>Log in </a></li>";
                    echo "<li class='li_opmaak'><a href='register.php' class='a_opmaak'>Register </a></li>";
                }
                echo "</ul>";
                echo "</div>";
                ?>

                <div class="clear"></div>
