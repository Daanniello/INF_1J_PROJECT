<?php 
include "includes/topinclude.php";
include "connection_database.php";
?>
<div class="inhoud">
<?php
    if (isset($_SESSION["login_user"]) == 1)
    {
        echo "
            <div class=editbox>
                <h2>Portfolio stijl</h2>
                <p>Kies hier je gewenste portfolio stijl:</p><br>
                <form action='editpage.php' method='post'>
                <div class=editform>
                    <label class='formlabel'>Stijl:</label>
                    <select name='style' class='select'>
                        <option value='2'>Custom</option> 
                        <option value='1'>Reset</option>
                    </select><br>
                    <label class='formlabel'>Kleur:</label><input type='color' name='color'><br>
                    <label class='formlabel'>Lettertype:</label>
                    <select name='ltype' class='select'>
                        <option value='arial'>Arial</option>
                        <option value='georgia'>Georgia</option> 
                        <option value='palatino'>Palatino</option> 
                        <option value='lucida'>Lucida Grande</option>
                    </select><br>
                    <label class='formlabel'>Lettertype grootte:</label><input type=number name='lsize' min='12' max='20'><br>
                    <input type='submit' value='Versturen'>
                </div>
                </form>
            </div>";
        require 'connection_database.php';
        if(isset($_POST["style"])){
            $userid = $_SESSION["id"];
            $style = $_POST["style"];
            $color = $_POST["color"];
            $ltype = $_POST["ltype"];
            $lsize = $_POST["lsize"];
            $sql = "SELECT StudentNummer FROM style WHERE StudentNummer = $userid LIMIT 1;";
            $result = mysqli_query($DBConnect, $sql);
            if(! $result){
                echo "sqlstring werkt niet";
            }
            $rows = mysqli_num_rows($result);
            if($rows==0){
                $sql = "INSERT INTO style (StyleID, StyleCode, KleurCode, Lettertype, LetterGrote, StudentNummer) "
                . "VALUES(NULL,$style,'$color','$ltype',$lsize,$userid);";
                $result = mysqli_query($DBConnect, $sql);
                echo "<p>Je gekozen stijl is opgeslagen!</p>";
            }else{
                $sql = "UPDATE style SET StyleCode = $style, KleurCode = '$color', Lettertype = '$ltype', Lettergrote = $lsize 
                    WHERE StudentNummer = $userid";
                $result = mysqli_query($DBConnect, $sql);
                echo "<p>Je gekozen stijl is aangepast!</p>$color";
            }
        }
    } else{
        echo "<div class=editbox> <div class='project_upload_title'> you have to log in first. <a href='login.php'>Login</a> </div></div>";
    } 
?>
</div>
<?php
    include "includes/botinclude.php"; 
?>
