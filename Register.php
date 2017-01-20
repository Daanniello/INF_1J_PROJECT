<?php
include "includes/topinclude.php";
$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d 	&lsquo;Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People&lsquo;s Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People&lsquo;s Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
?>
<div class="inhoud">
    <form enctype="multipart/form-data" action="Register.php" method="post">
        <label class="formlabel">Gebruikersnaam: </label><input type="text" name="username"><br>
        <label class="formlabel">Wachtwoord: </label><input type="password" name="password"><br>
        <label class="formlabel">Herhaal wachtwoord: </label><input type="password" name="password1"><br>
        <label class="formlabel">E-mail: </label><input type="text" name="mail"><br>
        <label class="formlabel">Naam: </label><input type="text" name="naam"><br>
        <label class="formlabel">Telefoonnummer: </label><input type="number" name="telefoon"><br>
        <label class="formlabel">School: </label><input type="text" name="school"><br>
        <label class="formlabel">Geboortedatum: </label><input type="date" name="geboortedatum"><br>
        <label class="formlabel">Woonplaats: </label><input type="text" name="woonplaats"><br>
        <label class="formlabel">Adres: </label><input type="text" name="adres"><br>
        <label class="formlabel">Postcode: </label><input type="text" name="postcode"><br>
        <label class="formlabel">Land: </label>
		<select id="select_country" name="land">
                <?php
                foreach ($countries as $country) {
                    echo "<option value='$country'>$country</option>\n";
                }
                ?>
        </select><br>
        <label class="formlabel">Profiel foto: </label><input type="file" name ="upload"><br>
        <input type="submit" name="submit">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["mail"]) || empty($_POST["naam"]) || empty($_POST["telefoon"]) || empty($_POST["school"]) || empty($_POST["geboortedatum"]) || empty($_POST["woonplaats"]) || empty($_POST["adres"]) || empty($_POST["postcode"]) || empty($_POST["land"]) || empty($_FILES["upload"])) {
            echo "You have not filled everything in. ";
        } elseif ($_POST["password"] !== $_POST["password1"]) {
            echo "the password is not the same.";
        } elseif (strlen($_POST['password']) < 6 || strlen($_POST['username']) < 6) {
            echo "Your password and username must have atleast 6 characters";
        } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            echo "Email is not correct";
        } elseif (strlen($_POST['telefoon']) < 6) {
            echo "Number is not correct";
        } else {
            require 'connection_database.php';

            function better_crypt($input, $rounds = 7) {
                $salt = "";
                $salt_chars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
                for ($i = 0; $i < 22; $i++) {
                    $salt .= $salt_chars[array_rand($salt_chars)];
                }
                return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
            }

            $username = $_POST["username"];
            $password = $_POST["password"];
            $password_hash = better_crypt($password);
            $mail = $_POST["mail"];
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
            $upload = ".$imageFileType";
            if (mysqli_num_rows($querycheck) == 1) {
                echo "username or mail already taken";
            } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "only JPG, PNG en JPEG files.";
            } else {
                mysqli_query($DBConnect, $string);
                $stringGetID = "SELECT gebruikerID FROM gebruiker WHERE gebruiker = '$username'";
                $ResultID = mysqli_query($DBConnect, $stringGetID);
                $gebruikerIDarray = mysqli_fetch_assoc($ResultID);
                $gebruikerID = $gebruikerIDarray['gebruikerID'];
                $stringstudent = "INSERT INTO student (Studentnummer,naam,telefoonnummer,email,land,woonplaats,adres,postcode,school,geboortedatum,profielfoto,gebruikerid) VALUES ('$gebruikerID','$naam','$telefoon','$mail','$land','$woonplaats','$adres','$postcode','$school','$geboorte','$upload','$gebruikerID')";
                mysqli_query($DBConnect, $stringstudent);


                if (move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)) {
                    
                } else {
                    echo "There was an error uploading the file, please try again!";
                }
                echo "You have successfully registered";
            }
        }
    }
    ?>
</div>
    <?php include "includes/botinclude.php"; ?>