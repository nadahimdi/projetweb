<?php
include "configuration.php";
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `influencer` where id=$id";
    $result=mysqli_query($mysqli,$sql);
    if($result){
        // echo "deleted successfully";
        header('location:dashboard.php');
    }else
    die(mysqli_error($mysqli));
}
?>