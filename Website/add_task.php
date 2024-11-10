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
    $project_name = input($_POST['project_name']);
    $task_name = input($_POST['task_name']);
    $description = input($_POST['description']);
    $username = input($_POST['username']);
    $status = input($_POST['status']);
    $due = input($_POST['due']);
    if(empty($project_name)){
        $errors['project_name']='Project Name is required';
    }
    if(empty($task_name)){
        $errors['task_name']='Task Name is required';
    }
    if(empty($description)){
        $errors['description']='Description is required';
    }
    if(empty($username)){
        $errors['username']='Username is required';
    }
    if(empty($status)){
        $errors['status']='Status is required';
    }
    if(empty($due)){
        $errors['due']='Due Date is required';
    }
    if(count($errors)==0){
        $sql = "INSERT INTO tasks(project_id , name , description , assigned_to , status , due_date)VALUES($project_name , '$task_name' , '$description' , '$username' , '$status' , '$due' )";
        $res = mysqli_query($conn , $sql);
        if($res){
            echo
           "<script>
               window.location.href='task.php';
               alert('Task added successfully');
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
                    Add Task
                    <a href="task.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Project Name</label>
                      <select name="project_name" class="form-control">
                        <?php
                          $sql = "SELECT * FROM projects";
                          $res = mysqli_query($conn , $sql);
                          if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                          }
                        ?>
                      </select>
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Task Name</label>
                      <input type="text" placeholder="Task name" name="task_name" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Description</label>
                      <textarea name="description" placeholder="Description" class="form-control"></textarea>
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Assigned To</label>
                      <select name="username" class="form-control">
                      <?php
                          $sql = "SELECT * FROM users";
                          $res = mysqli_query($conn , $sql);
                          if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                                echo '<option value="'.$row['id'].'">'.$row['username'].'</option>';
                            }
                          }
                        ?>

                      </select>
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
                       <label style="font-size: 18px; font-weight:500;">Due Date</label>
                       <input type="date" placeholder="Due Date" name="due" class="form-control">
                    </div>
                   <div class="mb-3">
                      <button type="submit" name="add" class="btn btn-success">Add Task</button>
                   </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>