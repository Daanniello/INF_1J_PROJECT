<?php include "includes/topinclude.php"; ?>
	<div class="inhoud">
	<?php 
        if (isset($_SESSION['login_docent'])){
            require 'connection_database.php';
            $get = "SELECT * FROM cv JOIN gebruiker WHERE StudentNummer = '{$_GET['student']}' OR StudentNummer = '{$_GET['student']}'";
            $get1 = "SELECT * FROM project JOIN gebruiker ON project.StudentNummer = gebruiker.GebruikerID  WHERE StudentNummer = '{$_GET['student']}' ";
            $query = mysqli_query($DBConnect, $get);
            $query1 = mysqli_query($DBConnect, $get1);
            $row = mysqli_fetch_assoc($query);
            
            echo "CV:<br> <a href='includes/CV/{$row['Gebruiker']}.{$row['Link']}'> {$row['Gebruiker']}_CV</a><br>";
            echo "<br>Project:<br>";
            while ($row1 = mysqli_fetch_assoc($query1)){
                echo "<a href='includes/project/{$row1['Naam']}{$row1['Gebruiker']}.{$row1['Project']}' target='blank'>{$row1['Naam']}</a><br>";
            }
        }
        ?>
           
	</div>
<?php include "includes/botinclude.php"; ?>
            
