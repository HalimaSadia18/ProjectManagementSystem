<?php
include('includes/header.php');
require('config/connection.php');

function input($input){
    global $conn;
    $input = trim($input);
    $input = htmlspecialchars($input);
    return mysqli_real_escape_string($conn , $input);
}
$errors = [];
if(isset($_POST['add'])){
    $name = input($_POST['name']);
    $description = input($_POST['description']);
    $start = input($_POST['start']);
    $end = input($_POST['end']);
    $status = input($_POST['status']);
    if(empty($name)){
        $errors['name']='Project Name is required';
    }
    if(empty($description)){
        $errors['description']='Description is required';
    }
    if(empty($start)){
        $errors['start']='Start Date is required';
    }
    if(empty($end)){
        $errors['end']='End Date is required';
    }
    if(empty($status)){
        $errors['status']='Status is required';
    }
    if(count($errors)==0){
        $sql = "INSERT INTO projects(name , description , start_date , end_date , status)VALUES('$name' , '$description' , '$start' , '$end' , '$status')";
        $res = mysqli_query($conn , $sql);
        if($res){
            echo
           "<script>
               window.location.href='project.php';
               alert('Project added successfully');
            </script>";
        }else{
            foreach($errors as $error){
                echo '<ul><li>'.$error.'</li></ul>';
            }
        }
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Project
                    <a href="project.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Project Name</label>
                      <input type="text" placeholder="Project name" name="name" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Description</label>
                      <!-- <input type="text" placeholder="Description" name="description" class="form-control">-->
                      <textarea name="description" placeholder="Description" class="form-control"></textarea>
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Start Date</label>
                      <input type="date" placeholder="Start Date" name="start" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">End Date</label>
                      <input type="date" placeholder="End Date" name="end" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Status</label>
                      <!-- <input type="text" placeholder="Status" name="status" class="form-control"> -->
                       <br>
                       <select name="status" class="form-control">
                        <option value="" selected disabled>Select Status</option>
                        <option value="completed">Completed</option>
                        <option value="in_progress">In process</option>
                        <option value="not_started">Not Started</option>
                       </select>
                   </div>
                   <div class="mb-3">
                      <button type="submit" name="add" class="btn btn-success">Add Project</button>
                   </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>