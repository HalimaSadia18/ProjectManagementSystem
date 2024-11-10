<style>
   h1{
      text-align: right;
   }
   .bg-black {
  background-color: #000 !important;
}
.text-black {
  color: #000 !important;
}
</style>
<?php
include('includes/header.php');
require('config/connection.php');
?>
 <div class="row mt-3">
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-10" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Total<br>Users</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
         <?php
           $sql = "SELECT COUNT(*) AS total FROM users";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-10" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Total<br>Projects</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
       <?php
           $sql = "SELECT COUNT(*) AS total FROM projects";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-11" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Total<br>Tasks</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
       <?php
           $sql = "SELECT COUNT(*) AS total FROM tasks";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
</div>  
<div class="row mt-3">
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-8" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Projects<br>(Completed)</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
       <?php
           $sql = "SELECT COUNT(*) AS total FROM projects WHERE status='completed'";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-9" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Projects<br>(In Progress)</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
       <?php
           $sql = "SELECT COUNT(*) AS total FROM projects WHERE status='in_progress'";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-10" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Projects<br>(Not Started)</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
       <?php
           $sql = "SELECT COUNT(*) AS total FROM projects WHERE status='not_started'";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
</div>  
<div class="row mt-3">
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-8" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Tasks<br>(Completed)</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
       <?php
           $sql = "SELECT COUNT(*) AS total FROM tasks WHERE status='completed'";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-9" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Tasks<br>(In Progress)</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
       <?php
           $sql = "SELECT COUNT(*) AS total FROM tasks WHERE status='in_progress'";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
   <div class="col-md-4 mb-4">
     <div class="card card-body p-3 d-flex flex-row gap-10" style="height: 8rem;">
       <h5 class="text-md mb-0 mr-6 text-capitalize font-weight-bold mr-3 text-success">Tasks<br>(Not Started)</h5>
       <h1 class="font-weight-bolder mt-2 text-green">
       <?php
           $sql = "SELECT COUNT(*) AS total FROM tasks WHERE status='not_started'";
           $res = mysqli_query($conn , $sql);
           $row = mysqli_fetch_assoc($res);
           echo $row['total'];
         ?>
       </h1> <!-- Add mt-2 for margin-top -->
      </div>         
   </div>
</div>   
<?php
include('includes/footer.php');
?>