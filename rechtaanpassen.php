<?php include "includes/topinclude.php"; ?>
	<div class="inhoud">
		<div class="titel_naam">Recht aanpassen</div>
		<div class="cijfer_tables">
			<?php
				if(isset($_POST['submit'])) {
                                    $id = $_GET['action'];
                                    $recht = $_POST['recht'];
                                    $sql = "SELECT * FROM gebruiker WHERE GebruikerID = $id";
                                    $sqlquery= mysqli_query($DBConnect, $sql);
                                    $results = mysqli_fetch_assoc($sqlquery);
                                    if(isset($_POST['delete'])){
                                        
                                    } else {
                                        
                                    }
                                }
				echo "<div class='cijfer_header_links'>Studenten</div>";
				echo "<div class='cijfer_header_rechts'>Docenten</div>";
				echo "<div class='clear'></div>";
				echo "<div class='cijfer_table'>";
					echo "<table >";
                                        echo "<tr>";
                                        echo "<th>GebruikerID</th>";
					echo "<th>Naam</th>";
					echo "<th>Recht</th>";
                                        echo "<th>Delete</th>";
                                        echo "<th></th>";
					$show="SELECT * FROM gebruiker WHERE Rechtcode = 1";
					$query= mysqli_query($DBConnect, $show);
					while ($row = mysqli_fetch_assoc($query)){
						echo "<tr>";
						echo "<td>{$row['GebruikerID']}</td>";
                                                echo "<td>{$row['Gebruiker']}</td>";
                                                echo "<form method='post' action='rechtaanpassen.php?action=" .$row['GebruikerID']. "' >
                                                    <td><select name='recht'>
                                                                <option value='1' selected >Student</option>";
                                                echo            "<option value='2' >Docent</option>";
                                                echo            "<option value='3' >SLBer</option>";
                                                echo            "<option value='4' >Admin</option>
                                                    </select></td>";
                                                echo "<td><input type='checkbox' name='delete' value='delete'></td>";
                                                echo "<td><input type='submit' name='submit' value='sent'></<td>";
						echo "</tr></form>";
					}
					echo "</table>";
				echo "</div>";
				
				echo "<div class='cijfer_table'>";
					echo "<table >";
                                        echo "<tr>";
                                        echo "<th>GebruikerID</th>";
					echo "<th>Naam</th>";
					echo "<th>Recht</th>";
                                        echo "<th>Delete</th>";
                                        echo "<th></th>";
					$show="SELECT * FROM gebruiker WHERE Rechtcode = 2";
					$query= mysqli_query($DBConnect, $show);
					while ($row = mysqli_fetch_assoc($query)){
						echo "<tr>";
						echo "<td>{$row['GebruikerID']}</td>";
                                                echo "<td>{$row['Gebruiker']}</td>";
                                                echo "<form method='post' action='rechtaanpassen.php?action=" .$row['GebruikerID']. "' >
                                                    <td><select name='recht'>
                                                                <option value='1' selected >Student</option>";
                                                echo            "<option value='2' >Docent</option>";
                                                echo            "<option value='3' >SLBer</option>";
                                                echo            "<option value='4' >Admin</option>
                                                    </select></td>";
                                                echo "<td><input type='checkbox' name='delete' value='delete'></td>";
                                                echo "<td><input type='submit' name='submit' value='sent'></<td>";
						echo "</tr></form>";
					}
					echo "</table>";
				echo "</div>";
			?>
		</div>
	</div>
<?php include "includes/botinclude.php"; ?>
