<?php
// tighten security for login
// regenerate session id on each page request
// session_regenerate_id(true); // TRUE referns to delete old session file

$newip=$_SERVER['REMOTE_ADDR']; 

if (!isset($_SESSION['adminUserEmail']) || empty($_SESSION['adminUserEmail']) || $newip!=$_SESSION['sessionIP']) { 

// if (!isset($_SESSION['adminUserEmail']) || empty($_SESSION['adminUserEmail'])) { 
	$stm_logged_state=0; // Not Logged
} else {
	$stm_logged_state=1; // Logged
}
?>