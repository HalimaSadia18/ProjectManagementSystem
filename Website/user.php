<?php
include('includes/header.php');
require('config/connection.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Our Users
                    <a href="add_user.php" class="btn btn-success float-end">Add User</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center" border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM users ORDER BY id DESC";
                        $res = mysqli_query($conn , $sql);
                        if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                        ?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td><?=$row['username']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['role']?></td>
                                <td>
                                    <a href="edit_user.php?id=<?=$row['id']?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="delete_user.php?id=<?=$row['id']?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete the user?')"
                                    >Delete</a>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>