<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "baza_date";

$conexiune = mysqli_connect($hostname,$username,$password)
or die ("Eroare! Conectarea nereusita!");

$baza_date = mysqli_select_db($conexiune,$db)
or die ("Numele acestei baze de date nu exista!");

?>
