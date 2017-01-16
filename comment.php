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
    $tablenaam = "comment";
    if (empty($_POST['comment']))
    {
        echo"Please fill something in";
    } else
    {
        $comment = stripslashes($_POST['comment']);
        $GID = $_SESSION['id'];
        $date = date("Y-m-d");
        $time = date("h:i:s");
        $SQLstring = "INSERT INTO $tablenaam VALUES ('NULL', '$comment', '$GID', '$date', '$time')";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE)
        {
            echo "<p>Unable to execute the query.</p>"
            . "<p>Error code " . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
            echo"$SQLstring";
        } else
        {
            echo "<h1>Thanks for the Comment!</h1>";
            echo "<h2>The comment has been added.</h2>";
        }
    }
    ?>
    <div class="tabel">
        <?php
        if ($DBConnect === FALSE)
        {
            echo "<p>Unable to connect to the database server.</p>"
            . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
            . "</p>";
        } else
        {
            $DBName = "digital_portfolio";
            if (!mysqli_select_db($DBConnect, $DBName))
            {
                echo "<p>There areno comments yet!</p>";
            } else
            {
                $TableName = "comment";
                $SQLstring2 = "SELECT * FROM $TableName";
                $SQLstring3 = "SELECT 'Naam', 'Profielfoto' FROM 'student'";
                $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
                if (mysqli_num_rows($QueryResult2) == 0)
                {
                    echo "<p>There is no flight planned!</p>";
                } else
                {
                    echo "<p>The following flights have been planned:</p>";
                    echo "<table width='100%' border='1'>";
                    echo "<tr><th>Date</th><th>Time</th><th>Message</th></tr>";
                    while ($Row = mysqli_fetch_assoc($QueryResult2))
                    {
                        echo "<tr><td>{$Row['Date']}</td>";
                        echo "<td>{$Row['Time']}</td>";
                        echo "<td>{$Row['Message']}</td></tr>";
                    }
                }
            }
        }
        ?>
    </div>
</div>
<?php include "includes/botinclude.php"; ?>
