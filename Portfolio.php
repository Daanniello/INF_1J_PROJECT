
<?php
include "includes/topinclude.php";
include "connection_database.php";
function color_inverse($color) {
            $color = str_replace('#', '', $color);
            if (strlen($color) != 6) {
                return '000000';
            }
            $rgb = '';
            for ($x = 0; $x < 3; $x++) {
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
    if ($dog['StyleCode'] == 1){
        echo "";
    }elseif ($dog['StyleCode'] == 2){
        echo "background-color:{$dog['KleurCode']}; border-bottom: 5px solid ".color_inverse($dog['KleurCode']);
        
    }
    
    
    
    ?>">
        
        <?php 
        if (isset($_SESSION['username'])){
            $show = "SELECT * FROM student WHERE GebruikerID = '{$_SESSION['id']}'";
        $result = mysqli_query($DBConnect, $query);
        $row = mysqli_fetch_assoc($result);
        echo "Portfolio van {$row['Naam']}";
        }else{
        }
         ?>
    </div>
    <div class="project_upload" style="<?php 
    
    $cat = "SELECT * FROM style WHERE StudentNummer = '{$_SESSION['id']}' ";
    $lion = mysqli_query($DBConnect, $cat);
    $dog = mysqli_fetch_assoc($lion);
    if ($dog['StyleCode'] == 1){
        echo "";
    }elseif ($dog['StyleCode'] == 2){
        echo "background-color:{$dog['KleurCode']}; ";
        
    }
    
    
    
    ?>">
		<div class="upload_top">
			<form enctype='multipart/form-data' action="portfolio.php" method="post">
				<div class="project_upload_title">
					Projecten
				</div>
				<?php
				if (isset($_SESSION["login_user"]) == 1)
				{
					echo '
						<input type="file" name="upload_project"><br>
						<input type="text" name="name" placeholder="Name of project"><br>
						<input type="submit" name="submit" value="Upload">';
				} else
				{
					echo "<div class='project_upload_title'> you have to log in first to edit this file </div>";
				}
				?>
			</form>
		</div>
		
		<div class="project_upload_file" style="<?php 
    
    
    if ($dog['StyleCode'] == 1){
        echo "";
    }elseif ($dog['StyleCode'] == 2){
        echo "background-color:".color_inverse($dog['KleurCode']).";" ;
        
    }
    
    
    
    ?>">
			<?php
			if (isset($_POST['submit']))
			{
				if (empty($_FILES['upload_project']['name']) || empty($_POST['name']))
				{
					echo "Je hebt geen bestand of naam gekozen.";
				} else
				{
					$name = $_POST['name'];
					$file = $_FILES['upload_project']['name'];
					$ext = pathinfo($file, PATHINFO_EXTENSION);
					$query = "INSERT INTO project VALUES(NULL,'$name','$ext','{$_SESSION['id']}',NULL)";
					mysqli_query($DBConnect, $query);
				$target_path = "includes/project/";

				$target_path = $target_path .$name .$_SESSION['username'] . ".".$ext;

				if (move_uploaded_file($_FILES['upload_project']['tmp_name'], $target_path))
				{
					
				} else
				{
					echo "There was an error uploading the file, please try again!";
				}
				header("Refresh:0"); 
				}
			}
			
			if (isset($_SESSION['username']))
			{
				
				$naam = "SELECT * FROM project WHERE StudentNummer = '{$_SESSION['id']}'";
				$show = mysqli_query($DBConnect, $naam);
				
				while ($row = mysqli_fetch_assoc($show)){
					echo "<div class='project_file'>";
					echo "<a href='includes/project/{$row['Naam']}{$_SESSION['username']}.{$row['Project']}' target='blank'>{$row['Naam']}</a><br> ";
					echo "</div>";
				}
				
			}
			?>

		</div>
    </div>

    <div class="project_upload" style="<?php 
    
    $cat = "SELECT * FROM style WHERE StudentNummer = '{$_SESSION['id']}' ";
    $lion = mysqli_query($DBConnect, $cat);
    $dog = mysqli_fetch_assoc($lion);
    if ($dog['StyleCode'] == 1){
        echo "";
    }elseif ($dog['StyleCode'] == 2){
        echo "background-color:{$dog['KleurCode']}; ";
        
    }
    
    
    
    ?>">
		<div class="upload_top">
			<form enctype='multipart/form-data' action="portfolio.php" method="post">
				<div class="project_upload_title">
					SLB Projecten
				</div>
				<?php
				if (isset($_SESSION["login_user"]) == 1)
				{
					echo '	
					<input type="file" name="upload_project1"><br>
					<input type="text" name="textname" placeholder="Name of SLBProduct"><br>
					<input type="submit" name="submit1" value="Upload" >';
				} else
				{
					echo "<div class='project_upload_title'> you have to log in first to edit this file </div>";
				}
				?>
			</form>
		</div>
		
		<div class="project_upload_file">
			<?php
			if (isset($_POST['submit1']))
			{
				if (empty($_FILES['upload_project1']['name']) || empty($_POST['textname']))
				{
					echo "Je hebt geen bestand of naam gekozen.";
				} else
				{
					$name1 = $_POST['textname'];
					$file = $_FILES['upload_project1']['name'];
					$ext1 = pathinfo($file, PATHINFO_EXTENSION);
					$query = "INSERT INTO slbproduct VALUES(NULL,'$name1','$ext1',NULL,'{$_SESSION['id']}')";
					mysqli_query($DBConnect, $query);
				$target_path = "includes/SLB/";

				$target_path = $target_path .$name1 .$_SESSION['username'] . ".".$ext1;

				if (move_uploaded_file($_FILES['upload_project1']['tmp_name'], $target_path))
				{
					
				} else
				{
					echo "There was an error uploading the file, please try again!";
				}
				header("Refresh:0"); 
				}
			}
			
			if (isset($_SESSION['username']))
			{
				
				$naam1 = "SELECT * FROM slbproduct WHERE GebruikerID = '{$_SESSION['id']}'";
				$show1 = mysqli_query($DBConnect, $naam1);
				
				while ($row1 = mysqli_fetch_assoc($show1)){
					echo "<a href='includes/SLB/{$row1['Historie']}{$_SESSION['username']}.{$row1['SLBProduct']}' target='blank'>{$row1['Historie']}</a><br> ";
				}
				
			}
			?>
		</div>
    </div>
    <div class="beschrijving" style="<?php 
    
    
    if ($dog['StyleCode'] == 1){
        echo "";
    }elseif ($dog['StyleCode'] == 2){
        echo "border: 2px solid".color_inverse($dog['KleurCode']).";" ;
        
    }
    
    
    
    ?>">
        <?php
        if (isset($_SESSION['username']))
        {
            
            require 'Connection_database.php';
            $get = "SELECT beschrijving FROM student WHERE GebruikerID = '{$_SESSION['id']}' ";
            $query = mysqli_query($DBConnect, $get);
            $row = mysqli_fetch_assoc($query);
            
            if (empty($row['beschrijving']))
            {
                echo "<form action='#' method='post'><textarea name='area' ></textarea><input type='submit' name='submit2' value='Voeg toe'> </form> ";
                if (isset($_POST['submit2'])){
                    $vul = $_POST['area'];
                    $querie = "UPDATE student SET beschrijving = '$vul' WHERE GebruikerID = '{$_SESSION['id']}' ";
                    mysqli_query($DBConnect, $querie);
                    echo "query send";
                    header("Refresh:0");
                   
                }
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
        background-color:<?php if ($dog['StyleCode'] == 1){echo "";}else{ echo color_inverse(color_inverse($dog['KleurCode']));} ?>;
}
    
</style>
<?php include "includes/botinclude.php"; ?>
