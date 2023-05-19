<?php
require "./connectionbrand.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
$id = $_SESSION["id"];
$username=$_SESSION["username"];
$influencerORbrand="brand";
    $p->insertsuppdata($username, $influencerORbrand);
    header("location: mesinfos.php");
?>
