<!DOCTYPE html>
<html>
    <head>
        <title>create database script</title>
    </head>
    <body>
        <?php
        $DBConnect = mysqli_connect("localhost", "root", "");
        if ($DBConnect === FALSE) {
            echo "<p>Unable to connect to the database server.</p>"
            . "<p>Error code " . mysqli_errno() . ": "
            . mysqli_error() . "</p>";
        } else {
            $DBName = "Digital_Portfolio";
            if (!mysqli_select_db($DBConnect, $DBName)) {
                $SQLstring = "CREATE DATABASE $DBName";
                $QueryResult = mysqli_query($DBConnect, $SQLstring);
                if ($QueryResult === FALSE) {
                    echo "<p>Unable to execute the query.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": " . mysqli_error($DBConnect) . "</p>";
                } else {
                    echo "<p>Database created</p>";
                }
            }
            mysqli_select_db($DBConnect, $DBName);
            $SQLTableDocent = "CREATE TABLE Docent
                                (
                                DocentCode int NOT NULL AUTO_INCREMENT,
                                Naam varchar(30),
                                Postvak int(4),
                                TelefoonNummer varchar(10),
                                Email varchar(40),
                                ProjectNummmer int,
                                GebruikerID int,
                                PRIMARY KEY (DocentCode),
                                FOREIGN KEY (ProjectNummmer) REFERENCES Project(ProjectNummer),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID)
                                )";
            $SQLTableStudent = "CREATE TABLE Student
                                (
                                StudentNummer int NOT NULL AUTO_INCREMENT,
                                Naam varchar(30),
                                TelefoonNummer varchar(10),
                                Email varchar(40),
                                Land varchar(20),
                                Woonplaats varchar(25),
                                Adres varchar(250),
                                Postcode varchar(6),
                                School varchar(20),
                                GeboorteDatum Date,
                                SLBProductCode int,
                                Profielfoto varchar(400),
                                GebruikerID int,
                                PRIMARY KEY (StudentNummer),
                                FOREIGN KEY (SLBProductCode) REFERENCES SLBProduct(SLBProductCode),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID)
                                )";
            $SQLTableAdmin = "CREATE TABLE Admin
                                (
                                AdminCode int NOT NULL AUTO_INCREMENT,
                                Naam varchar(30),
                                TelphoneNumber int(10),
                                Email varchar(40),
                                GebruikerID int,
                                PRIMARY KEY (AdminCode),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID)
                                )";
            $SQLTableGebruiker = "CREATE TABLE Gebruiker
                                (
                                GebruikerID int NOT NULL AUTO_INCREMENT,
                                Gebruiker varchar(30),
                                Rechtcode int,
                                Wachtwoord varchar(21),
                                PRIMARY KEY (GebruikerID),
                                FOREIGN KEY (Rechtcode) REFERENCES Recht(Rechtcode)
                                )";
            $SQLTableGebruikerCommunicatie = "CREATE TABLE Gebruiker_heeft_InterneCommunicatie
                                (
                                Code_Communicatie_ID int NOT NULL AUTO_INCREMENT,
                                GebruikerID int,
                                CommunicatieCode int,
                                PRIMARY KEY (Code_Communicatie_ID),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID),
                                FOREIGN KEY (CommunicatieCode) REFERENCES InterneCommunicatie(CommunicatieCode)
                                )";
            $SQLTableInterneCommunicatie = "CREATE TABLE InterneCommunicatie
                                (
                                CommunicatieCode int NOT NULL AUTO_INCREMENT,
                                InterneCommunicatie varchar(255),
                                PRIMARY KEY (CommunicatieCode)
                                )";
            $SQLTableRecht = "CREATE TABLE Recht
                                (
                                RechtCode int NOT NULL AUTO_INCREMENT,
                                Recht varchar(8),
                                PRIMARY KEY (RechtCode)
                                )";
            $SQLTableSLBProduct = "CREATE TABLE SLBProduct
                                (
                                SLBProductCode int NOT NULL AUTO_INCREMENT,
                                Historie varchar(255),
                                SLBProduct varchar(20),
                                Cijfer FLOAT(4),
                                PRIMARY KEY (SLBProductCode)
                                )";
            $SQLTableSLBERSLBProduct = "CREATE TABLE SLBer_heeft_SLBProduct
                                (
                                Code_SLB_ID int NOT NULL AUTO_INCREMENT,
                                SLBerID int,
                                SLBProductCode int,
                                PRIMARY KEY (Code_SLB_ID),
                                FOREIGN KEY (SLBerID) REFERENCES SLBer(SLBerID),
                                FOREIGN KEY (SLBProductCode) REFERENCES SLBProduct(SLBProductCode)
                                )";
            $SQLTableSLBer = "CREATE TABLE SLBer
                                (
                                SLBerID int NOT NULL AUTO_INCREMENT,
                                Naam varchar(30),
                                TelefoonNummer int(10),
                                Email varchar(40),
                                GebruikerID int,
                                PRIMARY KEY (SLBerID),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID)
                                )";
            $SQLTableProject = "CREATE TABLE Project
                                (
                                ProjectNummer int NOT NULL AUTO_INCREMENT,
                                Naam varchar(20),
                                Project varchar(20),
                                StudentNummer int,
                                Cijfer FLOAT(4),
                                PRIMARY KEY (ProjectNummer),
                                FOREIGN KEY (StudentNummer) REFERENCES Student(StudentNummer)
                                )";
            $SQLTableStyle = "CREATE TABLE Style
                                (
                                StyleID int NOT NULL AUTO_INCREMENT,
                                StyleCode int(2),
                                KleurCode int(2),
                                Lettertype varchar(16),
                                LetterGrote int(3),
                                StudentNummer int,
                                PRIMARY KEY (StyleID),
                                FOREIGN KEY (StudentNummer) REFERENCES Student(StudentNummer)
                                )";
            $SQLTableCV = "CREATE TABLE CV
                                (
                                CV_ID int NOT NULL AUTO_INCREMENT,
                                Link varchar(45),
                                StudentNummer int,
                                PRIMARY KEY (CV_ID),
                                FOREIGN KEY (StudentNummer) REFERENCES Student(StudentNummer)
                                )";
            $SQLRechtStudent = "INSERT INTO recht(RechtCode,Recht)
                            VALUES (1,'student')";
            $SQLRechtDocent = "INSERT INTO $table(RechtCode,Recht)
                            VALUES (2,'docent')";
            $SQLRechtSLBer = "INSERT INTO $table(RechtCode,Recht)
                            VALUES (3,'SLBer')";
            $SQLRechtAdmin = "INSERT INTO $table(RechtCode,Recht)
                            VALUES (4,'admin')";
        }
        $queryArray = [];
        array_push($queryArray, $SQLTableInterneCommunicatie);
        array_push($queryArray, $SQLTableRecht);
        array_push($queryArray, $SQLTableGebruiker);
        array_push($queryArray, $SQLTableAdmin);
        array_push($queryArray, $SQLTableGebruikerCommunicatie);
        array_push($queryArray, $SQLTableSLBProduct);
        array_push($queryArray, $SQLTableStudent);
        array_push($queryArray, $SQLTableSLBer);
        array_push($queryArray, $SQLTableSLBERSLBProduct);
        array_push($queryArray, $SQLTableProject);
        array_push($queryArray, $SQLTableDocent);
        array_push($queryArray, $SQLTableStyle);
        array_push($queryArray, $SQLTableCV);
        array_push($queryArray, $SQLAlterRecht);
        array_push($queryArray, $SQLRechtStudent);
        array_push($queryArray, $SQLRechtDocent);
        array_push($queryArray, $SQLRechtSLBer);
        array_push($queryArray, $SQLRechtAdmin);

        foreach ($queryArray as $query) {
            $QueryResult = mysqli_query($DBConnect, $query);
            if ($QueryResult === FALSE) {
                echo "<p>Unable to create the table.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }
        ?>
    </body>
</html>