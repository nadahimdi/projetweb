<?php 
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
// Initialize the session
session_start();
if(!isset($_SESSION["id"])){
    header("location: logininfluencers.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 

/**
 * This code receives data from a form submission and inserts it into a database table using the insertparetenariat method of an object named $p.
 */
$brand_user=$_GET['username'];
$inf_username=$_GET['brandusername'];
if(isset($_POST['submit'])){
    $contratname=$_POST['contratname'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $montant=$_POST['montant'];
    $status="non";
    $stmt=$p->insertparetenariat ($inf_username,$brand_user, $contratname, $status, $from_date, $to_date, $montant);
        header('location: mycollabsinf.php');
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width =device-width, initial-scale=1.e">
         <title> Collaborations </title>
         <link rel="stylesheet" href="influencercss/signupinfluencer.css">
         <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="text-sci">
                     <!-- Balise div pour le logo -->
                   <div class="logo"> 
                    <h2 > COLLABNATION</h2></div>
                    <br><br><br>
                 <span> ..... WELCOME!</span><br><br><br>
                    <br><br><br>
                    <br><br><br>
                    <p></p>
                     <!-- Balise div pour les icônes sociales -->
                    <div class="social-icons">
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-tiktok"></i>
                    </div>
                </div>
            </div>
            <div class="lorgreg-box"></div>
            <div class="form-box">
                <form action="" method="post">
                <h1 id="title"> Collab </h1>
                <br><br><br>
                    <div class="input-group">
                         <!-- Balise div pour le champ "contratname" -->
                        <div class="input-field" id="username" >
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="contratname" placeholder="enter your contrat name" value="">
                        </div> 
                              <!-- Balise div pour le champ "from_date" -->
                        <div class="input-field" id="CA">
                            <i class="fa-solid fa-user"></i>
                            <input type="date" name="from_date" placeholder="enter start date" value="">
                        </div> 
                         <!-- Balise div pour le champ "to_date" -->
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="date" name="to_date" placeholder="enter end date" value="">
                      </div>
                         <!-- Balise div pour le champ "montant" -->
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="int" name="montant" placeholder="enter montant" value="">
                        </div> 
                    </div>    
                   <!-- 
                     * If the login error message is not empty, display it as a danger alert.
                     */-->
                    <?php 
        if(!empty($login_err)  ){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
            $login_err="";
        }        
        ?>
             <div class="btn-field1">
                  <!-- Balise div pour le bouton "Done" -->
                    <div class="btn-field">
                        <button type="submit" id="submit" name="submit"> Done </button>
                    </div></div>
                </form>
            </div>
        </div>
        
    </body>
 


</html>

