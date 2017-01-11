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
                <p>Kies hier je gewenste stijl die je wilt voor je portfolio</p>
                <form action='editpage.php' method='post'>
                <div class=editform>
                    <p>Stijl optie: 
                    <select name='style'>
                        <option value='1'>A</option>
                        <option value='2'>B</option> 
                        <option value='3'>C</option> 
                        <option value='4'>D</option>
                    </select>
                    </p>
                    <p>Kleur optie:</p><p>
                        <input type='radio' name='color' value='1' checked> Purple 
                        <input type='radio' name='color' value='2'> Blue
                        <input type='radio' name='color' value='3'> Red
                        <input type='radio' name='color' value='4'> Green
                    </p>
                    <p>Lettertype:
                    <select name='ltype'>
                        <option value='arial'>Arial</option>
                        <option value='georgia'>Georgia</option> 
                        <option value='palatino'>Palatino</option> 
                        <option value='lucida'>Lucida Grande</option>
                    </select>
                    <p>Lettertype grootte:
                    <select name='lsize'>
                        <option value='11'>11</option>
                        <option value='12'>12</option> 
                        <option value='14'>14</option> 
                        <option value='16'>16</option>
                    </select>
                    <input type='submit'>
                </div>
                </form>
            </div>";
        require 'connection_database.php';
        $style = $_POST["style"];
        $color = $_POST["color"];
        $ltype = $_POST["ltype"];
        $lsize = $_POST["lsize"];
        $userid = $_SESSION["id"];
        $sql = "INSERT INTO style (StyleID, StyleCode, KleurCode, Lettertype, LetterGrote, StudentNummer) "
        . "VALUES(NULL,$style,$color,'$ltype',$lsize,$userid);";
        $result = mysqli_query($DBConnect, $sql);
        echo $sql;
    } else
    {
        echo "<div class=editbox> <div class='project_upload_title'> you have to log in first. <a href='login.php'>Login</a> </div></div>";
    } 
?>
</div>
<?php
    include "includes/botinclude.php"; 
?>
