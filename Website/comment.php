<?php
include('includes/header.php');
require('config/connection.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Task's Comments
                    <a href="add_comment.php" class="btn btn-success float-end">Add Comment</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center" border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Task Name</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT c.* , u.username , t.name FROM comments c join tasks t ON t.id = c.task_id
                        join users u ON u.id = c.user_id ORDER BY id DESC";
                        $res = mysqli_query($conn , $sql);
                        if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                        ?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td class="text-wrap"><?=$row['username']?></td>
                                <td class="text-wrap"><?=$row['name']?></td>
                                <td class="text-wrap"><?=$row['comment']?></td>
                                <td>
                                    <a href="edit_comment.php?id=<?=$row['id']?>" class="btn btn-info btn-sm">Edit</a>
                                    <br>
                                    <a href="delete_comment.php?id=<?=$row['id']?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete the comment?')"
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