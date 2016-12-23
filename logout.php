<?php include "includes/topinclude.php"; ?>
<div class="inhoud">
    <?php
    if (isset($_SESSION["username"]))
    {
        session_destroy();
        header("Refresh:0");
    } else
    {

        echo "you have been logged out";
    }
    ?>
</div>
<?php include "includes/botinclude.php"; ?>


