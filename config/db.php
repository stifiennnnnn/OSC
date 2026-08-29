<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admeals";

$connection = mysqli_connect($servername, $username, $password, $dbname);
$dbselect = mysqli_select_db($connection, $dbname);
?>