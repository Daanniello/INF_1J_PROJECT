<!DOCTYPE html>
<html>
    <head>
        <title>alter cijfers</title>
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
            $SQLAlterProject = "ALTER TABLE project ADD Cijfer FLOAT(4)";
            $SQLAlterSLBProduct = "ALTER TABLE slbproduct ADD Cijfer FLOAT(4)";
            
        }
        $queryArray = [];
        array_push($queryArray, $SQLAlterProject);
        array_push($queryArray, $SQLAlterSLBProduct);
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