<?php 
require "./connectioninfluencer.php";
// Initialize the session
session_start();
if(!isset($_SESSION["id"])){
    header("location: loginbrand.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 
// Update the $_SESSION variables with the new user data

$user = $_SESSION["username"];
$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$instagram = $_SESSION["instagram"];
$facebook = $_SESSION["facebook"];
$twitter = $_SESSION["twitter"];
$photo = $_SESSION["photo"];
$user_id = $_SESSION["id"];
$email= $_SESSION["email"];
$age=$_SESSION["age"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>profil</title>
    <link rel="stylesheet" href="influencercss/mesinfos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&family=Open+Sans:wght@400;700;800&family=Press+Start+2P&family=Work+Sans:wght@200;300;400;600&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Courgette&family=Handlee&family=Merriweather+Sans:wght@600&family=Nunito&family=Playfair+Display&family=Rubik:ital,wght@0,500;1,300;1,800&family=Titan+One&family=Work+Sans:wght@200;300;600&display=swap" rel="stylesheet">
  </head>

  <body>
   
  <input type="checkbox" placeholder="checkbox" id="sidebar-toggle" />
    <!-- La barre latérale sidebar -->
    <div class="sidebar">
       <!-- L'en-tête de la barre latérale sidebar-header -->
      <div class="sidebar-header">
        <h3 class="brand">
           <!-- L'image de l'influenceur -->
         <span> <?= '<img style="width:3em;height:3em;border-radius: 50%; margin:0 10px; " src="influencerimg/'.$photo.'">';?>
          <!-- Le nom de l'utilisateur -->
          <span>  <?= $user;?></span></span>
        </h3>
           <!-- L'étiquette pour basculer la barre latérale -->
        <label for="sidebar-toggle" style="cursor: pointer">
         <!-- L'étiquette pour basculer la barre latérale -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            fill="currentColor"
            class="bi bi-list"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
            />
          </svg>
        </label>
      </div>

      

      <!--sidebar-menu-->
      <div class="sidebar-menu">
        <ul>
           <!-- Les liens du menu -->
        <li><a href="./tabledebordinfluencer.php"><img src="influencerimg/home.jpg" alt="" />&nbsp;<span  style="color:aliceblue;">Home</a></span></li>
          <li><a href="mesinfos.php"><img src="influencerimg/profil.png" alt="" />&nbsp;<span style="color:aliceblue;">Mon profile</a></span></li>
          <li><a href="Tocollabwith.php"><img src="influencerimg/brand.png" alt="" />&nbsp;<span  style="color:aliceblue;">To Collab with</a></span></li>
          <li><a href="tabledebordinfluencer.php"><img src="influencerimg/marks.png" alt="" />&nbsp;<span  style="color:aliceblue;">table de bord</a></span></li>
          <li><a href="resetpassword.php"><img src="influencerimg/pass.png" alt="" />&nbsp;<span  style="color:aliceblue;">resset password</a></span></li>
          <li ><a href="logout.php"><img  class="radios"src="influencerimg/logout.jpeg" alt="" />&nbsp;<span style="color:aliceblue;">log-out</a></span></li>
      
        </ul>
      </div>
    </div>

    <!--main-content-->
    <div class="main-content">
      <!--header-->
      <header>
        <div class="search-wrapper">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
            </span>
            <input type="text" name="search" placeholder="Search" />
        </div>
        <!-- la photo de l'utilisateur -->
        <div class="social-icons">
        <span> <?= '<img style="width:4em;height:4em;border-radius: 50%; margin:0 10px; " src="influencerimg/'.$photo.'">';?>
        </div>
      </header>


      <!-- Le contenu principal  -->

      <main>
        <h2 class="dash-title">Welcome to your profile </h2>
        <div class="hello">
          <div class="card-body1">
              <div class="welcome">
                   <!-- Le titre de bienvenue -->
                  <h1>Profil of <?= $user;?> !</h1>
                  <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum neque in consequatur delectus ducimus est sint tempora possimus ad eaque aperiam fugiat consectetur, veritatis dicta, officia corrupti numquam. Et, nesciunt?</h5>
              </div>
              <span class="card1">
                <img src="influencerimg/crafting fun.png" alt="">
             </span>
          </div>
       </div>




       <main>
          <div class="content-2">
        <div class="web">
         <br>
                 <h1 class=""> Your Profile <?=  $nom  ; ?>  <?= $prenom  ; ?></h1>
                <div class="profile-page ">
                     <!-- La photo et le nom/prénom -->
                    <div class="overview ">
                        <div class="photo-et-nom ">

                      <div> <span> <?= '<img style="width:11em;height:11em;border-radius: 50%;  margin-left:30px ;  " src="influencerimg/'.$photo.'">';?></div>
                      <br><br>
                      <div class="card-footer2">
                      <a href="supprimerinf.php"  id="deleteLink">Remove Contact</a>
                      </div>
                        </div>
                       
                       <!-- Les informations textuelles -->

                      <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">Username</h4>
                                <div class="text ">
                                    <span class=""><?= $user; ?></span>    
                             </div>
                           </div>
                            <div class="box  ">
                                <h4 class=" "> Age</h4>
                                <div class="text ">
                                    <span class=""><?= $age; ?></span>   
                                </div>
                            </div>   
                        </div>
                        
                        <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">Email</h4>
                                <div class="text ">
                                       <span class=""><?= $email ?></span>
                                </div>  
                             </div>  
                             <div class="box  ">
                             <h4 class=" ">Facebook</h4>
                                <div class="text ">
                                       <span class=""><?= $facebook; ?></span>
                                </div>  
                             </div>  
                         </div>  
                         <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">Twitter</h4>
                                <div class="text ">
                                       <span class=""><?= $twitter; ?></span>
                                </div>  
                             </div>  
                             <div class="box  ">
                             <h4 class=" ">Instagram</h4>
                                <div class="text ">
                                       <span class=""><?= $instagram; ?></span>
                                </div>  
                             </div>  
                         </div>            
        
      </div>
      </div>  
      </div> 
    </div>
    <div class="title">
            <h2 class="rec">Modifications & Collaborations</h2>
          </div>
           <!--les mini cards -->
           <div class="dash-cards">
         
            <div class="card-single">

                <div class="card-body">
                   
                    <div>
                        <h5>Modifications </h5>
                    </div>

                    <span class="card2">
                      <img style=" width: 190px; height:180px; margin-top:130px;" src="influencerimg/Creative 3D Icons Vector for Free Download.png" alt="">
                    </span>

                </div>
                <div class="card-footer">
                    <a href="influencermodify.php">Modify infos</a>
                </div>
                <div class="card-footer">
                    <a href="profilemodify.php">Modify profil</a>
                </div>
            </div>
            
            
            <div class="card-single">
                <div class="card-body">
                   
                    <div>
                        <h5>Collaborations</h5>
                    </div>

                    <span class="card2">
                      <img src="influencerimg/Do we hold hands or something_ 🥰– 3D Illustration.jpeg" style=" width: 200px; height:190px; margin-top:130px;" alt="">
                   </span>
                </div>
                <!-- button de class card-footer -->
    <div class="card-footer">
    <a href="mycollabsinf.php" id="deleteLink" >Check Collabs</a>
</div>
</div>
        </div>

      </main>
    </div>
    </div>

  </body>
</html>