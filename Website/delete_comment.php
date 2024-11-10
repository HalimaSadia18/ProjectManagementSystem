<?php
require('config/connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM comments WHERE id = $id";
$res = mysqli_query($conn , $sql);

if($res){
    echo
    "<script>
      alert('Comment Deleted Successfully');
      window.location.href='comment.php';
    </script>";
}else{
    echo "Something went wrong";
}
?>