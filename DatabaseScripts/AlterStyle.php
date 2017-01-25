<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]);
define("INF_1J_PROJECT",ROOT."/INF_1J_PROJECT/");
require(INF_1J_PROJECT."Connection_database.php");
$show = 'ALTER TABLE style MODIFY COLUMN KleurCode varchar(30)';
mysqli_query($DBConnect, $show);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
