<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "moes_pc_parts";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed.");
}
?>
