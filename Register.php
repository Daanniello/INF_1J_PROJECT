<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css.css"> 
    </head>
    <body>
        <div class="container">
            <div class="header">
            </div>
            <div class="inhoud">
                <form action="Register.php" method="post">
                    Gebruikersnaam: <input type="text" name="username"><br>
                    wachtwoord: <input type="password" name="password"><br>
                    herhaal wachtwoord: <input type="password" name="password1"><br>
                    E-mail: <input type="text" name="mail"><br>
                    Naam: <input type="text" name="naam"><br>
                    Telefoonnummer: <input type="text" name="telefoon"><br>
                    School: <input type="text" name="school"><br>
                    Geboortedatum: <input type="text" name="geboortedatum"><br>
                    Woonplaats: <input type="text" name="woonplaats"><br>
                    Adres: <input type="text" name="adres"><br>
                    Postcode: <input type="text" name="postcode"><br>
                    Land: <input type="text" name="land"><br>
                    Profiel foto: <input type="file" name ="upload"><br>
                    <input type="submit" name="submit">

                </form>
                <?php
                if (isset($_POST["submit"]))
                {
                    if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["mail"]) || empty($_POST["naam"]) || empty($_POST["telefoon"]) || empty($_POST["school"]) || empty($_POST["geboortedatum"]) || empty($_POST["woonplaats"]) || empty($_POST["adres"]) || empty($_POST["postcode"]) || empty($_POST["land"]) || empty($_POST["upload"]))
                    {
                        echo "You have ";
                    } elseif ($_POST["password"] !== $_POST["password1"]){
                        echo "the password is not the same.";
                    }else
                    {
                        require 'connection_database.php';
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $mail = $_POST["mail"];
                        $upload = $_POST["upload"];
                        $naam = $_POST["naam"];
                        $telefoon = $_POST["telefoon"];
                        $school = $_POST["school"];
                        $geboorte = $_POST["geboortedatum"];
                        $woonplaats = $_POST["woonplaats"];
                        $adres = $_POST["adres"];
                        $postcode = $_POST["postcode"];
                        $land = $_POST["land"];
                        $string = "INSERT INTO gebruiker (gebruikerID,gebruiker,rechtcode,wachtwoord) VALUES (NULL,'$username',NULL,'$password')";
                        $stringstudent = "INSERT INTO student (Studentnummer,naam,telefoonnummer,email,land,woonplaats,adres,postcode,school,geboortedatum,slbproductcode,profielfoto,gebruikerid) VALUES (NULL,'$naam','$telefoon','$mail','$land','$woonplaats','$adres','$postcode','$school','$geboorte',NULL,'$upload',NULL)";
                        mysqli_query($DBConnect, $string);
                        mysqli_query($DBConnect, $stringstudent);
                        echo "finished";
                    }
                }
                ?>
            </div>
            <div class="footer">
            </div>
        </div>

    </body>
</html>
