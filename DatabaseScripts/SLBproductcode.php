<!DOCTYPE html>
<html>
    <head>
        <title>alter Productcode</title>
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
            $SQLAlterStudentForeignKey = "alter table student drop foreign key student_ibfk_1";
            $SQLAlterStudent = "alter table student drop SLBProductCode";
            $SQLAlterSLBProduct = "ALTER TABLE slbproduct ADD GebruikerID INT";
            $SQLAlterSLBForeignKey = "ALTER TABLE slbproduct ADD FOREIGN KEY (GebruikerID) REFERENCES gebruiker(GebruikerID)";
            
        }
        $queryArray = [];
        array_push($queryArray, $SQLAlterStudentForeignKey);
        array_push($queryArray, $SQLAlterStudent);
        array_push($queryArray, $SQLAlterSLBProduct);
        array_push($queryArray, $SQLAlterSLBForeignKey);;
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
