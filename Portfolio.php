
<?php
include "includes/topinclude.php";
include "connection_database.php";



function color_inverse($color)
{
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6)
    {
        return '000000';
    }
    $rgb = '';
    for ($x = 0; $x < 3; $x++)
    {
        $c = 255 - hexdec(substr($color, (4 * $x), 2));
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
    }
    return '#' . $rgb;
}
?>


<div class="inhoud " style="<?php
    $sql = "SELECT * FROM style WHERE StudentNummer = '{$_SESSION['id']}' ";
    $result = mysqli_query($DBConnect, $sql);
    $table = mysqli_fetch_assoc($result);
    if ($table['StyleCode'] == 1){
        echo "";
    } elseif ($table['StyleCode'] == 2){
        echo "font-family: "; 
        $ltype = $table['Lettertype'];
        $lsize = $table['LetterGrote'];
        switch($ltype){
            case ($ltype=="arial"):
                echo "Arial,Helvetica Neue,Helvetica,sans-serif";
                break;
            case ($ltype=="georgia"):
                echo "Georgia,Times,Times New Roman,serif";
                break;
            case ($ltype=="palatino"):
                echo "Palatino,Palatino Linotype,Palatino LT STD,Book Antiqua,Georgia,serif";
                break;
            case ($ltype=="lucida"):
                echo "Lucida Grande,Lucida Sans Unicode,Lucida Sans,Geneva,Verdana,sans-serif";
                break;
            default:
                echo "Arial,Helvetica Neue,Helvetica,sans-serif";
        }
        echo "; ";
        echo "font-size: {$lsize}px !important;}";
    }
     ?>">
    <div class="titel_naam" style="<?php
    if ($table['StyleCode'] == 1){
        echo "";
    } elseif ($table['StyleCode'] == 2){
            echo "background-color:{$table['KleurCode']}; border-bottom: 5px solid " . color_inverse($table['KleurCode']);
        }
    
    ?>;">

        <?php
        if (isset($_SESSION['username']))
        {
            $show = "SELECT * FROM student WHERE GebruikerID = '{$_SESSION['id']}'";
            $result = mysqli_query($DBConnect, $query);
            $row = mysqli_fetch_assoc($result);
            echo "Portfolio van {$row['Naam']}";
        } else
        {
            
        }
        ?>
    </div>
    <div class="beschrijving_titel">Beschrijving</div>
    <div class="beschrijving">
             <?php
             if (isset($_SESSION['username']))
             {
                 require 'Connection_database.php';
                 $get = "SELECT beschrijving FROM student WHERE GebruikerID = '{$_SESSION['id']}' ";
                 $query = mysqli_query($DBConnect, $get);
                 $row = mysqli_fetch_assoc($query);

                 if (empty($row['beschrijving']))
                 {
                     echo "<form action='#' method='post'><textarea maxlength='200' name='area' ></textarea><input type='submit' name='submit2' value='Voeg toe'> </form> ";
                     if (isset($_POST['submit2']))
                     {
                         $vul = $_POST['area'];
                         $querie = "UPDATE student SET beschrijving = '$vul' WHERE GebruikerID = '{$_SESSION['id']}' ";
                         mysqli_query($DBConnect, $querie);
                         echo "query send";
                         header("Refresh:0");
                     }
                 } else
                 {
                     echo "<p>".$row['beschrijving']."</p>";
                     echo "<form action='#' method='post'><textarea maxlength='200' name='area' ></textarea><input type='submit' name='submit2' value='Pas aan'> </form> ";
                     if (isset($_POST['submit2']))
                     {
                         $vul = $_POST['area'];
                         $querie = "UPDATE student SET beschrijving = '$vul' WHERE GebruikerID = '{$_SESSION['id']}' ";
                         mysqli_query($DBConnect, $querie);
                         echo "query send";
                         header("Refresh:0");
                     }
                 }
             } else
             {
                 
             }
             ?> 
    </div>
    <div class=""></div>
    <div class="project_upload" style="<?php
    $sql = "SELECT * FROM style WHERE StudentNummer = '{$_SESSION['id']}' ";
    $result = mysqli_query($DBConnect, $sql);
    $table = mysqli_fetch_assoc($result);
    if ($table['StyleCode'] == 1)
    {
        echo "";
    } elseif ($table['StyleCode'] == 2)
    {
        echo "background-color:{$table['KleurCode']}; ";
    }
    ?>">
        <div class="upload_top">
            <form enctype='multipart/form-data' action="portfolio.php" method="post">
                <div class="project_upload_title">
                    Projecten
                </div>
                <?php
                if (isset($_SESSION["login_user"]) == 1)
                {
                    echo '
                        <input type="file" name="upload_project"><br>
                        <input type="text" name="name" placeholder="Name of project"><br>
                        <input type="submit" name="submit" value="Upload">';
                } else
                {
                    echo "<div class='project_upload_title'> you have to log in first to edit this file </div>";
                }
                ?>
            </form>
        </div>

        <div class="project_upload_file" style="<?php
        if ($table['StyleCode'] == 1)
        {
            echo "";
        } elseif ($table['StyleCode'] == 2)
        {
            echo "background-color:" . color_inverse($table['KleurCode']) . ";";
        }
        ?>">
                 <?php
                 if (isset($_POST['submit']))
                 {

                     if (empty($_FILES['upload_project']['name']) || empty($_POST['name']))
                     {
                         echo "Je hebt geen bestand of naam gekozen.";
                     } elseif (preg_match('/\s/', $_POST['name']))
                     {
                         echo "Je mag geen spatie of andere tekens gebruiken";
                     } else
                     {
                         $name = $_POST['name'];
                         $file = $_FILES['upload_project']['name'];
                         $ext = pathinfo($file, PATHINFO_EXTENSION);
                         $query = "INSERT INTO project VALUES(NULL,'$name','$ext','{$_SESSION['id']}',NULL)";
                         mysqli_query($DBConnect, $query);
                         $target_path = "includes/project/";

                         $target_path = $target_path . $name . $_SESSION['username'] . "." . $ext;

                         if (move_uploaded_file($_FILES['upload_project']['tmp_name'], $target_path))
                         {
                             
                         } else
                         {
                             echo "There was an error uploading the file, please try again!";
                         }
                     }
                 }

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

        </div>
    </div>

    <div class="project_upload" style="<?php
    $sql = "SELECT * FROM style WHERE StudentNummer = '{$_SESSION['id']}' ";
    $result = mysqli_query($DBConnect, $sql);
    $table = mysqli_fetch_assoc($result);
    if ($table['StyleCode'] == 1)
    {
        echo "";
    } elseif ($table['StyleCode'] == 2)
    {
        echo "background-color:{$table['KleurCode']}; ";
    }
    ?>">
        <div class="upload_top">
            <form enctype='multipart/form-data' action="portfolio.php" method="post">
                <div class="project_upload_title">
                    SLB Projecten
                </div>
                <?php
                if (isset($_SESSION["login_user"]) == 1)
                {
                    echo '	
                    <input type="file" name="upload_project1"><br>
                    <input type="text" name="textname" placeholder="Name of SLBProduct"><br>
                    <input type="submit" name="submit1" value="Upload" >';
                } else
                {
                    echo "<div class='project_upload_title'> you have to log in first to edit this file </div>";
                }
                ?>
            </form>
        </div>

        <div class="project_upload_file" style="<?php
        if ($table['StyleCode'] == 1)
        {
            echo "";
        } elseif ($table['StyleCode'] == 2)
        {
            echo "background-color:" . color_inverse($table['KleurCode']) . ";";
        }
        ?>">
                 <?php
                 if (isset($_POST['submit1']))
                 {
                     if (empty($_FILES['upload_project1']['name']) || empty($_POST['textname']))
                     {
                         echo "Je hebt geen bestand of naam gekozen.";
                     } elseif (preg_match('/\s/', $_POST['textname']))
                     {
                         echo "Je mag geen spatie of andere tekens gebruiken";
                     } else
                     {
                         $name1 = $_POST['textname'];
                         $file = $_FILES['upload_project1']['name'];
                         $ext1 = pathinfo($file, PATHINFO_EXTENSION);
                         $query = "INSERT INTO slbproduct VALUES(NULL,'$name1','$ext1',NULL,'{$_SESSION['id']}')";
                         mysqli_query($DBConnect, $query);
                         $target_path = "includes/SLB/";

                         $target_path = $target_path . $name1 . $_SESSION['username'] . "." . $ext1;

                         if (move_uploaded_file($_FILES['upload_project1']['tmp_name'], $target_path))
                         {
                             
                         } else
                         {
                             echo "There was an error uploading the file, please try again!";
                         }
                     }
                 }

                 if (isset($_SESSION['username']))
                 {

                     $naam1 = "SELECT * FROM slbproduct WHERE GebruikerID = '{$_SESSION['id']}'";
                     $show1 = mysqli_query($DBConnect, $naam1);

                     while ($row1 = mysqli_fetch_assoc($show1))
                     {
                         echo "<div class='project_file'>";
                         echo "<a href='includes/SLB/{$row1['Historie']}{$_SESSION['username']}.{$row1['SLBProduct']}' target='blank'>{$row1['Historie']}</a><br> ";
                         echo "</div>";
                     }
                 }
                 ?>
        </div>
    </div>

</div>
<style>
    .project_file:nth-child(even) {

        background-color:<?php
        if ($table['StyleCode'] == 1 || $table['StyleCode'] == NULL)
        {
            echo "#6e4381";
        } else
        {
            echo color_inverse(color_inverse($table['KleurCode']));
        }
        ?>;
    }
</style>
<div class="social_portfolio_4">
<div class="social_portfolio">
    <div class="social_portfolio_facebook">
        <a href='<?php
        require 'connection_database.php';
        $kijk1 = "SELECT * FROM social WHERE StudentNummer = '{$_SESSION['id']}' ";
        $uitvoer1 = mysqli_query($DBConnect, $kijk1);
        $tik1 = mysqli_fetch_assoc($uitvoer1);
        echo $tik1['facebook'];
        ?>'><img src='includes/images/facebook_button.jpg'></a>
        <form action='' method='post'><input type="text" name="face" placeholder="voeg je facebook link toe"><br><input type="submit" name="facebook" value="OK"> </form>
    </div>
</div>
<?php
if (isset($_POST['facebook']))
{
    if (mysqli_num_rows($uitvoer1)== 0)
    {
        $string1 = "INSERT INTO social VALUES ('{$_SESSION['id']}',NULL,NULL,NULL,NULL)";
        mysqli_query($DBConnect, $string1);
        
    } 
    

        $string = "UPDATE social SET facebook = '{$_POST['face']}' WHERE StudentNummer = '{$_SESSION['id']}'";

        mysqli_query($DBConnect, $string);

        echo "<meta http-equiv='refresh' content='0'>";
    
}
?>
<div class="social_portfolio">
    <div class="social_portfolio_facebook">
        <a href='<?php
require 'connection_database.php';
$kijk = "SELECT * FROM social WHERE StudentNummer = '{$_SESSION['id']}' ";
$uitvoer = mysqli_query($DBConnect, $kijk);
$tik = mysqli_fetch_assoc($uitvoer);
echo $tik['linkedin'];
?>'><img src='includes/images/linkedin.png'></a>
        <form action='' method='post'><input type="text" name="linked" placeholder="voeg je linkedin link toe"><br><input type="submit" name="linkedin" value="OK"> </form>
    </div>
</div>
<?php
if (isset($_POST['linkedin']))
{
    if (mysqli_num_rows($uitvoer) == 0)
    {
        $string1 = "INSERT INTO social VALUES ('{$_SESSION['id']}',NULL,NULL,NULL,NULL)";
        mysqli_query($DBConnect, $string1);
    }

    $string = "UPDATE social SET linkedin = '{$_POST['linked']}' WHERE StudentNummer = '{$_SESSION['id']}'";

    mysqli_query($DBConnect, $string);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<div class="social_portfolio">
    <div class="social_portfolio_facebook">
        <a href='<?php
require 'connection_database.php';
$kijk2 = "SELECT * FROM social WHERE StudentNummer = '{$_SESSION['id']}' ";
$uitvoer2 = mysqli_query($DBConnect, $kijk2);
$tik2 = mysqli_fetch_assoc($uitvoer2);
echo $tik2['twitter'];
?>'><img src='includes/images/twitter_button.png'></a>
        <form action='' method='post'><input type="text" name="twit" placeholder="voeg je twitter link toe"><br><input type="submit" name="twitter" value="OK"> </form>
    </div>
</div>
<?php
if (isset($_POST['twitter']))
{
    if (mysqli_num_rows($uitvoer) == 0)
    {
        $string1 = "INSERT INTO social VALUES ('{$_SESSION['id']}',NULL,NULL,NULL,NULL)";
        mysqli_query($DBConnect, $string1);
    }

    $string = "UPDATE social SET twitter = '{$_POST['twit']}' WHERE StudentNummer = '{$_SESSION['id']}'";

    mysqli_query($DBConnect, $string);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<div class="social_portfolio">
    <div class="social_portfolio_facebook">
        <a href='<?php
require 'connection_database.php';
$kijk3 = "SELECT * FROM social WHERE StudentNummer = '{$_SESSION['id']}' ";
$uitvoer3 = mysqli_query($DBConnect, $kijk3);
$tik3 = mysqli_fetch_assoc($uitvoer3);
echo $tik3['instagram'];
?>'><img src='includes/images/instagram_button.png'></a>
        <form action='' method='post'><input type="text" name="insta" placeholder="voeg je instagram link toe"><br><input type="submit" name="instagram" value="OK"> </form>
    </div>
</div>
<?php
if (isset($_POST['instagram']))
{
    if (mysqli_num_rows($uitvoer) == 0)
    {
        $string1 = "INSERT INTO social VALUES ('{$_SESSION['id']}',NULL,NULL,NULL,NULL)";
        mysqli_query($DBConnect, $string1);
    }

    $string = "UPDATE social SET instagram = '{$_POST['insta']}' WHERE StudentNummer = '{$_SESSION['id']}'";

    mysqli_query($DBConnect, $string);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
</div>
<div class="clear"></div>
<?php include "includes/botinclude.php"; ?>
