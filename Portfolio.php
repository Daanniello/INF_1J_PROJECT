
<?php
include "includes/topinclude.php";
include "connection_database.php";
?>

<div class="inhoud">
    <div class="project_upload">
        <form action="portfolio.php" method="post">
            <div class="project_upload_title_project">
                Projecten
            </div>
            <?php
            if (isset($_SESSION["login_user"]) == 1)
            {
                echo '
        
				<div class="project_upload_title">
					<input type="file" name="upload_project">
					<p><input type="submit" name="submit" value="upload" ></p>
				</div>';
            } else
            {
                echo "<div class='project_upload_title'> you have to log in first to edit this file </div>";
            }
            ?>

            <div class="project_upload_file">
                <?php
                if (isset($_POST['submit']))
                {
                    if (empty($_POST['upload_project']))
                    {
                        echo "Je hebt geen bestand gekozen.";
                    } else
                    {
                        $file = $_POST['upload_project'];
                        echo $file;
                    }
                }
                ?>
                <?php
                if (isset($_SESSION['username']))
                {
                    require "Connection_database.php";
                }
                ?>

            </div>
        </form>
    </div>

    <div class="project_upload">
        <form action="portfolio.php" method="post">
            <div class="project_upload_title_project">
                SLB Projecten
            </div>
            <?php
            if (isset($_SESSION["login_user"]) == 1)
            {
                echo '
        
				<div class="project_upload_title">
					<input type="file" name="upload_project1">
					<p><input type="submit" name="submit1" value="upload" ></p>
				</div>';
            } else
            {
                echo "<div class='project_upload_title'> you have to log in first to edit this file </div>";
            }
            ?>

            <div class="project_upload_file">
                <?php
                if (isset($_POST['submit1']))
                {
                    if (empty($_POST['upload_project1']))
                    {
                        echo "Je hebt geen bestand gekozen.";
                    } else
                    {
                        $file = $_POST['upload_project1'];
                        echo $file;
                    }
                }
                ?>
                <?php
                if (isset($_SESSION['username']))
                {
                    echo "";
                }
                ?>
            </div>
        </form>
    </div>
    <div class="beschrijving">
        <?php
        if (isset($_SESSION['username']))
        {
            
            require 'Connection_database.php';
            $get = "SELECT beschrijving FROM student WHERE GebruikerID = '{$_SESSION['id']}' ";
            $query = mysqli_query($DBConnect, $get);
            $row = mysqli_fetch_assoc($query);
            
            if (mysqli_num_rows($query)!== 1)
            {
                echo "<form action='#' method='post'><textarea name='area' ></textarea><input type='submit' name='submit2' value='Voeg toe'> </form> ";
                if (isset($_POST['submit2'])){
                    $vul = $_POST['area'];
                    $querie = "UPDATE student SET beschrijving = '$vul' WHERE GebruikerID = '{$_SESSION['id']}' ";
                    mysqli_query($DBConnect, $querie);
                    echo "query send";
                }
            } else
            {


                echo $row['beschrijving'];
                
            }
        } else
        {
            
        }
        ?> 
    </div>
</div>
<?php include "includes/botinclude.php"; ?>
