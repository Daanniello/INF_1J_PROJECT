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
                                FOREIGN KEY (ProjectNummmer) REFERENCES Project(ProjectNummer) ON DELETE CASCADE ON UPDATE CASCADE,
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID)ON DELETE CASCADE ON UPDATE CASCADE
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
                                Profielfoto varchar(400),
                                GebruikerID int,
                                beschrijving varchar(200),
                                PRIMARY KEY (StudentNummer),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableAdmin = "CREATE TABLE Admin
                                (
                                AdminCode int NOT NULL AUTO_INCREMENT,
                                Naam varchar(30),
                                TelphoneNumber int(10),
                                Email varchar(40),
                                GebruikerID int,
                                PRIMARY KEY (AdminCode),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableGebruiker = "CREATE TABLE Gebruiker
                                (
                                GebruikerID int NOT NULL AUTO_INCREMENT,
                                Gebruiker varchar(30),
                                Rechtcode int,
                                Wachtwoord varchar(61),
                                PRIMARY KEY (GebruikerID),
                                FOREIGN KEY (Rechtcode) REFERENCES Recht(Rechtcode) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableGebruikerCommunicatie = "CREATE TABLE Gebruiker_heeft_InterneCommunicatie
                                (
                                Code_Communicatie_ID int NOT NULL AUTO_INCREMENT,
                                GebruikerID int,
                                CommunicatieCode int,
                                PRIMARY KEY (Code_Communicatie_ID),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE,
                                FOREIGN KEY (CommunicatieCode) REFERENCES InterneCommunicatie(CommunicatieCode) ON DELETE CASCADE ON UPDATE CASCADE
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
                                GebruikerID int,
                                PRIMARY KEY (SLBProductCode),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableSLBERSLBProduct = "CREATE TABLE SLBer_heeft_SLBProduct
                                (
                                Code_SLB_ID int NOT NULL AUTO_INCREMENT,
                                SLBerID int,
                                SLBProductCode int,
                                PRIMARY KEY (Code_SLB_ID),
                                FOREIGN KEY (SLBerID) REFERENCES SLBer(SLBerID) ON DELETE CASCADE ON UPDATE CASCADE,
                                FOREIGN KEY (SLBProductCode) REFERENCES SLBProduct(SLBProductCode) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableSLBer = "CREATE TABLE SLBer
                                (
                                SLBerID int NOT NULL AUTO_INCREMENT,
                                Naam varchar(30),
                                TelefoonNummer int(10),
                                Email varchar(40),
                                GebruikerID int,
                                PRIMARY KEY (SLBerID),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableProject = "CREATE TABLE Project
                                (
                                ProjectNummer int NOT NULL AUTO_INCREMENT,
                                Naam varchar(20),
                                Project varchar(20),
                                StudentNummer int,
                                Cijfer FLOAT(4),
                                PRIMARY KEY (ProjectNummer),
                                FOREIGN KEY (StudentNummer) REFERENCES Student(StudentNummer) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableStyle = "CREATE TABLE Style
                                (
                                StyleID int NOT NULL AUTO_INCREMENT,
                                StyleCode int(2),
                                KleurCode varchar(30),
                                Lettertype varchar(16),
                                LetterGrote int(3),
                                StudentNummer int,
                                PRIMARY KEY (StyleID),
                                FOREIGN KEY (StudentNummer) REFERENCES Student(StudentNummer) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableCV = "CREATE TABLE CV
                                (
                                CV_ID int NOT NULL AUTO_INCREMENT,
                                Link varchar(45),
                                StudentNummer int,
                                PRIMARY KEY (CV_ID),
                                FOREIGN KEY (StudentNummer) REFERENCES Student(StudentNummer) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLTableComment = "CREATE TABLE Comment
                                (
                                CommentID INT NOT NULL AUTO_INCREMENT,
                                Message VARCHAR(250) NOT NULL,
                                GebruikerID INT NOT NULL,
                                Date Date NOT NULL,
                                Time VARCHAR(10) NOT NULL,
                                PRIMARY KEY (CommentID),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE
                                )";
            $SQLRechtStudent = "INSERT INTO recht(RechtCode,Recht)
                            VALUES (1,'Student')";
            $SQLRechtDocent = "INSERT INTO recht(RechtCode,Recht)
                            VALUES (2,'Docent')";
            $SQLRechtSLBer = "INSERT INTO recht(RechtCode,Recht)
                            VALUES (3,'SLBer')";
            $SQLRechtAdmin = "INSERT INTO recht(RechtCode,Recht)
                            VALUES (4,'Admin')";
            $SQLDocentComment = "CREATE TABLE docent_comment(
                            MessageID INT NOT NULL AUTO_INCREMENT,
                            Message_Comment VARCHAR(500) NOT NULL,
                            ProjectNummer INT NOT NULL,
                            StudentNummer INT NOT NULL,
                            GebruikerID INT NOT NULL,
                            PRIMARY KEY (MessageID),
                            FOREIGN KEY (ProjectNummer) REFERENCES Project(ProjectNummer) ON DELETE CASCADE ON UPDATE CASCADE,
                            FOREIGN KEY (StudentNummer) REFERENCES Student(StudentNummer) ON DELETE CASCADE ON UPDATE CASCADE,
                            FOREIGN KEY (GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE);";
            $SQLgebruikeradmin = "INSERT INTO gebruiker VALUES (null,'admin', 4, '$2a$07\$CjwgZT6VlImAlYYskIChCeapvvDDtm4OTqU5x2Jk.QQrGgAMXedWe')";
            $SQLadmin = "INSERT INTO admin VALUES (null, 'admin', '0611111111', 'admin@admin.nl', 1)";
            
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
        array_push($queryArray, $SQLTableComment);
        array_push($queryArray, $SQLRechtStudent);
        array_push($queryArray, $SQLRechtDocent);
        array_push($queryArray, $SQLRechtSLBer);
        array_push($queryArray, $SQLRechtAdmin);
        array_push($queryArray, $SQLDocentComment);
        array_push($queryArray, $SQLgebruikeradmin);
        array_push($queryArray, $SQLadmin);

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