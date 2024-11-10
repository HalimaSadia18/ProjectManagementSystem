<?php
require('config/connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM projects WHERE id = $id";
$res = mysqli_query($conn , $sql);

if($res){
    echo
    "<script>
      alert('Project Deleted Successfully');
      window.location.href='project.php';
    </script>";
}else{
    echo "Something went wrong";
}
?>