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
    $task_name = input($_POST['task_name']);
    $username = input($_POST['username']);
    $comment = input($_POST['comment']);
    if(empty($task_name)){
        $errors['task_name']='Task Name is required';
    }
    if(empty($username)){
        $errors['username']='Username is required';
    }
    if(empty($comment)){
        $errors['comment']='Comment is required';
    }
    if(count($errors)==0){
        $sql = "INSERT INTO comments(task_id , user_id , comment)VALUES('$task_name' , '$username' , '$comment')";
        $res = mysqli_query($conn , $sql);
        if($res){
            echo
           "<script>
               window.location.href='comment.php';
               alert('Comment added successfully');
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
                    Add Comment
                    <a href="comment.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Task Name</label>
                      <select name="task_name" class="form-control">
                        <?php
                          $sql = "SELECT * FROM tasks";
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
                      <label style="font-size: 18px; font-weight:500;">Username</label>
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
                       <label style="font-size: 18px; font-weight:500;">Comment</label>
                       <!-- <input type="date" placeholder="Due Date" name="due" class="form-control"> -->
                        <textarea name="comment" class="form-control" placeholder="Comment"></textarea>
                    </div>
                   <div class="mb-3">
                      <button type="submit" name="add" class="btn btn-success">Add Comment</button>
                   </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>