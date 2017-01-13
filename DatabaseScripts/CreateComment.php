<!DOCTYPE html>
<html>
    <head>
        <title>create comment</title>
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
            mysqli_select_db($DBConnect, $DBName);
            $table = "recht";
            $SQLCreateComment = "CREATE TABLE Comment
                                (
                                CommentID INT NOT NULL AUTO_INCREMENT,
                                Message VARCHAR(250) NOT NULL,
                                GebruikerID INT NOT NULL,
                                Date Date NOT NULL,
                                Time VARCHAR(10) NOT NULL,
                                PRIMARY KEY (CommentID),
                                FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID))";
        }
        $queryArray = [];
        array_push($queryArray, $SQLCreateComment);
        foreach ($queryArray as $query) {
            $QueryResult = mysqli_query($DBConnect, $query);
            if ($QueryResult === FALSE) {
                echo "<p>Unable to insert.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }
        ?>
    </body>
</html>