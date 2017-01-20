<?php
include "includes/topinclude.php";
include "connection_database.php";
?>
<h1>Hier staan de portfolio's met comments van de docenten die het hebben beoordeeld.</h1>
<?php
if (isset($_SESSION['username']))
{
    $naam = "SELECT * FROM project WHERE StudentNummer = '{$_SESSION['id']}'";
    $show = mysqli_query($DBConnect, $naam);
    while ($row = mysqli_fetch_assoc($show))
    {
        echo "<div class='project_file'>";
        echo "<a href='includes/project/{$row['Naam']}{$_SESSION['username']}.{$row['Project']}' target='blank'>{$row['Naam']}</a><br> ";
        echo "</div>";
    }
}
?>
<form action='#' method='post'>
    <input type='textarea' name='docent_comment'>
    <input type='submit' name='submit'>
</form>

<?php
if (isset($_POST['submit']))
{
    if (empty($_POST['docent_comment']))
    {
        echo"fill something in.";
    } elseif (ctype_space($_POST['comment']))
    {
        echo"Please don't do that."
        . "I will find you"
        . " and I will kill you."
        . " Especially if your name is Frank Tieck and Kevin";
    } else
    {
        $comment = stripslashes($_POST['comment']);
            $GID = $_SESSION['id'];
            $date = date("Y-m-d");
            $time = date("H:i:s");
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
                echo "<p>The comment has been added.</p>";
            }
    }
}
include "includes/botinclude.php";
?>
