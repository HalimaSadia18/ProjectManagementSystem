<?php
include('includes/header.php');
require('config/connection.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Tasks
                    <a href="add_task.php" class="btn btn-success float-end">Add Task</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center" border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project<br>Name</th>
                            <th>Task<br>Name</th>
                            <th>Description</th>
                            <th>Assigned<br>To</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT t.* , p.name as project_name , u.username FROM tasks t join projects p ON p.id = t.project_id
                        join users u ON u.id = t.assigned_to ORDER BY id DESC";
                        $res = mysqli_query($conn , $sql);
                        if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                        ?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td class="text-wrap"><?=$row['project_name']?></td>
                                <td class="text-wrap"><?=$row['name']?></td>
                                <td class="text-wrap"><?=$row['description']?></td>
                                <td><?=$row['username']?></td>
                                <td><?=$row['status']?></td>
                                <td><?=$row['due_date']?></td>
                                <td>
                                    <a href="edit_task.php?id=<?=$row['id']?>" class="btn btn-info btn-sm">Edit</a>
                                    <br>
                                    <a href="delete_task.php?id=<?=$row['id']?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete the task?')"
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