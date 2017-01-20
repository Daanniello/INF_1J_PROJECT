<?php include "includes/topinclude.php"; ?>
	<div class="inhoud">
		<div class="titel_naam">Cijfers</div>
		<div class="cijfer_tables">
			<?php
				
				echo "<div class='cijfer_header_links'>Projecten</div>";
				echo "<div class='cijfer_header_rechts'>SLB Projecten</div>";
				echo "<div class='clear'></div>";
				echo "<div class='cijfer_table'>";
					echo "<table >";
                                        echo "<tr>";
					echo "<th>Naam </th>";
					echo "<th>Cijfer</th>";
					$show="SELECT * FROM project WHERE StudentNummer = '{$_SESSION['id']}'";
					$query= mysqli_query($DBConnect, $show);
					while ($row = mysqli_fetch_assoc($query)){
						echo "<tr>";
						echo "<td>{$row['Naam']}</td>";
						if(empty($row['Cijfer'])) {
							echo "<td>Niet toegewezen</td>";
						} else {
							echo "<td>{$row['Cijfer']}</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
				echo "</div>";
				
				echo "<div class='cijfer_table'>";
					echo "<table>";
                                        echo "<tr>";
					echo "<th>Naam </th>";
					echo "<th>Cijfer</th>";
					$show1 ="SELECT * FROM slbproduct WHERE GebruikerID = '{$_SESSION['id']}'";
					$query1= mysqli_query($DBConnect, $show1);
					while ($row1 = mysqli_fetch_assoc($query1)){
						echo "<tr>";
						echo "<td>{$row1['Historie']}</td>";
						echo "<td>{$row1['Cijfer']}</td>";
						echo "</tr>";
					}
					echo "</table>";
				echo "</div>";
			?>
		</div>
	</div>
<?php include "includes/botinclude.php"; ?>
            
