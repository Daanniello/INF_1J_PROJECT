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
            } else {
                echo "<div class='project_upload_title'> you have to log in first to edit this file </div>";
            }
            ?>
            <div class="project_upload_file">
                <?php ?>
            </div>
        </form>
    </div>

    <div class="project_upload">
        <form action="portfolio.php" method="post">
            <div class="project_upload_title_project">
                SLB Projecten
            </div>
            <?php
            if (isset($_SESSION["login_user"]) == 1) {
                echo '
        
				<div class="project_upload_title">
					<input type="file" name="upload_project">
					<p><input type="submit" name="submit" value="upload" ></p>
				</div>';
            } else {
                echo "<div class='project_upload_title'> you have to log in first to edit this file </div>";
            }
            ?>
            <div class="project_upload_file">
                <?php ?>
            </div>
        </form>
    </div>
</div>
<?php include "includes/botinclude.php"; ?>
