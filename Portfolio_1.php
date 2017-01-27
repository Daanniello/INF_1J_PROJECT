
<?php
include "includes/topinclude.php";
include "connection_database.php";

function color_inverse($color) {
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6) {
        return '000000';
    }
    $rgb = '';
    for ($x = 0; $x < 3; $x++) {
        $c = 255 - hexdec(substr($color, (4 * $x), 2));
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
    }
    return '#' . $rgb;
}
?>


<div class="inhoud " >
    <div class="titel_naam" style="<?php
    $cat = "SELECT * FROM style WHERE StudentNummer = '{$_GET['student']}' ";
    $lion = mysqli_query($DBConnect, $cat);
    $dog = mysqli_fetch_assoc($lion);
    if ($dog['StyleCode'] == 1) {
        echo "";
    } elseif ($dog['StyleCode'] == 2) {
        echo "background-color:{$dog['KleurCode']}; border-bottom: 5px solid " . color_inverse($dog['KleurCode']);
    }
    ?>">

        <?php
        if (isset($_SESSION['login_slber']) || isset($_SESSION['login_docent'])) {
            $show = "SELECT * FROM student WHERE GebruikerID = '{$_GET['student']}'";
            $result = mysqli_query($DBConnect, $show);
            $row = mysqli_fetch_assoc($result);
            echo "Portfolio van {$row['Naam']}";
        } else {
            
        }
        ?>
    </div>
    <div class="beschrijving_titel">Beschrijving</div>
    <div class="beschrijving" >
        <?php
        if (isset($_SESSION['login_slber']) || isset($_SESSION['login_docent'])) {

            require 'Connection_database.php';
            $get = "SELECT beschrijving FROM student WHERE GebruikerID = '{$_GET['student']}' ";
            $query = mysqli_query($DBConnect, $get);
            $row = mysqli_fetch_assoc($query);

            if (empty($row['beschrijving'])) {
                echo "Dit persoon heeft nog geen beschrijving";
            } else {
                echo $row['beschrijving'];
            }
        } else {
            
        }
        ?> 
    </div>





    <style>
        .project_file:nth-child(even) {

            background-color:<?php
            if ($dog['StyleCode'] == 1) {
                echo "";
            } else {
                echo color_inverse(color_inverse($dog['KleurCode']));
            }
            ?>;
        }







    </style>
    <div class="project_upload" >
        <div class="upload_top">
            <form enctype='multipart/form-data' action="portfolio.php" method="post">
                <div class="project_upload_title">
                    Projecten
                </div>

            </form>
        </div>

        <div class="project_upload_file" >
            <?php
            if (isset($_SESSION['login_slber']) || isset($_SESSION['login_docent'])) {

                $naam = "SELECT * FROM project as p JOIN gebruiker as g ON g.GebruikerID = p.StudentNummer WHERE StudentNummer = '{$_GET['student']}'";
                $show = mysqli_query($DBConnect, $naam);

                while ($row = mysqli_fetch_assoc($show)) {
                    echo "<div class='project_file'>";
                    echo "<a href='includes/project/{$row['Naam']}{$row['Gebruiker']}.{$row['Project']}' target='blank'>{$row['Naam']}</a><br> ";
                    echo "</div>";
                }
            }
            ?>

        </div>
    </div>
    <div class="project_upload" >
        <div class="upload_top">
            <form enctype='multipart/form-data' action="portfolio.php" method="post">
                <div class="project_upload_title">
                    SLB Projecten
                </div>

            </form>
        </div>

        <div class="project_upload_file" >
            <?php
            if (isset($_SESSION['login_slber'])) {

                $naam1 = "SELECT * FROM slbproduct s JOIN gebruiker g ON s.GebruikerID = g.GebruikerID WHERE g.GebruikerID = '{$_GET['student']}'";
                $show1 = mysqli_query($DBConnect, $naam1);

                while ($row1 = mysqli_fetch_assoc($show1)) {
                    echo "<div class='project_file'>";
                    echo "<a href='includes/SLB/{$row1['Historie']}{$row1['Gebruiker']}.{$row1['SLBProduct']}' target='blank'>{$row1['Historie']}</a><br> ";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

    <div class="social_portfolio_4">
        <div class="social_portfolio">
            <div class="social_portfolio_facebook">
                <a href='<?php
                if (isset($_SESSION['login_slber']) || isset($_SESSION['login_docent'])) {
                    require 'connection_database.php';
                    $kijk1 = "SELECT * FROM social WHERE StudentNummer = '{$_GET['student']}' ";
                    $uitvoer1 = mysqli_query($DBConnect, $kijk1);
                    $tik1 = mysqli_fetch_assoc($uitvoer1);
                    echo $tik1['facebook'];
                }
                ?>'><img src='includes/images/facebook_button.jpg'></a>
            </div>
        </div>
        <div class="social_portfolio">
            <div class="social_portfolio_facebook">
                <a href='<?php
                if (isset($_SESSION['login_slber']) || isset($_SESSION['login_docent'])) {
                    require 'connection_database.php';
                    $kijk1 = "SELECT * FROM social WHERE StudentNummer = '{$_GET['student']}' ";
                    $uitvoer1 = mysqli_query($DBConnect, $kijk1);
                    $tik1 = mysqli_fetch_assoc($uitvoer1);
                    echo $tik1['linkedin'];
                }
                ?>'><img src='includes/images/linkedin.png'></a>
            </div>
        </div>
        <div class="social_portfolio">
            <div class="social_portfolio_facebook">
                <a href='<?php
                if (isset($_SESSION['login_slber']) || isset($_SESSION['login_docent'])) {
                    require 'connection_database.php';
                    $kijk1 = "SELECT * FROM social WHERE StudentNummer = '{$_GET['student']}' ";
                    $uitvoer1 = mysqli_query($DBConnect, $kijk1);
                    $tik1 = mysqli_fetch_assoc($uitvoer1);
                    echo $tik1['facebook'];
                }
                ?>'><img src='includes/images/twitter_button.png'></a>
            </div>
        </div>
        <div class="social_portfolio">
            <div class="social_portfolio_facebook">
                <a href='<?php
                if (isset($_SESSION['login_slber']) || isset($_SESSION['login_docent'])) {
                    require 'connection_database.php';
                    $kijk1 = "SELECT * FROM social WHERE StudentNummer = '{$_GET['student']}' ";
                    $uitvoer1 = mysqli_query($DBConnect, $kijk1);
                    $tik1 = mysqli_fetch_assoc($uitvoer1);
                    echo $tik1['instagram'];
                }
                ?>'><img src='includes/images/instagram_button.png'></a>
            </div>
        </div>
        <div class="social_portfolio">
            <div class="social_portfolio_facebook">
                <h2>Stuur deze persoon een Email.</h2>
                <form method="post" action="email.php">
                    <textarea rows="14" cols="80" name="message"></textarea>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include "includes/botinclude.php"; ?>
