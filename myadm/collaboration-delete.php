<?php
include "configuration.php";   // include the configuration file
if(isset($_GET['deleteid'])){  // Check if the 'deleteid' parameter is set in the URL
    $id=$_GET['deleteid'];   // Get the value of 'deleteid' parameter
    $sql="delete from `collaboration` where id=$id";   // SQL query to delete a record from the 'collaboration' table with the specified ID
    $result=mysqli_query($mysqli,$sql);     // Execute the query
    if($result){
        // echo "deleted successfully";
        header('location:dashboard.php');    // Redirect to the 'dashboard.php' page after successful deletion
    }else
    die(mysqli_error($mysqli));   // Terminate the script and display the MySQL error message
}
?>