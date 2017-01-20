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
if(isset($_POST['docent_comment']))
include "includes/botinclude.php";
?>
