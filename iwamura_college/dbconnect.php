
<?php
$servername = "localhost";
$username = "iwamurao_ur";
$password = "39arZ{7]ZIr?";
$database = "iwamurao_db";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>