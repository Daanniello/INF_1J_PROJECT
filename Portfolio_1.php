
<?php
include "includes/topinclude.php";
include "connection_database.php";

function color_inverse($color)
{
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6)
    {
        return '000000';
    }
    $rgb = '';
    for ($x = 0; $x < 3; $x++)
    {
        $c = 255 - hexdec(substr($color, (4 * $x), 2));
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
    }
    return '#' . $rgb;
}
?>


<div class="inhoud " >
    <div class="titel_naam" style="<?php
    $cat = "SELECT * FROM style WHERE StudentNummer = '{$_SESSION['id']}' ";
    $lion = mysqli_query($DBConnect, $cat);
    $dog = mysqli_fetch_assoc($lion);
    if ($dog['StyleCode'] == 1)
    {
        echo "";
    } elseif ($dog['StyleCode'] == 2)
    {
        echo "background-color:{$dog['KleurCode']}; border-bottom: 5px solid " . color_inverse($dog['KleurCode']);
    }
    ?>">

        <?php
        if (isset($_SESSION['username']))
        {
            $show = "SELECT * FROM student WHERE GebruikerID = '{$_SESSION['id']}'";
            $result = mysqli_query($DBConnect, $query);
            $row = mysqli_fetch_assoc($result);
            echo "Portfolio van {$row['Naam']}";
        } else
        {
            
        }
        ?>
    </div>
    <div class="beschrijving_titel">Beschrijving</div>
    <div class="beschrijving" style="<?php
    if ($dog['StyleCode'] == 1)
    {
        echo "";
    } elseif ($dog['StyleCode'] == 2)
    {
        echo "border: 2px solid" . color_inverse($dog['KleurCode']) . ";";
    }
    ?>">
             <?php
             if (isset($_SESSION['login_slber']) || isset($_SESSION['login_docent']))
             {
             
                 require 'Connection_database.php';
                 $get = "SELECT beschrijving FROM student WHERE GebruikerID = '{$_GET['student']}' ";
                 $query = mysqli_query($DBConnect, $get);
                 $row = mysqli_fetch_assoc($query);

                 if (empty($row['beschrijving']))
                 {
                     echo "Dit persoon heeft nog geen beschrijving";
                 } else
                 {
                     echo $row['beschrijving'];
                     
                 }
             } else
             {
                 
             }
             ?> 
    </div>
    

    
    
</div>
<style>
    .project_file:nth-child(even) {

        background-color:<?php if ($dog['StyleCode'] == 1)
             {
                 echo "";
             } else
             {
                 echo color_inverse(color_inverse($dog['KleurCode']));
             } ?>;
    }
    
    

        

    

</style>
<?php include "includes/botinclude.php"; ?>
