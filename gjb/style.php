<?php 
header("Content-type: text/css; charset: UTF-8");
require '../connection_database.php';
session_start();

if (isset($_SESSION["login_user"]) == 1){
    $userid = $_SESSION["id"];
    $sql = "SELECT StudentNummer FROM style WHERE StudentNummer = $userid LIMIT 1;";
    $result = mysqli_query($DBConnect, $sql);
    $rows = mysqli_num_rows($result);
    if($rows==0){ //geen stijl gekozen ?>
    body{
        background-color: black;
    }
    <?php
    
    }

    else{
        
        $userid = $_SESSION["id"];
        $sql = "SELECT StyleCode, KleurCode, Lettertype, LetterGrote FROM style WHERE StudentNummer = $userid;";
        $result = mysqli_query($DBConnect, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $style = $row['StyleCode'];
            $kleur = $row['KleurCode'];
            $ltype = $row['Lettertype'];
            $lsize = $row['LetterGrote'];
            }

        switch($style){
            case ($style==1):
                $stylesheet="gjb.css";
                break;
            case ($style==2):
                $stylesheet="gjb.css";
                break;
            case ($style==3):
                $stylesheet="gjb.css";
                break;
            case ($style==4):
                $stylesheet="gjb.css";
                break;
            default:
                $stylesheet="gjb.css";
        }

        switch($kleur){
            case ($kleur==1):
                $color="purple";
                $color2="orchid";
                $bgcolor="LightGrey";
                $fontcolor="LightGrey ";
                break;
            case ($kleur==2):
                $color="blue";
                $color2="PowderBlue";
                $bgcolor="LightGrey";
                $fontcolor="LightGrey ";
                break;
            case ($kleur==3):
                $color="red";
                $color2="DarkOrange";
                $bgcolor="LightGrey";
                $fontcolor="LightGrey ";
                break;
            case ($kleur==4):
                $color="green";
                $color2="GreenYellow";
                $bgcolor="LightGrey";
                $fontcolor="LightGrey ";
                break;
            default:
                $color="blue";
                $color2="PowderBlue";
                $bgcolor="LightGrey";
                $fontcolor="LightGrey ";
        }
        switch($ltype){
            case ($ltype=="Arial"):
                $font="Arial,Helvetica Neue,Helvetica,sans-serif";
                break;
            case ($ltype=="Arial"):
                $font="Arial,Helvetica Neue,Helvetica,sans-serif";
                break;
            case ($kleur==3):
                $color="red";
                $color2="DarkOrange";
                $bgcolor="LightGrey";
                $fontcolor="LightGrey ";
                break;
            case ($kleur==4):
                $color="green";
                $color2="GreenYellow";
                $bgcolor="LightGrey";
                $fontcolor="LightGrey ";
                break;
            default:
                $color="blue";
                $color2="PowderBlue";
                $bgcolor="LightGrey";
                $fontcolor="LightGrey ";
        }
        ?>
        @import url("<?php echo $stylesheet; ?>");
        body {
            background-color:<?php echo $bgcolor; ?>;
        }
        .header {
        background:<?php echo $color; ?>;
        color:<?php echo $fontcolor; ?>;
        }
        .nav {
        background:<?php echo $color2; ?>;
        }
        .left {
        background:<?php echo $color2; ?>;
        }
        .footer {
        background:<?php echo $color; ?>;
        color:<?php echo $fontcolor; ?>;
        }
    <?php
    }
}
?>
