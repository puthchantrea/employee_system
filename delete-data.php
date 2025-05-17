<?php

   include 'connection.php';

   if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_POST['deleteid'];
        
       $query = "DELETE FROM `emp_tb` WHERE `id` = $id";
                 
       if(mysqli_query($conn,$query)) {
         echo "Delete Success...";
       }else{
         echo "Error Deleting...";
       }

   }
?>