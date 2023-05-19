<?php 
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
// Initialize the session
session_start();
if(!isset($_SESSION["id"])){
    header("location: logininfluencer.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 
$contrat=$_GET['contrat'];
$status="oui";
$p->updatecollab ($contrat,$status);
header('location: mycollabsinf.php');