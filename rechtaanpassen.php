<?php include "includes/topinclude.php"; ?>
<div class="inhoud">
    <div class="titel_naam">Recht aanpassen</div>
    <div class="cijfer_tables">
        <?php
        if (isset($_POST['submit'])) {
            $id = $_GET['action'];
            $recht = $_POST['recht'];
            $sql = "SELECT * FROM gebruiker WHERE GebruikerID = $id";
            $sqlquery = mysqli_query($DBConnect, $sql);
            $results = mysqli_fetch_assoc($sqlquery);
            if (isset($_POST['delete'])) {
                $SQLdelete = "DELETE FROM gebruiker WHERE GebruikerID = $id";
                $querydelete = mysqli_query($DBConnect, $SQLdelete);
            } else {
                $SQLcheck = "SELECT Rechtcode FROM gebruiker WHERE GebruikerID = $id";
                $queryCheck = mysqli_query($DBConnect, $SQLcheck);
                $resultsCheck = mysqli_fetch_assoc($queryCheck);
                if ($resultsCheck['Rechtcode'] != $recht) {
                    if ($resultsCheck['Rechtcode'] == 1) {
                        if ($recht == 2) {
                            $SQLstudent = "SELECT * FROM student WHERE GebruikerID = $id";
                            $queryStudent = mysqli_query($DBConnect, $SQLstudent);
                            $resultsStudent = mysqli_fetch_assoc($queryStudent);
                            $SQLAlterRecht = "UPDATE gebruiker SET Rechtcode = $recht WHERE GebruikerID = $id";
                            $queryRecht = mysqli_query($DBConnect, $SQLAlterRecht);
                            $SQLinsert = "INSERT INTO docent VALUES(NULL, '{$resultsStudent['Naam']}', NULL, '{$resultsStudent['TelefoonNummer']}', '{$resultsStudent['Email']}', NULL, $id)";
                            $queryInsert = mysqli_query($DBConnect, $SQLinsert);
                            $SQLdeleteStudent = "DELETE FROM student WHERE GebruikerID = $id";
                            $queryDeleteStudent = mysqli_query($DBConnect, $SQLdeleteStudent);
                        } elseif ($recht == 3) {
                            $SQLstudent = "SELECT * FROM student WHERE GebruikerID = $id";
                            $queryStudent = mysqli_query($DBConnect, $SQLstudent);
                            $resultsStudent = mysqli_fetch_assoc($queryStudent);
                            $SQLAlterRecht = "UPDATE gebruiker SET Rechtcode = $recht WHERE GebruikerID = $id";
                            $queryRecht = mysqli_query($DBConnect, $SQLAlterRecht);
                            $SQLinsert = "INSERT INTO slber VALUES(NULL, '{$resultsStudent['Naam']}', '{$resultsStudent['TelefoonNummer']}', '{$resultsStudent['Email']}', $id)";
                            $queryInsert = mysqli_query($DBConnect, $SQLinsert);
                            $SQLdeleteStudent = "DELETE FROM student WHERE GebruikerID = $id";
                            $queryDeleteStudent = mysqli_query($DBConnect, $SQLdeleteStudent);
                        } elseif ($recht == 4) {
                            $SQLstudent = "SELECT * FROM student WHERE GebruikerID = $id";
                            $queryStudent = mysqli_query($DBConnect, $SQLstudent);
                            $resultsStudent = mysqli_fetch_assoc($queryStudent);
                            $SQLAlterRecht = "UPDATE gebruiker SET Rechtcode = $recht WHERE GebruikerID = $id";
                            $queryRecht = mysqli_query($DBConnect, $SQLAlterRecht);
                            $SQLinsert = "INSERT INTO admin VALUES(NULL, '{$resultsStudent['Naam']}', '{$resultsStudent['TelefoonNummer']}', '{$resultsStudent['Email']}', $id)";
                            $queryInsert = mysqli_query($DBConnect, $SQLinsert);
                            $SQLdeleteStudent = "DELETE FROM student WHERE GebruikerID = $id";
                            $queryDeleteStudent = mysqli_query($DBConnect, $SQLdeleteStudent);
                        }
                    } elseif ($resultsCheck['Rechtcode'] == 2) {
                        if ($recht == 3) {
                            $SQLdocent = "SELECT * FROM docent WHERE GebruikerID = $id";
                            $queryDocent = mysqli_query($DBConnect, $SQLdocent);
                            $resultsDocent = mysqli_fetch_assoc($queryDocent);
                            $SQLAlterRecht = "UPDATE gebruiker SET Rechtcode = $recht WHERE GebruikerID = $id";
                            $queryRecht = mysqli_query($DBConnect, $SQLAlterRecht);
                            $SQLinsert = "INSERT INTO slber VALUES(NULL, '{$resultsDocent['Naam']}', '{$resultsDocent['TelefoonNummer']}', '{$resultsDocent['Email']}', $id)";
                            $queryInsert = mysqli_query($DBConnect, $SQLinsert);
                            $SQLdeleteDocent = "DELETE FROM docent WHERE GebruikerID = $id";
                            $queryDeleteStudent = mysqli_query($DBConnect, $SQLdeleteDocent);
                        } elseif ($recht == 4) {
                            $SQLdocent = "SELECT * FROM docent WHERE GebruikerID = $id";
                            $queryDocent = mysqli_query($DBConnect, $SQLdocent);
                            $resultsDocent = mysqli_fetch_assoc($queryDocent);
                            $SQLAlterRecht = "UPDATE gebruiker SET Rechtcode = $recht WHERE GebruikerID = $id";
                            $queryRecht = mysqli_query($DBConnect, $SQLAlterRecht);
                            $SQLinsert = "INSERT INTO admin VALUES(NULL, '{$resultsDocent['Naam']}', '{$resultsDocent['TelefoonNummer']}', '{$resultsDocent['Email']}', $id)";
                            $queryInsert = mysqli_query($DBConnect, $SQLinsert);
                            $SQLdeleteDocent = "DELETE FROM docent WHERE GebruikerID = $id";
                            $queryDeleteStudent = mysqli_query($DBConnect, $SQLdeleteDocent);
                        }
                    } elseif ($resultsCheck['Rechtcode'] == 3) {
                        if ($recht == 2) {
                            $SQLslber = "SELECT * FROM slber WHERE GebruikerID = $id";
                            $querySlber = mysqli_query($DBConnect, $SQLslber);
                            $resultsSlber = mysqli_fetch_assoc($querySlber);
                            $SQLAlterRecht = "UPDATE gebruiker SET Rechtcode = $recht WHERE GebruikerID = $id";
                            $queryRecht = mysqli_query($DBConnect, $SQLAlterRecht);
                            $SQLinsert = "INSERT INTO docent VALUES(NULL, NULL, '{$resultsSlber['Naam']}', '{$resultsSlber['TelefoonNummer']}', NULL '{$resultsSlber['Email']}', $id)";
                            $queryInsert = mysqli_query($DBConnect, $SQLinsert);
                            $SQLdeleteSlber = "DELETE FROM slber WHERE GebruikerID = $id";
                            $queryDeleteStudent = mysqli_query($DBConnect, $SQLdeleteSlber);
                        } elseif ($recht == 4) {
                            $SQLslber = "SELECT * FROM slber WHERE GebruikerID = $id";
                            $querySlber = mysqli_query($DBConnect, $SQLslber);
                            $resultsSlber = mysqli_fetch_assoc($querySlber);
                            $SQLAlterRecht = "UPDATE gebruiker SET Rechtcode = $recht WHERE GebruikerID = $id";
                            $queryRecht = mysqli_query($DBConnect, $SQLAlterRecht);
                            $SQLinsert = "INSERT INTO admin VALUES(NULL, '{$resultsSlber['Naam']}', '{$resultsSlber['TelefoonNummer']}', '{$resultsSlber['Email']}', $id)";
                            $queryInsert = mysqli_query($DBConnect, $SQLinsert);
                            $SQLdeleteStudent = "DELETE FROM slber WHERE GebruikerID = $id";
                            $queryDeleteStudent = mysqli_query($DBConnect, $SQLdeleteStudent);
                        }
                    }
                }
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
        $show = "SELECT * FROM gebruiker WHERE Rechtcode = 1";
        $query = mysqli_query($DBConnect, $show);
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>{$row['GebruikerID']}</td>";
            echo "<td>{$row['Gebruiker']}</td>";
            echo "<form method='post' action='rechtaanpassen.php?action=" . $row['GebruikerID'] . "' >
                                                    <td><select name='recht'>
                                                                <option value='1' selected >Student</option>";
            echo "<option value='2' >Docent</option>";
            echo "<option value='3' >SLBer</option>";
            echo "<option value='4' >Admin</option>
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
        $show = "SELECT * FROM gebruiker WHERE Rechtcode = 2";
        $query = mysqli_query($DBConnect, $show);
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>{$row['GebruikerID']}</td>";
            echo "<td>{$row['Gebruiker']}</td>";
            echo "<form method='post' action='rechtaanpassen.php?action=" . $row['GebruikerID'] . "' >
                                                    <td><select name='recht'>";
            echo "<option value='2' selected >Docent</option>";
            echo "<option value='3' >SLBer</option>";
            echo "<option value='4' >Admin</option>
                                                    </select></td>";
            echo "<td><input type='checkbox' name='delete' value='delete'></td>";
            echo "<td><input type='submit' name='submit' value='sent'></<td>";
            echo "</tr></form>";
        }
        echo "</table>";
        echo "</div>";
        
        echo "<div class='cijfer_header_links'>SLBer</div>";
        echo "<div class='clear'></div>";
        echo "<div class='cijfer_table'>";
        echo "<table >";
        echo "<tr>";
        echo "<th>GebruikerID</th>";
        echo "<th>Naam</th>";
        echo "<th>Recht</th>";
        echo "<th>Delete</th>";
        echo "<th></th>";
        $show = "SELECT * FROM gebruiker WHERE Rechtcode = 3";
        $query = mysqli_query($DBConnect, $show);
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>{$row['GebruikerID']}</td>";
            echo "<td>{$row['Gebruiker']}</td>";
            echo "<form method='post' action='rechtaanpassen.php?action=" . $row['GebruikerID'] . "' >
                                                    <td><select name='recht'>";
            echo "<option value='2'  >Docent</option>";
            echo "<option value='3' selected >SLBer</option>";
            echo "<option value='4' >Admin</option>
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
