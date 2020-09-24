<?php
session_start();
unset($_SESSION['adminUserEmail']);
unset($_SESSION['sessionIP']);
print "<script type=\"text/javascript\" language=\"JavaScript\">
window.location=\"index.php\";
</script>";
?>