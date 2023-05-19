<?php 
require "./connectionadmin.php";
$p=new crud("inflbrand","localhost:3308","root","");
// Initialize the session
session_start();
if(!isset($_SESSION["id"])){
    header("location: loginadmin.php");
    exit();
} 

$username = $_GET['username'];
$type = $_GET['type'];

if ($type === 'brand') {
    $p->deletebrand($username);
    $p->delete($username);
} else if ($type === 'influencer') {
    $p->deleteinfluencer($username);
    $p->delete($username);
}

header('location: dashboard.php');
