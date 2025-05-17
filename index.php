<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        .font-nunito{
            font-family: "Nunito", serif;
        }

        /* #tb::-webkit-scrollbar{
            width: 0px !important;
        } */
    </style>
</head>
<body>
  
    <div class="container p-5">
       <div class="d-flex justify-content-between border-bottom border-dark pb-2 font-nunito">
        <h2 class="fw-bold">Employee management</h2>
        <div>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#aboutModal">About</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">Add Employee +</button>
        </div>
       </div>

       <div class="font-nunito">              
            <!-- <table class="table mt-2 table-striped mb-0" >   
              
            </table> -->

            <div id="tb" style="height: 550px;" class="overflow-auto">
                <table id="table-data" class="table w-100 table-striped overflow-hidden " >   
                    <thead class="table-dark"> 
                        <tr>
                            <th>#ID</th>
                            <th>Employee</th>
                            <th>Salary</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>              
                    <tbody id="datatb">
                        
                    </tbody>
                    
                    
                   
                </table>
            </div>
       </div>


       <!-- Modal -->
        <div class="modal fade" id="formModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" >Form Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEmp" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="empid" name="empid">

                            <label for="" class="my-2">Name*</label>
                            <input required type="text" name="name" id="name" class="form-control shadow-none border mb-2" placeholder="Enter Employee Name....">

                            <label for="" class="my-2">Email*</label>
                            <input required type="text" name="email" id="email" class="form-control shadow-none border mb-2" placeholder="Enter Employee Email....">

                            <label for="" class="my-2">Salary*</label>
                            <input required type="number" name="salary" id="salary" class="form-control shadow-none border mb-2" placeholder="Enter Employee Salary....">

                            <label for="" class="my-2">Position*</label>
                            <select name="position" id="position" class="form-select shadow-none border mb-2">
                                <option value="Web-developer">Web-developer</option>
                                <option value="App-developer">App-developer</option>
                                <option value="Network-Engineer">Network-Engineer</option>
                            </select>

                            <label for="" class="my-2">Upload Image*</label>
                            <div style="width: 150px;height: 150px;" class="bg-secondary rounded-2 border overflow-hidden ">

                                <input type="file" name="inputImage" id="inputImage" class="d-none">

                                <input type="hidden" name="imageold" id="imageold">

                                <img style="cursor: pointer;" id="preview" src="https://t4.ftcdn.net/jpg/01/64/16/59/360_F_164165971_ELxPPwdwHYEhg4vZ3F4Ej7OmZVzqq4Ov.jpg" alt="" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="modal-footer mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- View Profile Modal -->
        <div class="modal fade" id="viewProfileModal" tabindex="-1" aria-labelledby="viewProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProfileLabel">Employee Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="profileContent">
                
            </div>
            </div>
        </div>
        </div>



        <!-- Delete Modal -->
        <div class="modal fade" id="formModaldelete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" >Form Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="deleteEmp" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="deleteid" id="deleteid">
                            <h3>Are you sure you want to delete? </h3>
                            <div class="modal-footer mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- About Modal -->
        <div class="modal fade" id="aboutModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" >About Project</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="deleteEmp" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="deleteid" id="deleteid">
                            <h3>Puth Chantrea</h3>
                            <span>Class: E7 | </span>
                            <span>Project: Employee System</span>
                            <hr>
                            <p>Project Detail:
                                <p>This is a small Employee Management System made with PHP, AJAX, and Bootstrap. It lets users do basic tasks like adding, viewing, editing, and deleting employee information. PHP is used to handle the data, AJAX helps update the page without reloading, and Bootstrap makes the design simple and easy to use.</p>
                            </p>
                            <p>
                                Tecnology Use:
                            </p>
                            <div class="d-flex ">
                                <img width="120px" src="./app1.png" alt="">
                                <img width="120px" src="./app2.png" alt="">
                            </div>
                            <hr>
                            <p>
                                Contact Information:
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-geo-alt-fill"></i> Location: Phnom Penh,Cambodia </li>
                                <li><i class="bi bi-envelope-at-fill"></i> Email: <a href="">puthchantrea@gmail.com</a></li>
                                <li><i class="bi bi-github"></i> GitHub: <a href="https://github.com/puthchantrea/employee_system">https://github.com/puthchantrea/employee_system</a> </li>
                                <li><i class="bi bi-telephone-forward-fill"></i> Phone Number: 081962380</li>
                            </ul>
                            <div class="modal-footer mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</body>
<script>

    $(document).ready(function(){
        

        const fetchData = () => {
            $.ajax({
                url:'fetch-data.php',
                type: 'GET',
                success:function(res){
                    $("#datatb").html(res);
                }
            })
        }

        fetchData();

        $('#preview').click(function(){
            $('#inputImage').click();
        })

        $('#inputImage').on('change',function(e){
            let imagepath = e.target.files[0];
            if(imagepath){
                let reader = new FileReader();
                reader.onload = function(e){
                    $('#preview').attr('src',e.target.result);
                }
                reader.readAsDataURL(imagepath);
            }
        })

        $('#formEmp').submit(function(e){
            e.preventDefault();
            var id = $('#empid').val();
            var formData = new FormData(this);
            var url = id ? 'edit-data.php':'add-data.php';
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success:function(res){
                    console.log(res);
                    Swal.fire({
                        title: "Good job!",
                        text: res,
                        icon: "success"
                    });
                    $('#formEmp')[0].reset();
                    $('#preview').attr('src','https://t4.ftcdn.net/jpg/01/64/16/59/360_F_164165971_ELxPPwdwHYEhg4vZ3F4Ej7OmZVzqq4Ov.jpg');
                    $('#formModal').modal('hide');
                    fetchData();
                }
            })
        })

        $('#deleteEmp').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'delete-data.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success:function(res){
                    Swal.fire({
                        title: "Good job!",
                        text: res,
                        icon: "success"
                    });
                    $('#formModaldelete').modal('hide');
                    fetchData();
                }
            })
        })
    })

    function editdata(id){
        // alert(id);
        $.ajax({
            url:'fetch-emp.php',
            type:'GET',
            data:{id:id},
            success:function(res){
                // alert(res);
                var employee = JSON.parse(res);
                $('#empid').val(employee.id);
                $('#name').val(employee.name);
                $('#email').val(employee.email);
                $('#salary').val(employee.salary);
                $('#position').val(employee.position).change();
                $('#imageold').val(employee.image);
                $('#inputImage').attr('alt',employee.image);
                $('#preview').attr('src','uploads/'+employee.image);
                $('#formModal').modal('show');
            }   
        })
    }

    function deletedata(id){
        $('#formModaldelete').modal('show');
        $('#deleteid').val(id);
    }
    function viewdata(id) {
    $.ajax({
        url: 'get_profile.php',
        type: 'GET',
        data: { id: id },
        success: function(response) {
            $('#profileContent').html(response);
            var modal = new bootstrap.Modal(document.getElementById('viewProfileModal'));
            modal.show();
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            $('#profileContent').html('<p class="text-danger">Failed to load data.</p>');
        }
    });
}
</script>
</html>