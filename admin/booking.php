<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - User Queries</title>
    <!-- CSS File -->
        <link rel="stylesheet" href="CSS/adminPanel.css">
    <!-- links  -->
        <?php require('inc/links.php'); ?>
    <!-- Favicons -->
        <link rel="shortcut icon" href="img/admin.png" type="image/x-icon">

</head>
<body>
    <div class="admin">

        <?php require('inc/header.php'); ?>

        <!-- main content -->
        <div class="container-fluid" id="main-content">
            <div class="row">
                <div class="col-lg-10 ms-auto p-3 overflow-hidden">
                    <h4 class="title mt-3 mb-4">Booking</h4>

                    <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="table-responsive-md" style="min-height: 300px;">
                                <table class="table table-hover border position-relative">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">#</th>
                                            <th class="bg-primary text-light" scope="col">Name</th>
                                            <th class="bg-primary text-light" scope="col">Email</th>
                                            <th class="bg-primary text-light" scope="col">check in</th>
                                            <th class="bg-primary text-light" scope="col">check out</th>
                                            <th class="bg-primary text-light" scope="col">adult</th>
                                            <th class="bg-primary text-light" scope="col">children</th>
                                            <th class="bg-primary text-light" scope="col">Status</th>
                                            <th class="bg-primary text-light" scope="col">Confirm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>1</td>
                                            <td>fatimah</td>
                                            <td>fatimahmse83@gmail.com</td>
                                            <td>2024-07-30</td>
                                            <td>2024-08-8</td>
                                            <td>7</td>
                                            <td>3</td>
                                            <td>pending</td>
                                            <td>
                                            <a href='#' class='text-success'><i class='fa-solid fa-check-double fa-xl me-2'></i></a>
                                            <a href='#' class='text-danger'><i class='fa-solid fa-trash-can fa-xl me-2'></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
        
    </div>
    


    <!-- JS File  -->
        <?php require('inc/scripts.php'); ?>

        
</html>