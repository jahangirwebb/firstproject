<?php
include('../config.php');

$sql = "DELETE FROM phpcrud WHERE id = {$_REQUEST['id']}";
$result = mysqli_query($connect, $sql);

if($result){
    header('location: dashboard.php');
}else{
    echo "Something went wrong";
}


?>