<?php
/**
 * Inserts data into the 'inflbrand' table using the provided CRUD object.
 * @param string $username
 * @param string $nom
 * @param string $prenom
 * @param int $age
 * @param string $instagram
 * @param string $facebook
 * @param string $twitter
 * @param string $email
 * @param string $hashed_password
 * @param string $photo

 */
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
if(isset($_POST["submition"])){
$username=$_POST["username"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$age=$_POST["age"];
$instagram=$_POST["instagram"];
$facebook=$_POST["facebook"];
$twitter=$_POST["twitter"];
$email=$_POST["email"];
$photo=$_POST["photo"];
$password=$_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT); // hash the password using a secure algorithm
$p->insertData($username,$nom,$prenom,$age,$instagram,$facebook,$twitter,$email,$hashed_password,$photo);
header("location: influencer.php");
}

?>