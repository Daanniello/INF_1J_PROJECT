<!DOCTYPE html>
<html>
    <head>
        <title>Alter students</title>
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
            $SQLAlterAdres = "alter table student modify column Adres varchar(250)";
            $SQLAlterFoto = "alter table student modify column Profielfoto varchar(400)";
            
        }
        $queryArray = [];
        array_push($queryArray, $SQLAlterAdres);
        array_push($queryArray, $SQLAlterFoto);
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
