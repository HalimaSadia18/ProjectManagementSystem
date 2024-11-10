<?php
require('config/connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $id";
$res = mysqli_query($conn , $sql);
if($res){
    echo
    "<script>
       alert('User Deleted Successfully');
       window.location.href='user.php';
    </script>";
}else{
    echo "Something went wrong";
}
?>