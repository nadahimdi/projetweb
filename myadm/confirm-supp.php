<?php
require_once "configuration.php";  // include the configuration file
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin-admin"]) || $_SESSION["loggedin-admin"] !== true){
    header("location: login.php");
    exit;
}


$idpartenariat=$_GET['collaborationid'];   // Get the value of 'collaborationid' parameter from the URL
$username=$_GET['username'];   // Get the value of 'username' parameter from the URL
$sql="UPDATE `demender` SET status='done' WHERE id=$idpartenariat AND username='$username'";
$result=mysqli_query($mysqli,$sql);     // Execute the query
if($result){
    // echo "data updated successfully";
    header('location:dashboard.php');          // Redirect to the 'dashboard.php' page
} else {
    die(mysqli_error($mysqli));    // Terminate the script and display the MySQL error message if there's an error
}
?>
