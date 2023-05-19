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
session_start();
/**
 * Starts a new session and retrieves the user ID and email from the session.
 * Then, retrieves the hashed password for the user's email using the getHashedPassword method of the $p object.
 */
$id = $_SESSION["id"];
$email=$_SESSION["email"];
$hashed_password = $p->getHashedPassword($email);


/**
 * Checks if the "update" key is set in the $_POST array and updates the password and photo variables accordingly.
 */
if(isset($_POST["update"])){
  $password = $_POST["password"];
  $photo = $_POST["photo"];
  // Update the brand's data in the database
  if(password_verify($password, $hashed_password)){ // compare the hashed password with user input
    /**
     * Updates the user photo with the given photo for the user with the given ID.
     * Sets the session variable "photo" to the new photo.
     * Redirects the user to the "mesinfos.php" page.
     */
    $p->updateUserphoto($id, $photo);
    $login_err="";
    session_start(); 
   $_SESSION["photo"] = $photo;
    header("location: mesinfos.php");
/**
 * If the password entered by the user is incorrect, redirect the user to the profilemodify page with an error message.
 */
} else{
$login_err = " verify the password you entered";
header("location: profilemodify.php?login_err=" . urlencode($login_err));
}
}
?>