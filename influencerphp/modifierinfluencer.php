<?php
/**
 * Establishes a connection to the database and retrieves the hashed password for the given email.
 * @param string $dbName The name of the database to connect to.
 * @param string $dbHost The host of the database to connect to.
 * @param string $dbUser The username to use when connecting to the database.
 * @param string $dbPassword The password to use when connecting to the database.
 * @param string $email The email address to retrieve the hashed password for.
 * @return string The hashed password for the given email.
 */
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
$id = $_SESSION["id"];
$email=$_SESSION["email"];
$oldusername=$_SESSION["username"];
$hashed_password = $p->getHashedPassword($email);


/**
 * Updates user information based on the POST request data.
 */
if(isset($_POST["update"])){
  $password = $_POST["password"];
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $age = $_POST["age"];
  $facebook = $_POST["facebook"];
  $instagram = $_POST["instagram"];
  $twitter = $_POST["twitter"];
  $username = $_POST["username"];
  $email = $_POST["email"]; 
 
  if(password_verify($password, $hashed_password)){ // compare the hashed password with user input
    /**
     * Updates the user data for the given user ID with the provided information.
     * Also updates the username in the corresponding tables.
     */
    $p->updateUserData($id, $username,$nom,$prenom,$age,$instagram,$twitter,$facebook, $email);
    $p->updateenvoyer($username,$oldusername);
    $p->updaterecevoir($username,$oldusername);
    $p->updatepremier($username,$oldusername);
    $p->updatedeuscieme($username,$oldusername);
   
    $login_err="";
    session_start(); 
    /**
     * Starts a new session and sets session variables for the user's information.
     * Redirects the user to the mesinfos.php page if the password is correct.
     * Otherwise, sets an error message and redirects the user to the influencermodify.php page.
     */
   $_SESSION["username"] = $username;
   $_SESSION["nom"] = $nom;
   $_SESSION["prenom"] = $prenom;
   $_SESSION["facebook"] = $facebook;
   $_SESSION["instagram"] = $instagram;
   $_SESSION["twitter"] = $twitter;
   $_SESSION["email"] = $email;
   $_SESSION["age"] = $age;
    header("location: mesinfos.php");
} else{
$login_err = " verify the password you entered";
header("location: influencermodify.php?login_err=" . urlencode($login_err));
}
}
?>