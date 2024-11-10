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
    $username = input($_POST['username']);
    $email = input($_POST['email']);
    $role = input($_POST['role']);
    if(empty($username)){
        $errors['username']='Username is required';
    }
    if(empty($email)){
        $errors['email']='Email is required';
    }
    if(empty($role)){
        $errors['role']='Role is required';
    }
    if(count($errors)==0){
        $sql = "INSERT INTO users(username , email , role)VALUES('$username' , '$email' , '$role')";
        $res = mysqli_query($conn , $sql);
        if($res){
            echo
           "<script>
               window.location.href='user.php';
               alert('User added successfully');
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
                    Add User
                    <a href="user.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Username</label>
                      <input type="text" placeholder="Username" name="username" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Email</label>
                      <input type="email" placeholder="Email" name="email" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label style="font-size: 18px; font-weight:500;">Role</label>
                      <input type="text" placeholder="Role" name="role" class="form-control">
                   </div>
                   <div class="mb-3">
                      <button type="submit" name="add" class="btn btn-success">Add User</button>
                   </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>