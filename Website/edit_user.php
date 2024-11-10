<?php
require('config/connection.php');
include('includes/header.php');

function input($input){
    global $conn;
    $input = trim($input);
    $input = htmlspecialchars($input);
    return mysqli_real_escape_string($conn , $input);
}
$errors = [];
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id =$id";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)==1){
    $row = mysqli_fetch_assoc($res);
    $username = $row['username'];
    $email = $row['email'];
    $role = $row['role'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit User
                    <a href="user.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Username</label>
                      <input type="text" placeholder="Username" name="username" class="form-control" 
                      value="<?= $username ?>">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Email</label>
                      <input type="text" placeholder="Email" name="email" class="form-control" 
                      value="<?= $email ?>">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Role</label>
                      <input type="text" placeholder="Role" name="role" class="form-control" 
                      value="<?= $role ?>">
                   </div>
                   <div class="mb-3">
                      <button type="submit" name="update" class="btn btn-success">Update</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['update'])){
        $username = input($_POST['username']);
        $email = input($_POST['email']);
        $role = input($_POST['role']);
        $sql = "UPDATE users SET username = '$username' , email = '$email' , role = '$role' WHERE id = $id";
        $res = mysqli_query($conn,$sql);
        if($res){
            echo 
            "<script>
              window.location.href = 'user.php';
              alert('Username edit successfully');
            </script>"; 
        }
        else{
            echo "Something went wrong";
        }
    }
    ?>
</div>
<?php
include('includes/footer.php');
?>