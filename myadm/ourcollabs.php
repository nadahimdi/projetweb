<?php 
require "./connectionadmin.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
if(!isset($_SESSION["id"])){
    header("location: loginbrand.php");
    exit();
}
$user = $_SESSION["username"];
$user_id = $_SESSION["id"];
$collabs = $p->getcollabs();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>table de bord</title>
    <link rel="stylesheet" href="mesinfos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&family=Open+Sans:wght@400;700;800&family=Press+Start+2P&family=Work+Sans:wght@200;300;400;600&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Courgette&family=Handlee&family=Merriweather+Sans:wght@600&family=Nunito&family=Playfair+Display&family=Rubik:ital,wght@0,500;1,300;1,800&family=Titan+One&family=Work+Sans:wght@200;300;600&display=swap" rel="stylesheet">
  </head>
  <body>
  <input type="checkbox" placeholder="checkbox" id="sidebar-toggle" />
    <!--side bar-->
    <div class="sidebar">
      <!--sidebar-header-->
      <div class="sidebar-header">
        <h3>
      ADMIN
        </h3>
        
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
        <ul>
        <li><a href="dashboard.php"><img src="./img/marks.png" alt="" />&nbsp;<span  style="color:aliceblue;">table de bord</a></span></li>
          <li><a href="ourbrands.php"><img src="./img/brand.png" alt="" />&nbsp;<span  style="color:aliceblue;">Our brands</a></span></li>
          <li><a href="ourcollabs.php"><img src="./img/collab.jpg" alt="" />&nbsp;<span  style="color:aliceblue;">Our collabs</a></span></li>
          <li><a href="ourinfluencers.php"><img src="./img/profil.png" alt="" />&nbsp;<span  style="color:aliceblue;">Our influencers</a></span></li>
          <li><a href="resetpasswd.php"><img src="./img/pass.png" alt="" />&nbsp;<span  style="color:aliceblue;">resset password</a></span></li>
          <li ><a href="logout.php"><img  class="radios"src="./img/logout.jpeg" alt="" />&nbsp;<span style="color:aliceblue;">log-out</a></span></li>
      
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

        
      </header>




      <!--main-->

      <main>
        <h2 class="dash-title">scroll to see all the collabs in our page </h2>
        <div class="hello">
          <div class="card-body1">
              <div class="welcome">
                  <h1>Welcome To Collaborations !</h1>
                  <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum neque in consequatur delectus ducimus est sint tempora possimus ad eaque aperiam fugiat consectetur, veritatis dicta, officia corrupti numquam. Et, nesciunt?</h5>

              </div>
              <span class="card1">
                <img  style="height:400px;" src="./img/3D group of young people discussing something while working Illustration (1).png" alt="">
             </span>
          </div>
       </div>




       <main>
       <?php foreach($collabs as $collab): ?>
        <?php if($collab['status'] === "oui"): ?>
          <div class="content-2">
        <div class="web">
         <br>
                 <h1 class=""> <?php echo $collab['contrat']; ?> Collaboration  </h1>

                <div class="profile-page ">


                    <!-- photo et nom prenom -->

                    <div class="overview ">
                        <div class="photo-et-nom ">
                      <div><img style=" width:12rem; height:12rem; margin-left:20px; "  src="./img/Pitch _ Product design case study.png" alt=""></div>
                        </div>

                         <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">between</h4>
                                <div class="text ">
                                    <span class=""><?php echo $collab['premier']; ?> et  <?php echo $collab['deuscieme']; ?></span>    
                             </div>
                           </div>
                           </div>
                        <div class="info-text">
                            <div class="box  ">
                                <h4 class=" ">date depart</h4>
                                <div class="text ">
                                    <span class=""><?php echo $collab['date_depart']; ?></span>   
                                </div>
                            </div>   
                        </div>
                        <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">date final</h4>
                                <div class="text ">
                                       <span class=""><?php echo $collab['date_final']; ?></span>
                                </div>  
                             </div>  
                         </div>            
        </div>
      </div>
      </div>  
      </div> 
      <?php endif; ?>

    <?php endforeach; ?>
      </main>
    </div>
  </body>
</html>