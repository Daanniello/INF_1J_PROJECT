<!DOCTYPE html>
<html>
    <head>
        <title>insert recht</title>
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
            $SQLAlterRecht = "alter table recht modify column Recht varchar(8)";
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
        array_push($queryArray, $SQLAlterRecht);
        array_push($queryArray, $SQLRechtStudent);
        array_push($queryArray, $SQLRechtDocent);
        array_push($queryArray, $SQLRechtSLBer);
        array_push($queryArray, $SQLRechtAdmin);
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
