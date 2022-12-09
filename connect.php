
<?php

$servername = "localhost";
$databasename = "tap_hoa";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>