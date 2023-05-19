
 <!--/**
 * Ends the current session and redirects the user to the main page.
 */-->
<?php
session_start();
session_destroy();
header("location: ../pageprinc.php");
exit();
?>