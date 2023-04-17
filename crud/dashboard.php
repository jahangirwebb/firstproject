<?php
include("../config.php");
session_start();
include("../auth_session.php");


if ($_SESSION['logged_in']) {
    $Email = $_SESSION['email'];
} else {
    header("location: login.php");
}












?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-dark">
        <h1 class="text-white">PHP CRUD Application</h1>
    </nav>

    <div class="container">
        <div class="text-center mt-5">
            <h3>Add New Record</h3>
            <p class="text-muted">Complete the form below to add new record.</p>
        </div>
    </div>


    <div class="container mt-5 ">
    
    <div class="row justify-content-center align-item-center">
    
        <div class="col-sm-7 ">
        <a href="insert.php" class="btn btn-dark mb-3">Add New</a>
           



                <?php

                $sql = "SELECT * FROM phpcrud";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0) {


                ?>

                    <table class="table text-center">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">City</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['age']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $row['id'];?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;&nbsp;
                                        <a href="delete.php?id=<?php echo $row['id'];?>" class="link-dark"> <i class="fa-solid fa-trash fs-6"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php

                        }
                        ?>

                    </table>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>