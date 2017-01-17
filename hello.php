<!DOCTYPE html>
<!--
1. making upload function (able to upload documents).
2. able to retrieve documents
3. showing the documents.
4. checking documents.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- 
        Making upload function
        -->
        <form action="index.php" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input name="userfile" type="file" id="userfile">
            <input name="upload" type="submit" class="box" id="upload" value=" Upload ">
        </form>
        <?php
  

        $DBConnect = mysqli_connect("localhost", "root", "");
        if ($DBConnect === FALSE) {
            echo "<p>Unable to connect to the database server.</p>"
            . "<p>Error code " . mysqli_errno() . ": "
            . mysqli_error() . "</p>";
        } else {
            $DBName = "upload";

            if (!mysqli_select_db($DBConnect, $DBName)) {
                $SQLstring = "CREATE DATABASE $DBName";
                $QueryResult = mysqli_query($DBConnect, $SQLstring);
                if ($QueryResult === FALSE) {
                    echo "<p>Unable to execute the query.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": " . mysqli_error($DBConnect) . "</p>";
                } else {
                    echo "<p>Upload succesfull</p>";
                }
            }

            mysqli_select_db($DBConnect, $DBName);
            $TableName = "documents";
            $SQLstring = "SHOW TABLES LIKE '$TableName'";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            if (mysqli_num_rows($QueryResult) == 0) {
                $SQLstring = "CREATE TABLE $TableName(
                        id INT NOT NULL AUTO_INCREMENT,
                        name VARCHAR (50) NOT NULL,
                        type VARCHAR (50) NOT NULL,
                        size INT NOT NULL,
                        content MEDIUMBLOB NOT NULL,
                        PRIMARY KEY (id)
                        )";

                $QueryResult = mysqli_query($DBConnect, $SQLstring);
                if ($QueryResult === FALSE) {
                    echo "<p>Unable to create the table.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": " . mysqli_error($DBConnect) . "</p>";
                }
            }
            if(isset($_POST['upload'])&& $_FILES['userfile']['size'] > 0) {

            $fileName = $_FILES['userfile']['name'];
            $tmpName = $_FILES['userfile']['tmp_name'];
            $fileSize = $_FILES['userfile']['size'];
            $fileType = $_FILES['userfile']['type'];

            $fp = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp);

            if (!get_magic_quotes_gpc()) {
                $fileName = addslashes($fileName);
            }
            $SQLstring2 = "INSERT INTO $TableName (name, size, type, content)";
            "VALUES('$fileName', '$fileSize', '$fileType', '$content')"; 
           
                $QueryResult2 = mysqli_query($DBConnect , $SQLstring2);
                if ($QueryResult2 === FALSE) {
                    echo "<p>Unable to execute the query.</p>"
                    . " < p>Error code " . mysqli_errno($DBConnect)
                    . ": " . mysqli_error($DBConnect) . "</p>";
                } else {
                    echo "<h1>Upload has been succesfull!</h1>";
            }
            
                }
                mysqli_close($DBConnect);
            }

        ?>
    </body>
</html>
