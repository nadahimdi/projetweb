<?php
/**
 * Creates a new instance of the CRUD class with the specified parameters.
 * @param string $databaseName The name of the database to connect to.
 * @param string $serverName The name of the server to connect to.
 * @param string $username The username to use for the connection.
 * @param string $password The password to use for the connection.
 */
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");

/**
 * Starts a new session and retrieves the user ID and email from the session.
 * Then, retrieves the hashed password for the user's email using the getHashedPassword method of the $p object.
 */
session_start();
$id = $_SESSION["id"];
$email=$_SESSION["email"];
$hashed_password = $p->getHashedPassword($email);


if(isset($_POST["reset"])){
  $password = $_POST["password"];
  $password1 = $_POST["password1"];
  $password2 = $_POST["password2"];
  $hashed_password1 = password_hash($password1, PASSWORD_DEFAULT);
  // Update the brand's data in the database
  /**
   * Verifies if the given password matches the hashed password and updates the user's password in the database.
   */
  if(password_verify($password, $hashed_password)){ // compare the hashed password with user input
    $p->updateUserpassword($id, $hashed_password1);
    $login_err="";
    session_start(); 
   $_SESSION["password"] = $password1;
    header("location: mesinfos.php");
} else{
$login_err = " verify the password you entered";
header("location: resetpassword.php?login_err=" . urlencode($login_err));
}
}
?>