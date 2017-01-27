<?php include "includes/topinclude.php"; ?>
	<div class="inhoud">
	<?php 
        if (isset($_SESSION['login_docent']) || isset($_SESSION['login_slber'])){
            require 'connection_database.php';
            $show = 'SELECT * FROM student JOIN gebruiker ON student.GebruikerID = gebruiker.GebruikerID WHERE Rechtcode = "1" ';
            $query = mysqli_query($DBConnect, $show);
            
			echo "<div class='titel_naam'>Studenten</div>";
			echo "<table class='students_table'>";
			echo "<th>Profiel</th>";
			echo "<th>Studentnummer</th>";
			echo "<th>Telefoonnummer</th>";
			echo "<th>E-mail</th>";
			
            while ($row = mysqli_fetch_assoc($query)){
				echo "<tr>";
					echo "<td>{$row['Naam']}&nbsp&nbsp<a href='studentfile.php?student={$row['StudentNummer']}'>Cijfers </a>&nbsp&nbsp<a href='portfolio_1.php?student={$row['StudentNummer']}'>Portfolio</a>&nbsp&nbsp<a href='testPriveComment.php?student={$row['StudentNummer']}'>Bericht</a></td>";
					echo "<td>{$row['StudentNummer']}</td>";
					echo "<td>{$row['TelefoonNummer']}</td>";
					echo "<td>{$row['Email']}</td>";
				echo "</tr>";
            }
            echo "</table>";
        }
        ?>
	</div>
<?php include "includes/botinclude.php"; ?>
            
