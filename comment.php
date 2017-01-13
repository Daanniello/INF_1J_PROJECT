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
    if (empty($_POST['comment']))
    {
        echo"Please fill everything in";
    } else
    {
        $tablenaam = "comment";
        $comment = stripslashes($_POST['comment']);
        $date = date("d-m-Y");
        $time = date("h:i:s");
        $query = "SELECT GebruikerID FROM student WHERE GebruikerID = '{$_SESSION['id']}'";
        $con = $_SESSION['id'];
        $input = "INSERT INTO $tablenaam VALUES ('NULL', $comment', '$con', '$date', '$time')";
        $QueryResult = mysqli_query($DBConnect, $input);
        if ($QueryResult === FALSE)
        {
            echo "<p>Unable to execute the query.</p>"
            . "<p>Error code " . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
            echo"$input";
        } else
        {
            echo "<h1>Thanks for the Comment!</h1>";
            echo "<h2>The comment has been added.</h2>";
        }
    }
    ?>
</div>
<?php include "includes/botinclude.php"; ?>
