
<?php
$servername = "localhost";
$username = "canconsu_ur";
$password = "o=DMzbcb$7";
$database = "canconsu_db";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>