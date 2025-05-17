<?php

    include 'connection.php';

    
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM `emp_tb` WHERE id = $id";
        $resutl = mysqli_query($conn, $query );
        if($resutl->num_rows>0){
            $employee = $resutl->fetch_assoc();
            echo json_encode($employee);
        }else{
            echo json_encode(['error'=>"Employee not founds"]);   
        }
    }else{
        echo json_encode(['error' => 'Invalid request']);
    }

?>