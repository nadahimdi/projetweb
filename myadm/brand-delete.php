<?php
include "configuration.php";// Include the configuration file
if(isset($_GET['deleteid'])){ // Check if the 'deleteid' parameter is set in the URL
    $id=$_GET['deleteid'];   // Get the value of 'deleteid' parameter
    $sql="delete from `brand` where id=$id";    // SQL query to delete a record from the 'brand' table with the specified ID
    $result=mysqli_query($mysqli,$sql);   // Execute the query

    if($result){
        // If the deletion is successful
        header('location:dashboard.php');    // Redirect to the 'dashboard.php' page after successful deletion
    }else
    die(mysqli_error($mysqli)); // Terminate the script and display the MySQL error message
}
?>