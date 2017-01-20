<!DOCTYPE html>
<html>
    <head>
        <title>create docent comment</title>
    </head>
    <body>
        <?php
        $DBConnect = mysqli_connect("localhost", "root", "");
        if ($DBConnect === FALSE)
        {
            echo "<p>Unable to connect to the database server.</p>"
            . "<p>Error code " . mysqli_errno() . ": "
            . mysqli_error() . "</p>";
        } else
        {
            $DBName = "Digital_Portfolio";
            mysqli_select_db($DBConnect, $DBName);
            $SQLDocentComment = "CREATE TABLE docent_comment(
                            MessageID INT NOT NULL AUTO_INCREMENT,
                            Message_Comment VARCHAR(500) NOT NULL,
                            ProjectNummer int,
                            Docent INT(11) NOT NULL,
                            GebruikerID INT NOT NULL,
                            PRIMARY KEY (MessageID),
                            FOREIGN KEY (ProjectNummer) REFERENCES Project(ProjectNummer),
                            FOREIGN KEY (GebruikerID) REFERENCES gebruiker(GebruikerID),
                            FOREIGN KEY (Docent) REFERENCES Docent(DocentCode));";
        }
        $queryArray = [];
        array_push($queryArray, $SQLDocentComment);
        foreach ($queryArray as $query)
        {
            $QueryResult = mysqli_query($DBConnect, $query);
            if ($QueryResult === FALSE)
            {
                echo "<p>Unable to insert.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }
        ?>
    </body>
</html>
