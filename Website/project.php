<?php
include('includes/header.php');
require('config/connection.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Our Projects
                    <a href="add_project.php" class="btn btn-success float-end">Add Project</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center" border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM projects ORDER BY id DESC";
                        $res = mysqli_query($conn , $sql);
                        if(mysqli_num_rows($res)>0){
                            while($row = mysqli_fetch_assoc($res)){
                        ?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td class="text-wrap"><?=$row['name']?></td>
                                <td class="text-wrap"><?=$row['description']?></td>
                                <td><?=$row['start_date']?></td>
                                <td><?=$row['end_date']?></td>
                                <td><?=$row['status']?></td>
                                <td>
                                    <a href="edit_project.php?id=<?=$row['id']?>" class="btn btn-info btn-sm">Edit</a>
                                    <br>
                                    <a href="delete_project.php?id=<?=$row['id']?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete the project?')"
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