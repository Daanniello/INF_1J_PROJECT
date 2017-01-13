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
</div>
<?php include "includes/botinclude.php"; ?>
