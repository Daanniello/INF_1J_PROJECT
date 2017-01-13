<?php include "includes/topinclude.php"; ?>
<div class="inhoud">
    <form enctype="multipart/form-data" action="Register.php" method="post">
        <label class="formlabel">Gebruikersnaam: </label><input type="text" name="username"><br>
        <label class="formlabel">wachtwoord: </label><input type="password" name="password"><br>
        <label class="formlabel">herhaal wachtwoord: </label><input type="password" name="password1"><br>
        <label class="formlabel">E-mail: </label><input type="text" name="mail"><br>
        <label class="formlabel">Naam: </label><input type="text" name="naam"><br>
        <label class="formlabel">Telefoonnummer: </label><input type="number" name="telefoon"><br>
        <label class="formlabel">School: </label><input type="text" name="school"><br>
        <label class="formlabel">Geboortedatum: </label><input type="date" name="geboortedatum"><br>
        <label class="formlabel">Woonplaats: </label><input type="text" name="woonplaats"><br>
        <label class="formlabel">Adres: </label><input type="text" name="adres"><br>
        <label class="formlabel">Postcode: </label><input type="text" name="postcode"><br>
        <label class="formlabel">Land: </label><input type="text" name="land"><br>
        <label class="formlabel">Profiel foto: </label><input type="file" name ="upload"><br>
        <input type="submit" name="submit">
    </form>
    <?php
    if (isset($_POST["submit"]))
    {
        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["mail"]) || empty($_POST["naam"]) || empty($_POST["telefoon"]) || empty($_POST["school"]) || empty($_POST["geboortedatum"]) || empty($_POST["woonplaats"]) || empty($_POST["adres"]) || empty($_POST["postcode"]) || empty($_POST["land"]) || empty($_FILES["upload"]))
        {
            echo "You have not filled everything in. ";
        } elseif ($_POST["password"] !== $_POST["password1"])
        {
            echo "the password is not the same.";
        } elseif (strlen($_POST['password']) < 6 || strlen($_POST['username']) < 6)
        {
            echo "Your password and username must have atleast 6 characters";
        } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
        {
            echo "Email is not correct";
        } elseif (strlen($_POST['telefoon']) < 6)
        {
            echo "Number is not correct";
        } else
        {
            require 'connection_database.php';

            function better_crypt($input, $rounds = 7)
            {
                $salt = "";
                $salt_chars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
                for ($i = 0; $i < 22; $i++)
                {
                    $salt .= $salt_chars[array_rand($salt_chars)];
                }
                return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
            }

            $username = $_POST["username"];
            $password = $_POST["password"];
            $password_hash = better_crypt($password);
            $mail = $_POST["mail"];
            $upload = $_FILES["upload"]["name"];
            $naam = $_POST["naam"];
            $telefoon = $_POST["telefoon"];
            $school = $_POST["school"];
            $geboorte = $_POST["geboortedatum"];
            $woonplaats = $_POST["woonplaats"];
            $adres = $_POST["adres"];
            $postcode = $_POST["postcode"];
            $land = $_POST["land"];
            $string = "INSERT INTO gebruiker (gebruikerID,gebruiker,rechtcode,wachtwoord) VALUES (NULL,'$username',1,'$password_hash')";
            $stringcheck = "SELECT Gebruiker, Email FROM gebruiker,student WHERE Gebruiker = '$username' OR Email = '$mail'";
            $querycheck = mysqli_query($DBConnect, $stringcheck);
            $target_path = "includes/profielfoto/";
            $target_path = $target_path . $username . substr(basename($_FILES['upload']['name']), strrpos(basename($_FILES['upload']['name']), "."), 5);
            $imageFileType = pathinfo($target_path, PATHINFO_EXTENSION);
            if (mysqli_num_rows($querycheck) == 1)
            {
                echo "username or mail already taken";
            } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
            {
                echo "only JPG, PNG en JPEG files.";
            } else
            {
                mysqli_query($DBConnect, $string);
                $stringGetID = "SELECT gebruikerID FROM gebruiker WHERE gebruiker = '$username'";
                $ResultID = mysqli_query($DBConnect, $stringGetID);
                $gebruikerIDarray = mysqli_fetch_assoc($ResultID);
                $gebruikerID = $gebruikerIDarray['gebruikerID'];
                $stringstudent = "INSERT INTO student (Studentnummer,naam,telefoonnummer,email,land,woonplaats,adres,postcode,school,geboortedatum,slbproductcode,profielfoto,gebruikerid) VALUES ('$gebruikerID','$naam','$telefoon','$mail','$land','$woonplaats','$adres','$postcode','$school','$geboorte',NULL,'$upload','$gebruikerID')";
                mysqli_query($DBConnect, $stringstudent);


                if (move_uploaded_file($_FILES['upload']['tmp_name'], $target_path))
                {
                    
                } else
                {
                    echo "There was an error uploading the file, please try again!";
                }
                echo "finished";
            }
        }
    }
    ?>
</div>
<?php include "includes/botinclude.php"; ?>