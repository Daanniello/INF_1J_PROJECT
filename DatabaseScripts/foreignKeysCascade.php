<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("INF_1J_PROJECT", ROOT . "/INF_1J_PROJECT/");
require(INF_1J_PROJECT . "Connection_database.php");

$adminDrop = "ALTER TABLE admin DROP FOREIGN KEY admin_ibfk_1";
$adminConstraint = "ALTER TABLE admin add FOREIGN KEY(GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE;";
$commentDrop = "ALTER TABLE comment DROP FOREIGN KEY comment_ibfk_1";
$commentConstraint = "ALTER TABLE comment add FOREIGN KEY(GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE;";
$cvDrop = "ALTER TABLE cv DROP FOREIGN KEY cv_ibfk_1";
$cvConstraint = "ALTER TABLE cv add FOREIGN KEY(StudentNummer) REFERENCES student(StudentNummer) ON DELETE CASCADE ON UPDATE CASCADE;";
$docentDrop = "ALTER TABLE docent DROP FOREIGN KEY docent_ibfk_1";
$docentDrop1 = "ALTER TABLE docent DROP FOREIGN KEY docent_ibfk_2";
$docentConstraint = "ALTER TABLE docent add FOREIGN KEY(ProjectNummmer) REFERENCES project(ProjectNummmer) ON DELETE CASCADE ON UPDATE CASCADE;";
$docentConstraint1 = "ALTER TABLE docent add FOREIGN KEY(GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE;";
$gebruikerDrop = "ALTER TABLE gebruiker DROP FOREIGN KEY gebruiker_ibfk_1";
$gebruikerConstraint = "ALTER TABLE gebruiker add FOREIGN KEY(Rechtcode) REFERENCES recht(Rechtcode) ON DELETE CASCADE ON UPDATE CASCADE;";
$gebruikercommunicatieDrop = "ALTER TABLE gebruiker_heeft_internecommunicatie DROP FOREIGN KEY gebruiker_heeft_internecommunicatie_ibfk_1";
$gebruikercommunicatieDrop1 = "ALTER TABLE gebruiker_heeft_internecommunicatie DROP FOREIGN KEY gebruiker_heeft_internecommunicatie_ibfk_2";
$gebruikercommunicatieConstraint = "ALTER TABLE gebruiker_heeft_internecommunicatie add FOREIGN KEY(GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE;";
$gebruikercommunicatieConstraint1 = "ALTER TABLE gebruiker_heeft_internecommunicatie add FOREIGN KEY(CommunicatieCode) REFERENCES internecommunicatie(CommunicatieCode) ON DELETE CASCADE ON UPDATE CASCADE;";
$projectDrop = "ALTER TABLE project DROP FOREIGN KEY project_ibfk_1";
$projectConstraint = "ALTER TABLE project add FOREIGN KEY(StudentNummer) REFERENCES student(StudentNummer) ON DELETE CASCADE ON UPDATE CASCADE;";
$slberDrop = "ALTER TABLE slber DROP FOREIGN KEY slber_ibfk_1";
$slberConstraint = "ALTER TABLE slber add FOREIGN KEY(GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE;";
$slberslbproductDrop = "ALTER TABLE slber_heeft_slbproduct DROP FOREIGN KEY slber_heeft_slbproduct_ibfk_1";
$slberslbproductDrop1 = "ALTER TABLE slber_heeft_slbproduct DROP FOREIGN KEY slber_heeft_slbproduct_ibfk_2";
$slberslbproductConstraint = "ALTER TABLE slber_heeft_slbproduct add FOREIGN KEY(SLBerID) REFERENCES slber(SLBerID) ON DELETE CASCADE ON UPDATE CASCADE;";
$slberslbproductConstraint1 = "ALTER TABLE slber_heeft_slbproduct add FOREIGN KEY(SLBProductCode) REFERENCES slbproduct(SLBProductCode) ON DELETE CASCADE ON UPDATE CASCADE;";
$slbproductDrop = "ALTER TABLE slbproduct DROP FOREIGN KEY slbproduct_ibfk_1";
$slbproductConstraint = "ALTER TABLE slbproduct add FOREIGN KEY(GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE;";
$studentDrop = "ALTER TABLE student DROP FOREIGN KEY student_ibfk_1";
$studentConstraint = "ALTER TABLE student add FOREIGN KEY(GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE;";
$styleDrop = "ALTER TABLE style DROP FOREIGN KEY style_ibfk_1";
$styleConstraint = "ALTER TABLE style add FOREIGN KEY(StudentNummer) REFERENCES student(StudentNummer) ON DELETE CASCADE ON UPDATE CASCADE;";
$docentcommentDrop = "ALTER TABLE docent_comment DROP FOREIGN KEY docent_comment_ibfk_1";
$docentcommentDrop1 = "ALTER TABLE docent_comment DROP FOREIGN KEY docent_comment_ibfk_2";
$docentcommentDrop2 = "ALTER TABLE docent_comment DROP FOREIGN KEY docent_comment_ibfk_3";
$docentcommentConstraint = "ALTER TABLE docent_comment add FOREIGN KEY(ProjectNummer) REFERENCES project(ProjectNummer) ON DELETE CASCADE ON UPDATE CASCADE;";
$docentcommentConstraint1 = "ALTER TABLE docent_comment add FOREIGN KEY(StudentNummer) REFERENCES student(StudentNummer) ON DELETE CASCADE ON UPDATE CASCADE;";
$docentcommentConstraint2 = "ALTER TABLE docent_comment add FOREIGN KEY(GebruikerID) REFERENCES gebruiker(GebruikerID) ON DELETE CASCADE ON UPDATE CASCADE;";


$queryArray = [];
array_push($queryArray, $adminDrop);
array_push($queryArray, $adminConstraint);
array_push($queryArray, $commentDrop);
array_push($queryArray, $commentConstraint);
array_push($queryArray, $cvDrop);
array_push($queryArray, $cvConstraint);
array_push($queryArray, $docentDrop);
array_push($queryArray, $docentDrop1);
array_push($queryArray, $docentConstraint);
array_push($queryArray, $docentConstraint1);
array_push($queryArray, $gebruikerDrop);
array_push($queryArray, $gebruikerConstraint);
array_push($queryArray, $gebruikercommunicatieDrop);
array_push($queryArray, $gebruikercommunicatieDrop1);
array_push($queryArray, $gebruikercommunicatieConstraint);
array_push($queryArray, $gebruikercommunicatieConstraint1);
array_push($queryArray, $projectDrop);
array_push($queryArray, $projectConstraint);
array_push($queryArray, $slberDrop);
array_push($queryArray, $slberConstraint);
array_push($queryArray, $slberslbproductDrop);
array_push($queryArray, $slberslbproductDrop1);
array_push($queryArray, $slberslbproductConstraint);
array_push($queryArray, $slberslbproductConstraint1);
array_push($queryArray, $slbproductDrop);
array_push($queryArray, $slbproductConstraint);
array_push($queryArray, $studentDrop);
array_push($queryArray, $studentConstraint);
array_push($queryArray, $styleDrop);
array_push($queryArray, $styleConstraint);
array_push($queryArray, $docentcommentDrop);
array_push($queryArray, $docentcommentDrop1);
array_push($queryArray, $docentcommentDrop2);
array_push($queryArray, $docentcommentConstraint);
array_push($queryArray, $docentcommentConstraint1);
array_push($queryArray, $docentcommentConstraint2);
foreach ($queryArray as $query) {
    $QueryResult = mysqli_query($DBConnect, $query);
    if ($QueryResult === FALSE) {
        echo "<p>Unable to insert.</p>"
        . "<p>Error code "
        . mysqli_errno($DBConnect)
        . ": " . mysqli_error($DBConnect) . "</p>";
    }
}
?>
/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
