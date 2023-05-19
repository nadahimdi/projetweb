
<?php
/**
 * Inserts supplementary data for the current user into the 'inflbrand' table.
 * Redirects to 'mesinfos.php' page after successful insertion.
 * @param string $username
 * @param string $influencerORbrand
 */
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
$id = $_SESSION["id"];
$username=$_SESSION["username"];
$influencerORbrand="influencer";
    $p->insertsuppdata($username, $influencerORbrand);
    header("location: mesinfos.php");
?>
