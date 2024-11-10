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

$sql = "SELECT c.* , t.name , u.username FROM comments c JOIN tasks t ON t.id = c.task_id JOIN users u ON u.id = c.user_id WHERE c.id = $id";
$res = mysqli_query($conn , $sql);
if(mysqli_num_rows($res)==1){
    $row = mysqli_fetch_assoc($res);
    $t_name = $row['name'];
    $username = $row['username'];
    $comment = $row['comment'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Comment
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
                        <textarea name="comment" class="form-control" placeholder="Comment"><?=$comment?></textarea>
                    </div>
                   <div class="mb-3">
                      <button type="submit" name="update" class="btn btn-success">Update Comment</button>
                   </div>
                </form>
                
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['update'])){
        $t_name = input($_POST['task_name']);
        $username = input($_POST['username']);
        $comment = input($_POST['comment']);

        $sql ="UPDATE comments SET task_id = $t_name , user_id = $username , comment = '$comment' WHERE id= $id";
        $res = mysqli_query($conn , $sql);
        if($res){
            echo
            "<script>
              alert('Comment Updated Successfully');
              window.location.href='comment.php';
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