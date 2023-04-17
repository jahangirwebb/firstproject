<?php
include('config.php');
session_start();



if(isset($_REQUEST['login'])){

  $Email = trim($_REQUEST['email']);
  $Password = trim($_REQUEST['password']);

  $login_query ="SELECT * FROM phpauth WHERE email = '$Email' AND password = '$Password' limit 1"; 

  $result = mysqli_query($connect, $login_query);
  $rows = mysqli_num_rows($result);

  if($rows == 1){
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $Email;
    header("location: crud/dashboard.php");
  }else{
    $msg = '<div class="alert alert-danger mt-4">Email or password is wrong.</div>';
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


    <link rel="stylesheet" href="styles.css">


</head>
<body class="d-flex flex-column bg-dark text-white">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Php Authentication</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>

                    </ul>
                </div>
            </div>
        </nav>

<section class=" bg-image">

  <div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-10 col-md-8 col-lg-6 col-xl-5">
          <div class="card mt-5" style="border-radius: 5px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form>

                

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control" placeholder="Email Address" required="required" name="email" />
                  
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control " placeholder="Password" required="required" name="password"/>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body form-control" name="login">Sign In</button>
                </div>
                

                <p class="text-center text-muted mt-5 mb-0">Create a new account. <a href="signup.php"
                    class="fw-bold text-body"><u>Registration</u></a></p>

              </form>
              <span><?php if(isset($msg)){echo $msg;}   ?></span>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>

</html>