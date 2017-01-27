<?php
include "includes/topinclude.php";
include "connection_database.php";
?>
<h1>Prive berichten.</h1>



<?php
if (isset($_SESSION['login_docent']) || isset($_SESSION['login_slber']))
{
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
        } else
        {
            $comment = stripslashes($_POST['docent_comment']);
            $GID = $_SESSION['id'];
            $StudentNummer = $_GET['student'];
            $SQLstring = "INSERT INTO docent_comment VALUES ('NULL', '$comment', '$StudentNummer', '$GID')";
            mysqli_query($DBConnect, $SQLstring);
        }
    }
}
if (isset($_SESSION['login_user']))
{
    $string="SELECT * FROM docent_comment WHERE StudentNummer = '{$_SESSION['id']}' ";
    $show=mysqli_query($DBConnect, $string);
    while ($row = mysqli_fetch_assoc($show)){
        echo"{$row['Message_Comment']}";
        $docent = "SELECT Naam FROM gebruiker WHERE ";
        echo"{$row['Message_Comment']}";
    }
}

include "includes/botinclude.php";
?>
