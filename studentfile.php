<?php include "includes/topinclude.php"; ?>
<div class="inhoud">
    <?php
    if (isset($_SESSION['login_docent']))
    {
        require 'connection_database.php';
        $get = "SELECT * FROM cv JOIN gebruiker WHERE StudentNummer = '{$_GET['student']}' OR StudentNummer = '{$_GET['student']}'";
        $get1 = "SELECT * FROM project JOIN gebruiker ON project.StudentNummer = gebruiker.GebruikerID  WHERE StudentNummer = '{$_GET['student']}' ";
        $get2 = "SELECT * FROM slbproduct JOIN gebruiker ON slbproduct.GebruikerID = gebruiker.GebruikerID  WHERE slbproduct.GebruikerID = '{$_GET['student']}' ";
        $query = mysqli_query($DBConnect, $get);
        $query1 = mysqli_query($DBConnect, $get1);
        $query2 = mysqli_query($DBConnect, $get2);
        $row = mysqli_fetch_assoc($query);


        echo "CV:<br> <a href='includes/CV/{$row['Gebruiker']}.{$row['Link']}'> {$row['Gebruiker']}_CV</a><br>";
        echo "<br>Project:<br>";

        while ($row1 = mysqli_fetch_assoc($query1))
        {
            echo "<a href='includes/project/{$row1['Naam']}{$row1['Gebruiker']}.{$row1['Project']}' target='blank'>{$row1['Naam']}</a> &nbsp &nbsp <form action='#' method='post'>Cijfer:&nbsp &nbsp".$row1['Cijfer'] ."&nbsp &nbsp <input class='number_cijfer' type='text' name='{$row1['Naam']}'><input class='number_sub' type='submit' name='{$row1['ProjectNummer']}' value='ADD'>  </form> ";
            if (isset($_POST[$row1['ProjectNummer']]))
            {
               $show="UPDATE project SET Cijfer = '" .$_POST[$row1['Naam']]. "' WHERE ProjectNummer = '{$row1['ProjectNummer']}' "; 
               mysqli_query($DBConnect, $show);
               header('refresh:0');
            }
        }

        echo "<br>SLB Product:<br>";
        while ($row2 = mysqli_fetch_assoc($query2))
        {
            echo "<a href='includes/SLB/{$row2['Historie']}{$row2['Gebruiker']}.{$row2['SLBProduct']}' target='blank'>{$row2['Historie']}</a><br>";
        }
    }
    ?>

</div>
<?php include "includes/botinclude.php"; ?>
            
