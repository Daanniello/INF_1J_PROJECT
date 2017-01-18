<?php include "includes/topinclude.php"; ?>
	<div class="inhoud">
	<?php 
        $show="SELECT * FROM project WHERE StudentNummer = '{$_SESSION['id']}'";
        $query= mysqli_query($DBConnect, $show);
        echo "Project:<br>";
        while ($row = mysqli_fetch_assoc($query)){
            
            echo "<br>Project: &nbsp{$row['Naam']}Cijfer: {$row['Cijfer']}<br>";
            
        }
        
        $show1 ="SELECT * FROM slbproduct WHERE GebruikerID = '{$_SESSION['id']}'";
        $query1= mysqli_query($DBConnect, $show1);
        echo "<br>SLB Product:<br>";
        while ($row1 = mysqli_fetch_assoc($query1)){
            
            echo "<br>Project: &nbsp{$row1['Historie']}Cijfer: {$row1['Cijfer']}<br>";
            
        }
        
        ?>
	</div>
<?php include "includes/botinclude.php"; ?>
            
