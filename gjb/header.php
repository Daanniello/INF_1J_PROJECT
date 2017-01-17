<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="style.php">
    <?php
        session_start();
        print_r($_SESSION);
        require "../connection_database.php";
        $name = "Piet" ;
        $job = "software engineer";
        //$photo = photo;
        $about = "about.php";
        $link = "https://nl.linkedin.com/";
        $fb = "https://nl-nl.facebook.com/";
        $twit = "https://twitter.com/";
        echo "<title>$name portfolio</title>";
    ?>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="hname"><?php echo "<h1>$name"; ?></div>
            <div class="hjob"><?php echo "$job"; ?></div>
        </div>
        <div class="nav">
            <div class="hmenu">
                <!-- include menu -->
            </div>
        </div>