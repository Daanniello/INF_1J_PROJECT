<?php
include "includes/topinclude.php";
include "Connection_database.php";
?>
<div class="inhoud">

    <form Method="POST" Action="comment.php">
        <p>Comment: <input type="textarea" name="comment" cols="40" rows="5"></p>
        <p><input type="submit" name="submit" value="submit"/></p>
    </form>
    <?php
    $TableName = "digital_portfolio";
    $SQLstring = "SELECT * FROM $TableName";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);
    if (mysqli_num_rows($QueryResult) == 0)
    {
        echo "<p></p>";
    } else
    {
        echo "<p></p>";
        while ($Row = mysqli_fetch_assoc($QueryResult))
        {
            echo $Row[''];
        }
    }
    ?>
    <?php
    if (isset($_SESSION['username']))
    {
        require 'connection_database.php';
        $query = "SELECT * FROM student WHERE GebruikerID = '{$_SESSION['id']}'";
        $show = mysqli_query($DBConnect, $query);
        $row = mysqli_fetch_assoc($show);
        $proffoto = $row["Profielfoto"];
        $pointpos = strrpos($row["Profielfoto"], ".");
        $fish = substr($proffoto, $pointpos, 5);

        echo "<a href='portfolio.php'><img src='includes/profielfoto/{$_SESSION['username']}{$fish}' width='100' height='100' ></a>";
    } else
    {
        echo "<a href='index.php'><img src='includes/images/avatar.png' width='100' height='100' ></a>";
    }
    $datum = date("Y-m-d-hisa");
    echo "<br/>" .$datum;
    ?>
</div>
<?php include "includes/botinclude.php"; ?>



CREATE TABLE Comment{
CommentID INT NOT NULL AUTO_INCREMENT
Message VARCHAR(250),
GebruikerID int,
Date ,
Time,
FOREIGN KEY (GebruikerID) REFERENCES Gebruiker(GebruikerID),
FOREIGN KEY 
FOREIGN KEY 


