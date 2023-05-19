<?php 
require "./connectionadmin.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
if(!isset($_SESSION["id"])){
    header("location: login.php");
    exit();
// Check if the user is logged in, if not then redirect him to login page
} 
$influencers = $p->getInfluencers();
$user = $_SESSION["username"];
$photo = $_SESSION["photo"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dylut2000</title>
    <link rel="stylesheet" href="mesinfos.css" />
  </head>
  <body>
  <main>

  <input type="checkbox" placeholder="checkbox" id="sidebar-toggle" />
    <!--side bar-->
    <div class="sidebar">
      <!--sidebar-header-->
      <div class="sidebar-header">
        <h3 class="brand">
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
        <ul>
        <li><a href="dashboard.php"><img src="./img/marks.png" alt="" />&nbsp;<span  style="color:aliceblue;">table de bord</a></span></li>
          <li><a href="ourbrands.php"><img src="./img/brand.png" alt="" />&nbsp;<span  style="color:aliceblue;">Our brands</a></span></li>
          <li><a href="ourcollabs.php"><img src="./img/collab.jpg" alt="" />&nbsp;<span  style="color:aliceblue;">Our collabs</a></span></li>
          <li><a href="ourinfluencers.php"><img src="./img/profil.png" alt="" />&nbsp;<span  style="color:aliceblue;">Our influencers</a></span></li>
          <li><a href="resetpasswd.php"><img src="./img/pass.png" alt="" />&nbsp;<span  style="color:aliceblue;">resset password</a></span></li>
          <li ><a href="logout.php"><img  class="radios"src="./img/logout.jpeg" alt="" />&nbsp;<span style="color:aliceblue;">log-out</a></span></li>
      
        </ul>
        </ul>
      </div>
    </div>
    <div class="main-content">
    <h2 class="dash-title">Scroll to see the influencers</h2>
        <div class="hello">
          <div class="card-body1">
              <div class="welcome">
                  <h1>Welcome To Influncers</h1>
                  <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum neque in consequatur delectus ducimus est sint tempora possimus ad eaque aperiam fugiat consectetur, veritatis dicta, officia corrupti numquam. Et, nesciunt?</h5>

              </div>
              <span class="card1">
                <img class="imglogo" src="./img/Instagram - Fun 3D UI Illustration.jpeg" alt="">
             </span>
          </div>
       </div>
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
    <main>
            <?php foreach($influencers as $influencer): ?>
          <div class="content-2">
        <div class="web">
         <br>
                 <h1 class="">The influencer <?php echo $influencer['nom']  ; ?>  <?php echo $influencer['prenom']  ; ?></h1>

                <div class="profile-page ">


                    <!-- photo et nom prenom -->

                    <div class="overview ">
                        <div class="photo-et-nom ">
                      <div> <span> <?= '<img style="width:11em;height:11em;border-radius: 50%; margin-left:30px;: " src="../influencerphp/influencerimg/'.$influencer['photo'].'">';?></div>
                      <br><br> <br><br>
                      <br><br> 
  
                        </div>
            
                 <div class="info-text ">
                            <div class="box  ">
                                <h4 class=" ">Username</h4>
                                <div class="text ">
                                    <span class=""><?php echo $influencer['username']; ?></span>    
                             </div>
                           </div>
                            <div class="box  ">
                                <h4 class=" "> Age</h4>
                                <div class="text ">
                                    <span class=""><?php echo $influencer['age']; ?></span>   
                                </div>
                            </div>   
                        </div>
                        <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">Email</h4>
                                <div class="text ">
                                       <span class=""><?php echo $influencer['email']; ?></span>
                                </div>  
                             </div>  
                             <div class="box  ">
                             <h4 class=" ">Facebook</h4>
                                <div class="text ">
                                       <span class=""><?php echo $influencer['facebook']; ?></span>
                                </div>  
                             </div>  
                         </div>  
                         <div class="info-text">
                            <div class="box  ">
                             <h4 class=" ">Twitter</h4>
                                <div class="text ">
                                       <span class=""><?php echo $influencer['twitter']; ?></span>
                                </div>  
                             </div>  
                             <div class="box  ">
                             <h4 class=" ">Instagram</h4>
                                <div class="text ">
                                       <span class=""><?php echo $influencer['instagram']; ?></span>
                                </div>  
                             </div>  
                         </div>            
        </div>
      </div>
      </div>  
      </div> 
    <?php endforeach; ?>
  </tbody>
  </div>
</table>
  </body>
