<?php

$server = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "data";
    
   $con =  mysqli_connect($server,$dbUser,$dbPassword,$dbName);

   if(!$con){
       die("Error : ".mysqli_connect_error());
   }


?>