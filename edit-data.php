
<?php 
include 'connection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $empid = $_POST['empid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $position = $_POST['position'];

    $oldImage = $_POST['imageold'];

    $image = $_FILES['inputImage']['name'];

    if($image){
        $tmp = $_FILES['inputImage']['tmp_name'];

        $uploadDir = "uploads/"; 
        
        $newImageName = rand() . "-". basename($image);
        $targetFilePath = $uploadDir . $newImageName;
        
        if (move_uploaded_file($tmp, $targetFilePath)) {
            echo "File uploaded successfully!";
        } else {
            echo "File move failed!";
        }

        $query = "UPDATE `emp_tb` SET `name`='$name',`email`='$email',`salary`='$salary',`position`='$position',`image`='$newImageName' WHERE `id` = '$empid'";
        if(mysqli_query($conn,$query)){
            echo 'Update Success.';
        }else{
            echo 'Bad Request.';
        }
    }else{
        $query = "UPDATE `emp_tb` SET `name`='$name',`email`='$email',`salary`='$salary',`position`='$position',`image`='$oldImage' WHERE `id` = '$empid'";
        if(mysqli_query($conn,$query)){
            echo 'Update Success.';
        }else{
            echo 'Bad Request.';
        }
    }
}

?>
