<?php

include('../config.php');
session_start();

if ($_SESSION['logged_in']) {
  $Email = $_SESSION['email'];
} else {
  header("location: ../login.php");
}


if(isset($_REQUEST['update'])){
  
  $username = $_REQUEST['username'];
  $age = $_REQUEST['age'];
  $city = $_REQUEST['city'];

$sql = "UPDATE phpcrud SET username = '$username', age = '$age', city = '$city' WHERE id = {$_REQUEST['id']}";

$result = mysqli_query($connect, $sql);
  if($result){
      header('location: dashboard.php');
  }
}




?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="../styles.css">


</head>
<body class="d-flex flex-column ">

<nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-dark">
        <h1 class="text-white">PHP CRUD Application</h1>
    </nav>

        

<section class=" bg-image">

  <div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-10 col-md-8 col-lg-6 col-xl-5">
          <div class="card mt-5" style="border-radius: 5px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Edit Your Record</h2>


              <form action="" method="POST">

                <div class="form-outline form-group mb-4">
                  <input type="text" name="username"  class="form-control " placeholder="Username" required/>
                  
                </div>

                <div class="form-outline form-group mb-4">
                  <input type="text" name="age" class="form-control" placeholder="Age" required />
                  
                </div>

                <div class="form-outline form-group mb-4">
                  <input type="text" name="city" class="form-control " placeholder="City" required/>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body form-control" name="update">Update</button>
                </div>


              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>

</html>