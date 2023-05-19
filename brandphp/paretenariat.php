<?php 
require "./connectionbrand.php";
$p=new crud("inflbrand","localhost:3308","root","");
// Initialize the session
session_start();
if(!isset($_SESSION["id"])){
    header("location: loginbrand.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 

$inf_username=$_GET['username'];
$brand_username=$_GET['brandusername'];
if(isset($_POST['submit'])){
    $contratname=$_POST['contratname'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $montant=$_POST['montant'];
    $status="non";
    $stmt=$p->insertparetenariat ($brand_username,$inf_username, $contratname, $status, $from_date, $to_date, $montant);
        header('location: mesinfos.php');
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width =device-width, initial-scale=1.e">
         <title> Sign In and Sign Up Form - Easy Turtorials </title>
         <link rel="stylesheet" href="brandcss/signupbrand.css">
         <script src="https://kit.fontawesome.com/986277bb10.js" crossorigin="anonymous"></script>
    </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="text-sci">
                   <div class="logo"> 
                    <h2 > COLLABNATION</h2></div>
                    <br><br><br>
                 <span> ..... WELCOME!</span><br><br><br>
                    <br><br><br>
                    <br><br><br>
                    <p></p>
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
                        <div class="input-field" id="username" >
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="contratname" placeholder="enter your contrat name" value="">
                        </div> 
                        <div class="input-field" id="CA">
                            <i class="fa-solid fa-user"></i>
                            <input type="date" name="from_date" placeholder="enter start date" value="">
                        </div> 
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="date" name="to_date" placeholder="enter end date" value="">
                      </div>
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="int" name="montant" placeholder="enter montant" value="">
                        </div> 
                    </div>    
                    <?php 
        if(!empty($login_err)  ){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
            $login_err="";
        }        
        ?>
             <div class="btn-field1">
                    <div class="btn-field">
                        <button type="submit" id="submit" name="submit"> Done </button>
                    </div></div>
                </form>
            </div>
        </div>
        
    </body>
 


</html>

