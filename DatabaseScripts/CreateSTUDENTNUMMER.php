<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]);
define("INF_1J_PROJECT",ROOT."/INF_1J_PROJECT/");
require(INF_1J_PROJECT."Connection_database.php");
$show = 'ALTER TABLE slbproduct ADD StudentNummer int(11)';
$show1 = 'ALTER TABLE slbproduct ADD FOREIGN KEY (StudentNummer) REFERENCES student(StudentNummer)';
mysqli_query($DBConnect, $show);
mysqli_query($DBConnect, $show1);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

