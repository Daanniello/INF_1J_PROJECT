<?php

$DBConnect = mysqli_connect("127.0.0.1", "root", "");
if ($DBConnect === FALSE)
{
    echo "<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
    . "</p>";
} else
{
    $DBName = "";

    $TableName = "";
    $SQLstring = "SELECT * FROM $TableName";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);
    mysqli_free_result($QueryResult);

    mysqli_close($DBConnect);
}
