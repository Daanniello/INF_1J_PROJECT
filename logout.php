<?php include "includes/topinclude.php"; ?>
<div class="inhoud">
    <?php
    if (isset($_SESSION["username"]))
    {
        session_destroy();
        header("Location: index.php");
    } else
    {

        echo "you have been logged out";
    }
    ?>
</div>
<?php include "includes/botinclude.php"; ?>


