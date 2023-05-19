<?php 
require "./connectionadmin.php";
$p=new crud("inflbrand","localhost:3308","root","");
session_start();
if(!isset($_SESSION["id"])){
    header("location: login.php");
    exit();
}
$user = $_SESSION["username"];
$user_id = $_SESSION["id"];
$numberinf = $p->getinflu();
$numbercollabs=$p->getnumberofcollabs();
$influencers = $p->getInfluencers();
$brands = $p->getallbrands();
$numberbrands=$p->getbrands();
$suppression=$p->getsupp();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />  <!-- Préchargement des polices depuis l'URL spécifiée -->
    <link rel="stylesheet" href="dashboard.css"> <!-- Inclusion de la feuille de style pour le tableau de bord -->
</head>  

<body>
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
          <li><a href="dashboard.php"><img src="./img/marks.png" alt="" />&nbsp;<span  style="color:aliceblue;">table de bord</a></span></li>
          <li><a href="ourbrands.php"><img src="./img/brand.png" alt="" />&nbsp;<span  style="color:aliceblue;">Our brands</a></span></li>
          <li><a href="ourcollabs.php"><img src="./img/collab.jpg" alt="" />&nbsp;<span  style="color:aliceblue;">Our collabs</a></span></li>
          <li><a href="ourinfluencers.php"><img src="./img/profil.png" alt="" />&nbsp;<span  style="color:aliceblue;">Our influencers</a></span></li>
          <li><a href="resetpasswd.php"><img src="./img/pass.png" alt="" />&nbsp;<span  style="color:aliceblue;">resset password</a></span></li>
          <li ><a href="logout.php"><img  class="radios"src="./img/logout.jpeg" alt="" />&nbsp;<span style="color:aliceblue;">log-out</a></span></li>
      
        </ul>
      </div>
    </div>
    <div class="container">
    <div class="hello">
          <div class="card-body1">
              <div class="welcome">
                  <h1>Hello Dear Admin</h1>
                  <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum neque in consequatur delectus ducimus est sint tempora possimus ad eaque aperiam fugiat consectetur, veritatis dicta, officia corrupti numquam. Et, nesciunt?</h5>
              </div>
              <span class="card1">
                <img src="./img/GO Agentes Digitales en GOAGENTES.webp" alt="">
             </span>
          </div>
       </div>
    <div class="content">
      <div class="cards">
        <div class="card">
            <div><img src="./img/UI8.jpeg" alt=""></div>
          <div class="box">
            <h1 class="rec1"><?php echo $numberbrands?></h1>
            <h3 class="rec1">Marques</h3>
          </div>
          <div class="icon-case">
            <img src="assets/imgs/7.png" alt="" />
          </div>
        </div>

        <div class="card">
        <div><img src="./img/3D young people working on computer illustration.jpeg" alt=""></div>
          <div class="box">
            <h1 class="rec1"><?php echo $numberinf?></h1>
            <h3 class="rec1">Influenceur</h3>
          </div>
          <div class="icon-case">
            <img src="assets/imgs/selfie (1).png" alt="" />
          </div>
        </div>
        <div class="card">
            <div><img src="./img/Pitch _ Product design case study.png" alt=""></div>
          <div class="box">
            <h1 class="rec1"><?php echo $numbercollabs?></h1>
            <h3 class="rec1">Partenariat</h3>
          </div>
          <div class="icon-case">
            <img src="assets/imgs/8.png" alt="" />
          </div>
        </div>


        <div class="icon-case">
          <img src="./assets/imgs/img.jpeg" alt="" />
        </div>

      </div>

         

         <center>
 
 <h1 class="">Generate requests for deletion</h1>
 <br><br>
  <div>
 <img style=" width:250px;"  src="./img/3d character person doing social media digital marketing.png "   alt="">
 </div>
 </center>

           <table class="rec5">
 
             <thead>
               <tr>
                 <th scope="col">id</th>
                 <th scope="col">username</th>
                 <th scope="col">INF OR BRAND</th>
                 <th scope="col">status</th>
                 <th scope="col">date</th>
                 <th scope="col">operation</th>
               </tr>
             </thead>
             <tbody>
             <?php foreach($suppression as $supp): ?>
              <tr>
                                   <th scope="row"><?php echo $supp['id'] ?></th>
                                       <td><?php echo $supp['username'] ?></td>
                                       <td><?php echo $supp['influencerORbrand'] ?></td>
                                       <td><?php echo $supp['status'] ?></td>
                                       <td><?php echo $supp['date'] ?></td>
                                       <td>
                                          
                                       <div class="card-footer">
                      <a class="but"  href="delete.php?username=<?php echo $supp['username']; ?>&type=<?php echo $supp['influencerORbrand']; ?>"   id="deleteLink">delete</a>

</div>
                                       </td>
                                       </tr>
                                       <?php endforeach; ?>
             </tbody>
             </table>
         
           
          
 
           
 
 </body>
 
 </html>