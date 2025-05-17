<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM emp_tb WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
        $position = htmlspecialchars($row['position']);
        $salary = number_format($row['salary'], 2);
        $image = "uploads/" . $row['image'];
        
        echo "
            <div class='text-center'>
                <img src='$image' class='rounded-circle mb-3' style='width:100px;height:100px;object-fit:cover;border:2px solid #198754;'>
                <h5>$name</h5>
                <p class='mb-1'><strong>Email:</strong> $email</p>
                <p class='mb-1'><strong>Position:</strong> $position</p>
                <p class='mb-0'><strong>Salary:</strong> \$$salary</p>
            </div>
        ";
    } else {
        echo "Employee not found.";
    }
}
?>
