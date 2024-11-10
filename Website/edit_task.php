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

$sql = "SELECT t.* , p.name as project_name , u.username FROM tasks t join projects p ON p.id = t.project_id
        join users u ON u.id = t.assigned_to WHERE t.id = $id";
$res = mysqli_query($conn , $sql);
if(mysqli_num_rows($res)==1){
    $row = mysqli_fetch_assoc($res);
    $p_name = $row['project_name'];
    $t_name = $row['name'];
    $description = $row['description'];
    $username = $row['username'];
    $status = $row['status'];
    $due = $row['due_date'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Task
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
                      <input type="text" placeholder="Task name" name="task_name" class="form-control" value="<?=$t_name?>">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Description</label>
                      <textarea name="description" placeholder="Description" class="form-control"><?=$description?></textarea>
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
                            <option value="completed" <?= $status == 'completed' ? 'selected' : '' ?>>Completed</option>
                            <option value="in_progress" <?= $status == 'in_progress' ? 'selected' : '' ?>>In process</option>
                            <option value="not_started" <?= $status == 'not_started' ? 'selected' : '' ?>>Not Started</option>
                        </select>
                    </div>
                    <div class="mb-3">
                       <label style="font-size: 18px; font-weight:500;">Due Date</label>
                       <input type="date" placeholder="Due Date" name="due" class="form-control" value="<?=$due?>">
                    </div>
                   <div class="mb-3">
                      <button type="submit" name="update" class="btn btn-success">Update Task</button>
                   </div>
                </form>
                
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['update'])){
        $p_name = input($_POST['project_name']);
        $t_name = input($_POST['task_name']);
        $description = input($_POST['description']);
        $username = input($_POST['username']);
        $status = input($_POST['status']);
        $due = input($_POST['due']);

        $sql = "UPDATE tasks SET project_id = $p_name , name = '$t_name' , description = '$description' , assigned_to = $username , status = '$status' , due_date = '$due' WHERE id = $id";
        $res = mysqli_query($conn , $sql);
        if($res){
            echo
            "<script>
              alert('Task updated successfully');
              window.location.href='task.php';
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