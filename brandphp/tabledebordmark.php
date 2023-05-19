<?php 
require "./connectionbrand.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
if(!isset($_SESSION["id"])){
    header("location: loginbrand.php");
    exit();
}
$user = $_SESSION["username"];
$photo = $_SESSION["photo"];
$user_id = $_SESSION["id"];
$numberinf = $p->getbrands();
$numbercollabs=$p->getnumberofcollabs();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>table de bord</title>
    <link rel="stylesheet" href="brandcss/styletabledebordmark.css" />
  </head>
  <body>
    <input type="checkbox" placeholder="checkbox" id="sidebar-toggle" />
    <!--side bar-->
    <div class="sidebar">
      <!--sidebar-header-->
      <div class="sidebar-header">
        <h3 class="brand">
         <span> <?= '<img style="width:3em;height:3em;border-radius: 50%; margin:0 10px; " src="brandimg/'.$photo.'">';?>
          <span> <?php echo $user; ?></span></span>
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
          <li><a href="tabledebordmark.php"><img src="brandimg/home.jpg" alt="" />&nbsp;<span  style="color:aliceblue;">Home</a></span></li>
          <li><a href="mesinfos.php"><img src="brandimg/profil.png" alt="" />&nbsp;<span style="color:aliceblue;">Mon profile</a></span></li>
          <li><a href="Tocollabwith.php"><img src="brandimg/marks.png" alt="" />&nbsp;<span  style="color:aliceblue;">To Collab with</a></span></li>
          <li><a href="resetpassword.php"><img src="brandimg/pass.png" alt="" />&nbsp;<span  style="color:aliceblue;">resset password</a></span></li>
          <li><a href="logout.php"><img class="radio" src="brandimg/logout.jpeg" alt="" />&nbsp;<span style="color:aliceblue;">log-out</a></span></li>
      
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

        <div class="social-icons">
          
            <div> </div>
        </div>
      </header>




      <!--main-->

      <main>
        <h2 class="dash-title">Welcome To Your Profil</h2>
        <div class="hello">
          <div class="card-body1">
              <div class="welcome">
                  <h1>Hello <?php echo $user; ?>!</h1>
                  <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum neque in consequatur delectus ducimus est sint tempora possimus ad eaque aperiam fugiat consectetur, veritatis dicta, officia corrupti numquam. Et, nesciunt?</h5>
              </div>
              <span class="card1">
                <img src="./brandimg/headersmall_brandevolution.jpg" alt="">
             </span>
          </div>
       </div>
       <div class="container">
      <div class="header">
        <div class="nav">
          <div class="user">
            <div class="img-case">
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="cards">
          <div class="card">
            <div class="icon-case">
              <img src="brandimg/8.png" alt="" />
            </div>
          </div>
          <div class="card" id="inf"><a href="./reset-pwd-brand.php">
           <!-- <div class="box">
              <h1 class="rec1">Modifier</h1>
              <h3 class="rec1">Password</h3>
            </div>-->
            <div class="icon-case">
              <img src="./assets/imgs/img.jpeg" alt="" />
            </div>
          </div></a>
        </div>
           <!-- <div class="title" >
              <h2 class="rec">Influenceurs</h2>
            </div>-->
       
        <!--cards-->
        <div class="dash-cards">
            <div class="card-single">

                <div class="card-body">
                   
                    <div>
                        <h5>our Brands</h5>
                        <h4><?php echo $numberinf; ?></h4>
                    </div>

                    <span class="card2">
                      <img style=" width: 180px; height:180px; margin-top:50px;"  src="brandimg/This french artist combines 3d renderings of famous brands with retro toys.jpeg" alt="">
                    </span>

                </div>
                 
                <div class="card-footer">
                    <a href="ourbrands.php">View all</a>
                </div>
            </div>

            <div class="card-single">
                <div class="card-body">
                   
                    <div>
                        <h5>Total Collaborations</h5>
                        <h4><?php echo $numbercollabs; ?></h4>
                    </div>

                    <span class="card2">
                      <img style=" width: 180px; height:180px; margin-top:50px;"  src="./brandimg/User10017038 _  Freepik.jpeg" alt="">
                   </span>
                </div>
                <div class="card-footer">
                    <a href="ourcollabs.php">View all</a>
                </div>
            </div>
        </div>



        
      </main>
    </div>
  </body>
</html>

