<?php include "includes/topinclude.php"; ?>
	<div class="inhoud">
	<?php 
        if (isset($_SESSION['login_docent'])){
            require 'connection_database.php';
            $get = "SELECT * FROM cv JOIN gebruiker WHERE StudentNummer = '{$_GET['student']}' OR StudentNummer = '{$_GET['student']}'";
            $query = mysqli_query($DBConnect, $get);
            $row = mysqli_fetch_assoc($query);
            echo "CV: <a href='includes/CV/{$row['Gebruiker']}.{$row['Link']}'> {$row['Gebruiker']}_CV</a>";
            echo "";
        }
        ?>
           
	</div>
<?php include "includes/botinclude.php"; ?>
            
