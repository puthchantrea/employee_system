<?php

   include 'connection.php';

   if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
        $position = $_POST['position'];
        $image = $_FILES['inputImage']['name'];

        $tmp = $_FILES['inputImage']['tmp_name'];

        $uploadDir = "uploads/"; 
        
        $newImageName = rand() . "-". basename($image);
        $targetFilePath = $uploadDir . $newImageName;
        
        if (move_uploaded_file($tmp, $targetFilePath)) {
            echo "File uploaded successfully!";
        } else {
            echo "File move failed!";
        }
          
       $query = "INSERT INTO `emp_tb`(`name`, `email`, `salary`, `position`, `image`) 
                 VALUES ('$name',' $email','$salary','$position','$newImageName')";
                 
       if(mysqli_query($conn,$query)) {
         echo "Insert Success...";
       }else{
         echo "Error Inserting...";
       }

   }
?>