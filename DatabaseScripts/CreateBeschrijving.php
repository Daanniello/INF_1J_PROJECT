<?php
require 'conncetion_database.php';
$show = 'ALTER TABLE student ADD beschrijving varchar(200)';
mysqli_query($DBConnect, $show);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

