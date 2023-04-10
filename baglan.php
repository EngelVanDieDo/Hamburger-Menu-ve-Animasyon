<?php
$host="localhost";
$kullanici="root";
$parola="";
$vt="uyelik";

$baglan=mysqli_connect($host,$kullanici,$parola,$vt);
mysqli_set_charset($baglan,"UTF8");
?>