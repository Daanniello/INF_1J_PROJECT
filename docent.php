<?php include "includes/topinclude.php"; ?>
	<div class="inhoud">
	<?php 
        if (isset($_SESSION['login_docent'])){
            require 'connection_database.php';
            $show = 'SELECT * FROM student';
            $query = mysqli_query($DBConnect, $show);
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($query)){
                echo "<li><a href='studentfile.php?student={$row['StudentNummer']}'>{$row['Naam']}</a>&nbsp&nbsp{$row['StudentNummer']}<ul><li>{$row['TelefoonNummer']}</li><li>{$row['Email']}</li></ul></li><br>";
                
                 
               
            }
            echo "</ul>";
        }
        ?>
	</div>
<?php include "includes/botinclude.php"; ?>
            
