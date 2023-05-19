<?php 
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
// Initialize the session
session_start();
if(!isset($_SESSION["id"])){
    header("location: loginbrand.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 
$contrat=$_GET['contrat'];
$p->deletecollab ($contrat);
header('location: mycollabsinf.php');