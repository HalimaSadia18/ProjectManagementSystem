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
$id = $_GET['id'];
$sql = "SELECT * FROM projects WHERE id = $id";
$res = mysqli_query($conn , $sql);
if(mysqli_num_rows($res)==1){
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];
    $description = $row['description'];
    $start = $row['start_date'];
    $end = $row['end_date'];
    $status = $row['status'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Project
                    <a href="project.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Project Name</label>
                      <input type="text" placeholder="Project name" name="name" class="form-control" value="<?=$name?>">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Description</label>
                      <!-- <input type="text" placeholder="Description" name="description" class="form-control">-->
                      <textarea name="description" placeholder="Description" class="form-control"><?=$description?>"</textarea>
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Start Date</label>
                      <input type="date" placeholder="Start Date" name="start" class="form-control" value="<?=$start?>">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">End Date</label>
                      <input type="date" placeholder="End Date" name="end" class="form-control" value="<?=$end?>">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Status</label>
                      <!-- <input type="text" placeholder="Status" name="status" class="form-control"> -->
                       <br>
                       <select name="status" class="form-control">
                        <option value="" selected disabled><?=$status?>"</option>
                        <option value="completed">Completed</option>
                        <option value="in_progress">In process</option>
                        <option value="not_started">Not Started</option>
                       </select>
                   </div>
                   <div class="mb-3">
                      <button type="submit" name="update" class="btn btn-success">Update Project</button>
                   </div>
                </form>
                
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['update'])){
        $name = input($_POST['name']);
        $description = input($_POST['description']);
        $start = input($_POST['start']);
        $end = input($_POST['end']);
        $status = input($_POST['status']);

        $sql = "UPDATE projects SET name = '$name' , description = '$description' , start_date = '$start' , end_date = '$end' , status = '$status' WHERE id = $id";
        $res = mysqli_query($conn , $sql);
        if($res){
            echo
            "<script>
               alert('Project Updated Successfully');
               window.location.href='project.php';
            </script>";
        }else{
            echo "Something went wrong";
        }
    }
    ?>
</div>
<?php
include('includes/footer.php');
?>