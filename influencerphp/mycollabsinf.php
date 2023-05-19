<?php 
/**
 * This script checks if the user is logged in and redirects to the login page if not.
 * @require connectioninfluencer.php
 * @param string $dbName - The name of the database to connect to.
 * @param string $host - The host name or IP address of the MySQL server.
 * @param string $username - The MySQL user name.
 * @param string $password - The password for the MySQL user.
 */
require "./connectioninfluencer.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
if(!isset($_SESSION["id"])){
    header("location: logininfluencer.php");
    exit();
}
/**
 * Retrieves the username, photo, and user ID from the session and gets the collaborations of the current user.
 * @return array The collaborations of the current user.
 */
$user = $_SESSION["username"];
$photo = $_SESSION["photo"];
$user_id = $_SESSION["id"];
$collabs = $p->getcollabs();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- La compatibilité de la page avec Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       <!-- La configuration de l'affichage sur les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Collabs</title>
      <!-- Linking external CSS file -->

    <link rel="stylesheet" href="influencercss/menucollabs.css" />
        <!-- Loading Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&family=Open+Sans:wght@400;700;800&family=Press+Start+2P&family=Work+Sans:wght@200;300;400;600&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Courgette&family=Handlee&family=Merriweather+Sans:wght@600&family=Nunito&family=Playfair+Display&family=Rubik:ital,wght@0,500;1,300;1,800&family=Titan+One&family=Work+Sans:wght@200;300;600&display=swap" rel="stylesheet">
  </head>
  <body>
   <!-- La balise pour ouvrir ou non  la barre latérale -->
  <input type="checkbox" placeholder="checkbox" id="sidebar-toggle" />
    <!--side bar-->
    <div class="sidebar">
      <!--sidebar-header-->
      <div class="sidebar-header">
        <h3 class="brand">
              <!-- Le logo de l'utilisateur, avec son chemin d'accès -->
         <span> <?= '<img style="width:3em;height:3em;border-radius: 50%; margin:0 10px; " src="influencerimg/'.$photo.'">';?>
          <!-- Le nom de l'utilisateur, récupéré à partir de PHP -->
          <span> <?php echo $user; ?></span></span>
        </h3>
          <!-- Le bouton pour activer/désactiver la barre latérale -->
        <label for="sidebar-toggle" style="cursor: pointer">
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
        <!-- Le menu de navigation -->
        <ul>
        <li><a href="./tabledebordinfluencer.php"><img src="influencerimg/home.jpg" alt="" />&nbsp;<span  style="color:aliceblue;">Home</a></span></li>
          <li><a href="mesinfos.php"><img src="influencerimg/profil.png" alt="" />&nbsp;<span style="color:aliceblue;">Mon profile</a></span></li>
          <li><a href="Tocollabwith.php"><img src="influencerimg/brand.png" alt="" />&nbsp;<span  style="color:aliceblue;">To Collab with</a></span></li>
          <li><a href="tabledebordinfluencer.php"><img src="influencerimg/marks.png" alt="" />&nbsp;<span  style="color:aliceblue;">table de bord</a></span></li>
          <li><a href="resetpassword.php"><img src="influencerimg/pass.png" alt="" />&nbsp;<span  style="color:aliceblue;">resset password</a></span></li>
          <li ><a href="logout.php"><img  class="radios"src="influencerimg/logout.jpeg" alt="" />&nbsp;<span style="color:aliceblue;">log-out</a></span></li>
      
        </ul>
      </div>
    </div>


    <div class="main-content">
      <!--header-->
      <header>
        <div class="search-wrapper">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                  <!-- Le texte pour la page d'accueil -->
            </span>
            <input type="text" name="search" placeholder="Search" />
        </div>

        <div class="social-icons">
          
        <span> <?= '<img style="width:4em;height:4em;border-radius: 50%; margin:0 10px; " src="influencerimg/'.$photo.'">';?>
        </div>
      </header>




      <!-- Main section of the page -->

      <main>
        <h2 class="dash-title">scroll to see all the collabs in our page </h2>
          <!-- Heading with a class of "dash-title" -->
        <div class="hello">
            <!-- Container div with a class of "hello" -->
          <div class="card-body1">
             <!-- Container div with a class of "card-body1" -->
              <div class="welcome">
                  <!-- Container div with a class of "welcome" -->
                  <h1>Hello  <?= $user;?> !</h1>
                    <!-- Heading with a dynamic content variable "$user" -->
                  <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum neque in consequatur delectus ducimus est sint tempora possimus ad eaque aperiam fugiat consectetur, veritatis dicta, officia corrupti numquam. Et, nesciunt?</h5>
                    <!-- Paragraph with a static text -->
              </div>
              <span class="card1">
                <img src="./influencerimg/3D young people discussing the project Illustration.png" alt="">
             </span>
          </div>
       </div>
       
       <h1 class=""> Ongoing Collabs </h1>
        <!-- Heading for ongoing collaborations -->
      
        <!-- * Loop through the array of collaborators and check if their status is "oui".
        * If the status is "oui", check if the current user is either the first or second collaborator.
        * @param array $collabs An array of collaborators
       -->
       <?php foreach($collabs as $collab): ?>
        <?php if($collab['status'] === "oui"): ?>
        <?php if($collab['premier'] === $user || $collab['deuscieme'] === $user): ?>
          <div class="content-2">
        <div class="web">
         <br>
              
                <div class="profile-page ">
                    <!-- photo et nom prenom -->

                    <div class="overview ">
                        <div class="photo-et-nom ">
                        <div> <span>  <img style="width:11em;height:11em;border-radius: 50%;  margin-left:50px ;  " src="influencerimg/User10017038 _  Freepik.jpeg"></div>
                         <!-- Dynamic image tag with a style attribute and a source pointing to a dynamic path -->
                        </div>

                 <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">Between</h4>
                                <div class="text ">
                                    <span class=""> <?php echo $collab['deuscieme']; ?> && <?php echo $collab['premier']; ?></span>    
                             </div>
                           </div>
                           </div>
                        <div class="info-text">
                            <div class="box  ">
                                <h4 class=" ">depart/Fin</h4>
                                <div class="text ">
                                    <span class=""><?php echo $collab['date_depart']; ?>/<?php echo $collab['date_final']; ?></span>   
                                </div>
                            </div>   
                        </div>
                        <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">montant</h4>
                                <div class="text ">
                                       <span class=""><?php echo $collab['montant']; ?></span>
                                </div>  
                             </div>  
                         </div>            
        </div>
      </div>
      </div>  
      </div> 
      <!--
       * Renders a list of inbound collabs for a given user.
       *
       * @param array $collabs An array of collabs to be displayed.
       * @param string $user The user for whom the collabs are being displayed.
       * @return string The HTML markup for the list of inbound collabs.
       */-->
      <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>
    <h1 class="">Inbound Collabs </h1>
       <?php foreach($collabs as $collab): ?>
        <?php if($collab['status'] === "non"): ?>
        <?php if($collab['deuscieme'] === $user): ?>
          <div class="content-2">
        <div class="web">
         <br>
                

                <div class="profile-page ">
                    <!-- photo et nom prenom -->

                      <div class="overview ">
                        <div class="photo-et-nom ">
                        <div> <span> <?= '<img style="width:10em;height:10em;border-radius: 50%;  margin-left:50px ;  " src="influencerimg/'.$photo.'">';?></div>
                      <br>
                        </div>

                 <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">From</h4>
                                <div class="text ">
                                    <span class=""> <?php echo $collab['premier']; ?> </span>    
                             </div>
                             </div>
                             </div>
                        <div class="info-text">
                            <div class="box  ">
                                <h4 class=" ">depart/Fin</h4>
                                <div class="text ">
                                    <span class=""><?php echo $collab['date_depart']; ?>/<?php echo $collab['date_final']; ?></span>   
                                </div>
                            </div>   
                        </div>
                        <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">montant</h4>
                                <div class="text ">
                                       <span class=""><?php echo $collab['montant']; ?></span>
                                </div>  
                             </div>  
              
                         </div>   
      
                      </div>
        <div class="card-footer">
                      <a href="treatcollabsaccept.php?contrat=<?php echo $collab['contrat']; ?>"  id="deleteLink">Accept</a>
            

         </div>
<div class="card-footer">
                      <a href="treatcollabsrefuse.php?contrat=<?php echo $collab['contrat']; ?>"   id="deleteLink">Refuse</a>

</div>
           
      </div>
      </div>  
      </div> 
      <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>
    <h1 class="">Outbound Collabs </h1>
       <?php foreach($collabs as $collab): ?>
        <?php if($collab['status'] === "non"): ?>
        <?php if($collab['premier'] === $user): ?>
          <div class="content-2">
        <div class="web">
         <br>
                

                <div class="profile-page ">


                    <!-- photo et nom prenom -->

                    <div class="overview ">
                        <div class="photo-et-nom ">
                        <div> <span> <?= '<img style="width:10em;height:10em;border-radius: 50%;  margin-left:50px ;  " src="influencerimg/'.$photo.'">';?></div>
                      <br>
                        </div>

                 <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">For</h4>
                                <div class="text ">
                                    <span class=""> <?php echo $collab['deuscieme']; ?> </span>    
                             </div>
                           </div>
                           </div>
                        <div class="info-text">
                            <div class="box  ">
                                <h4 class=" ">depart/Fin</h4>
                                <div class="text ">
                                    <span class=""><?php echo $collab['date_depart']; ?>/<?php echo $collab['date_final']; ?></span>   
                                </div>
                            </div>   
                        </div>
                        <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">montant</h4>
                                <div class="text ">
                                       <span class=""><?php echo $collab['montant']; ?></span>
                                </div>  
                             </div>  
              
                         </div>   
      
        </div>

      </div>
      </div>  
      </div> 
      <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>
      </main>
    </div>
  </body>
</html>