<?php
include "includes/topinclude.php";
include "Connection_database.php";
?>
<div class="inhoud">
    <form class="message_post" Method="POST" Action="comment.php">
        <p>Comment:</p>
        <p><textarea name="comment" rows="4" cols="50" maxlength="250"></textarea></p>
        <p><input type="submit" name="submit" value="Send"/></p>
    </form>
    <?php
    $tablenaam = "comment";
    if (isset($_POST['submit']))
    {
        if (empty($_POST['comment']))
        {
            echo"Please fill something in";
        }elseif(ctype_space($_POST['comment'])){
            echo"Please don't do that."
            . "I will find you"
                    . " and I will kill you."
                    . " Especially if your name is Frank Tieck and Kevin";
        } 
        
        else
        {
            $comment = stripslashes($_POST['comment']);
            $GID = $_SESSION['id'];
            $date = date("Y-m-d");
            $time = date("H:i:s");
            $SQLstring = "INSERT INTO $tablenaam VALUES ('NULL', '$comment', '$GID', '$date', '$time')";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE)
            {
                echo "<p>Unable to execute the query.</p>"
                . "<p>Error code " . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
                echo"$SQLstring";
            } else
            {
                echo "<p>The comment has been added.</p>";
            }
        }
    }
    ?>
    <div class="tabel">
        <?php
       if ($DBConnect === FALSE)
        {
            echo "<p>Unable to connect to the database server.</p>"
            . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
            . "</p>";
        } else
        {
            $DBName = "digital_portfolio";
            if (!mysqli_select_db($DBConnect, $DBName))
            {
                echo "<p>There are no comments yet!</p>";
            } else
            {
                $TableName = "comment";
                $SQLstring2 = "SELECT * FROM $TableName ORDER BY CommentID DESC";
                $SQLstring3 = "SELECT 'Naam', 'Profielfoto' FROM 'student'";
                $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
                if (mysqli_num_rows($QueryResult2) == 0)
                {
                    echo "<p>There are no comments given yet!</p>";
                }  else
                {
                    echo "<h2>The following comments have been given:</h2>";
                    while ($Row = mysqli_fetch_assoc($QueryResult2))
                    {
                        $commentID = $Row['CommentID'];
                        $SQLstring4 = "SELECT Naam, Profielfoto, Gebruiker
                                FROM student
                                JOIN comment
                                ON student.GebruikerID = comment.GebruikerID
                                JOIN gebruiker
                                ON gebruiker.GebruikerID = comment.GebruikerID
                                WHERE CommentID = $commentID";
                        $QueryResult3 = mysqli_query($DBConnect, $SQLstring4);
                        $naamFoto = mysqli_fetch_assoc($QueryResult3);
                        ?>
                        <div class="post">
                            <div class="gebruiker">
                                <div class="naam">
                                    <?php
                                    echo "{$naamFoto['Naam']}";
                                    ?>
                                </div>
                                <div class="profielfoto">
                                    <?php
                                    echo "<img src='includes/profielfoto/" . $naamFoto['Gebruiker'] . $naamFoto['Profielfoto'] . "' alt='profielfoto' width='100' height='100'/>";
                                    ?>
                                </div>
                            </div>
                            <div class="date">
                                <?php
                                echo "{$Row['Date']} |";
                                ?>
                            </div>
                            <div class="time">  
                                <?php
                                echo "{$Row['Time']}";
                                ?>
                            </div>
                            <div class="message">
                                <?php
                                echo "{$Row['Message']}";
                                ?>
                            </div>
                            
                        </div>
                        <?php
                    }
                }
            }
        }
        ?>
    </div>
</div>
<?php include "includes/botinclude.php"; ?>
