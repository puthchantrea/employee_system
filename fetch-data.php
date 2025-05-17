<?php 
    include 'connection.php';
    
    $query = 'SELECT * FROM `emp_tb`';
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
       
        echo
        <<<HTML
       
             <tr class='align-middle'>
                <td>{$row['id']}</td>
                <td class="d-flex"> 
                    <div style='width: 45px;height: 45px;' class='bg-danger rounded-circle overflow-hidden border border-success'>
                       <img class='w-100 h-100 object-fit-cover' src='uploads/{$row['image']}' alt=''>
                    </div>
                    <div class="ms-2">
                        <p class='m-0 fw-bold'>{$row['name']}</p>
                        <p style='font-size: 12px;' class='m-0'>{$row['email']}</p>
                    </div>
                </td>
                <td>\${$row['salary']}</td>
                <td>{$row['position']}</td>
                <td class='text-start'>
                    <button class='btn btn-warning p-2' onclick="editdata({$row['id']})">
                        <i class='bi bi-pen'></i>
                    </button>
                    <button class='btn btn-danger p-2' onclick="deletedata({$row['id']})">
                        <i class='bi bi-trash'></i>
                    </button>
                     <button class='btn btn-info p-2' onclick="viewdata({$row['id']})">
                        <i class='bi bi-eye'></i>
                    </button>
                </td>
            </tr> 
        HTML;
    }

?>