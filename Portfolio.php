<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include "includes/topinclude.php"; ?>
<div class="project_upload">
    <form action="#" method="post">
        <div class="project_upload_title_project">
            Projecten

        </div>
        <div class="project_upload_title">
            <input type="file" name="upload_project">
            <p><input type="submit" name="submit" value="upload" ></p>
        </div>
        <div class="project_upload_file">
            <?php
            include "connection_database.php";
            ?>
        </div>

    </form>
</div>
<?php include "includes/botinclude.php"; ?>
