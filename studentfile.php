<?php include "includes/topinclude.php"; ?>
<div class="inhoud">
	<div class="titel_naam">Cijfers</div>
    <?php
    if (isset($_SESSION['login_docent']))
    {
        require 'connection_database.php';
        $get = "	SELECT * 
					FROM cv 
					JOIN gebruiker 
					WHERE StudentNummer = '{$_GET['student']}' 
					OR StudentNummer = '{$_GET['student']}'";
					
        $get1 = "	SELECT * 
					FROM project 
					JOIN gebruiker ON project.StudentNummer = gebruiker.GebruikerID  
					WHERE StudentNummer = '{$_GET['student']}' ";
					
        $get2 = "	SELECT * 
					FROM slbproduct 
					JOIN gebruiker ON slbproduct.GebruikerID = gebruiker.GebruikerID  
					WHERE slbproduct.GebruikerID = '{$_GET['student']}' ";
					
        $query = mysqli_query($DBConnect, $get);
        $query1 = mysqli_query($DBConnect, $get1);
        $query2 = mysqli_query($DBConnect, $get2);
        $row = mysqli_fetch_assoc($query);

		
		echo "<div class='cijfer_header_links'>Projecten</div>";
		echo "<div class='cijfer_header_rechts'>SLB Projecten</div>";
		echo "<div class='clear'></div>";
        echo "<div class='cijfer_toewijzen_table_links cijfer_toewijzen_table'>";
			echo "<table>";
				echo "<th>Naam</th>";
				echo "<th>Cijfer</th>";
				echo "<th colspan='2'>Cijfer toevoegen</th>";
				while ($row1 = mysqli_fetch_assoc($query1)) {
					echo "<tr>";
					echo "<td><a href='includes/project/{$row1['Naam']}{$row1['Gebruiker']}.{$row1['Project']}' target='blank'>{$row1['Naam']}</a></td>";
					echo "<td>" . $row1['Cijfer'] . "</td>";
					echo "<form action='#' method='post'>";
						echo "<td><input class='number_cijfer' type='text' name='{$row1['Naam']}'></td>";
						echo "<td><input class='number_sub' type='submit' name='P{$row1['Naam']}' value='Toevoegen'></td>";
					echo "</form>";
					echo "</tr>";
					
					if (isset($_POST['P'.$row1['Naam']])) {
						$show = "UPDATE project SET Cijfer = '" . $_POST[$row1['Naam']] . "' WHERE ProjectNummer = '{$row1['ProjectNummer']}' ";
						mysqli_query($DBConnect, $show);
						echo "<meta http-equiv='refresh' content='0'>";
					}
				}
			echo "</table>";
		echo "</div>";
		
		echo "<div class='cijfer_toewijzen_table_rechts cijfer_toewijzen_table'>";
			echo "<table>";
				echo "<th>Naam</th>";
				echo "<th>Cijfer</th>";
				echo "<th colspan='2'>Cijfer toevoegen</th>";
				while ($row2 = mysqli_fetch_assoc($query2)) {
					echo "<tr>";
					echo "<td><a href='includes/SLB/{$row2['Historie']}{$row2['Gebruiker']}.{$row2['SLBProduct']}' target='blank'>{$row2['Historie']}</a></td>";
					echo "<td>" . $row2['Cijfer']. "</td>";
					echo "<form action='#' method='post'>";
						echo "<td><input class='number_cijfer' type='text' name='{$row2['Historie']}'></td>";
						echo "<td><input class='number_sub' type='submit' name='Q{$row2['Historie']}' value='Toevoegen'></td>";
					echo "</form>";
					echo "</tr>";
					
					if (isset($_POST['Q'.$row2['Historie']])) {
						$show1 = "UPDATE slbproduct SET Cijfer = '" . $_POST[$row2['Historie']] . "' WHERE SLBProductCode = '{$row2['SLBProductCode']}' ";
						mysqli_query($DBConnect, $show1);
						echo "<meta http-equiv='refresh' content='0'>";
					}
				}
			echo "</table>";
		echo "</div>";
		echo "<div class='clear'></div>";
		
		echo "<div class='cijfer_toewijzen_cv'>";
			if ($row['StudentNummer'] == $_GET['student']) {
				echo "<a href='includes/CV/{$row['Gebruiker']}.{$row['Link']}'> {$row['Gebruiker']}_CV</a>";
			} else {
				echo "User has no CV";
			}
		echo "</div>";

    }
    ?>
</div>
<?php include "includes/botinclude.php"; ?>