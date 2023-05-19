<?php
require "./connectionbrand.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
$id = $_SESSION["id"];
$email=$_SESSION["email"];
$hashed_password = $p->getHashedPassword($email);
if(isset($_POST["update"])){
  $password = $_POST["password"];
  $photo = $_POST["photo"];
  // Update the brand's data in the database
  if(password_verify($password, $hashed_password)){ // compare the hashed password with user input
    $p->updateUserphoto($id, $photo);
    $login_err="";
    session_start(); 
   $_SESSION["photo"] = $photo;
    header("location: mesinfos.php");
} else{
$login_err = " verify the password you entered";
header("location: profilemodify.php?login_err=" . urlencode($login_err));
}
}
?>