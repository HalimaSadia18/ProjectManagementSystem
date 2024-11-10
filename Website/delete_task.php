<?php
require('config/connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id = $id";
$res = mysqli_query($conn , $sql);

if($res){
    echo
    "<script>
      alert('Task Deleted Successfully');
      window.location.href='task.php';
    </script>";
}else{
    echo "Something Went Wrong";
}