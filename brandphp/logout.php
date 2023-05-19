<?php
session_start();
session_destroy();
header("location: ../pageprinc.php");
exit();
?>
