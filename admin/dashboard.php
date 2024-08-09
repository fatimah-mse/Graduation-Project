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
    <title>Admin Panel - Dashboard</title>
    <!-- CSS File -->
        <link rel="stylesheet" href="CSS/adminPanel.css">
    <!-- links  -->
        <?php require('inc/links.php'); ?>
    <!-- Favicons -->
        <link rel="shortcut icon" href="img/admin.png" type="image/x-icon">

    <style>
    .card::-webkit-scrollbar {
        width: 10px; 
    }

    .card::-webkit-scrollbar-thumb {
        background: #ffca0f;
    }

    .card::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    </style>
</head>
<body>
    <div class="admin">

        <?php require('inc/header.php'); ?>

        <!-- main content -->
        <div class="container-fluid" id="main-content">
            <div class="row">
                <div class="col-lg-10 ms-auto p-3 overflow-hidden">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 my-2">
                            <div class="card p-3 position-relative" style="height: 250px; overflow-y: scroll; ">
                                <h4 class="title mb-3 text-center">ROOMS</h4>
                                <table class="table table-hover border position-relative">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">Total</th>
                                            <th class="bg-primary text-light" scope="col">Active</th>
                                            <th class="bg-primary text-light" scope="col">InActive</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $q = "SELECT * FROM `rooms`";
                                        $data1 = mysqli_query($connect, $q);
                                        
                                        // استعلام للبحث عن الغرف النشطة فقط
                                        $qq = "SELECT * FROM `rooms` WHERE `status` = 1";
                                        $data2 = mysqli_query($connect, $qq);
                                        
                                        // استعلام للبحث عن الغرف غير النشطة فقط
                                        $qqq = "SELECT * FROM `rooms` WHERE `status` = 0";
                                        $data3 = mysqli_query($connect, $qqq);
                                        
                                        // حساب عدد الأسطر المطابقة
                                        $total = mysqli_num_rows($data1);
                                        $active = mysqli_num_rows($data2);
                                        $inactive = mysqli_num_rows($data3);
                                        echo<<<query
                                            <tr class="text-center">
                                                <td class="align-middle">$total</td>
                                                <td class="align-middle">$active</td>
                                                <td class="align-middle">$inactive</td>
                                            </tr>
                                        query;
                                    ?>
                                    </tbody>
                                </table>
                                <a href="rooms.php" class="position-absolute" style="bottom: 10px; right: 10px;"><i class="fa-solid fa-arrow-up-right-from-square text-danger fa-xl"></i></a>
                                
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-2 position-relative" >
                            <div class="card p-3 " style="height: 250px; overflow-y: scroll;">
                                <h4 class="title mb-3 text-center">Features & Facilities</h4>
                                <div class="d-flex">
                                    <table class="table table-hover border position-relative">
                                        <thead class="position-sticky top-0">
                                            <tr class="text-center">
                                                <th class="bg-primary text-light" scope="col">Features</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $data1 = selectAll('features');
                                            while ($row = mysqli_fetch_assoc($data1) ) {
                                                echo<<<query
                                                <tr class="text-center">
                                                    <td class="align-middle">$row[name]</td>
                                                </tr>
                                            query;
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    <table class="table table-hover border position-relative">
                                        <thead class="position-sticky top-0">
                                            <tr class="text-center">
                                                <th class="bg-primary text-light" scope="col">Facilities</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $data2 = selectAll('facilities');
                                            while ($row = mysqli_fetch_assoc($data2) ) {
                                                echo<<<query
                                                <tr class="text-center">
                                                    <td class="align-middle">$row[name]</td>
                                                </tr>
                                            query;
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="features_facilities.php" class="position-absolute" style="bottom: 10px; right: 30px;"><i class="fa-solid fa-arrow-up-right-from-square text-danger fa-xl"></i></a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-2">
                            <div class="card p-3 position-relative" style="height: 250px; overflow-y: scroll; " scrollbar= "width: 10px;" scrollbar-thumb="background: #888; " scrollbar-track="background: #f1f1f1;">
                                <h4 class="title mb-3 text-center">User Queries</h4>
                                <table class="table table-hover border position-relative">
                                        <thead class="position-sticky top-0">
                                            <tr class="text-center">
                                                <th class="bg-primary text-light" scope="col">Total</th>
                                                <th class="bg-primary text-light" scope="col">Read</th>
                                                <th class="bg-primary text-light" scope="col">UnRead</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $q = "SELECT * FROM `user-quaries`";
                                            $data1 = mysqli_query($connect, $q);
                                            
                                            $qq = "SELECT * FROM `user-quaries` WHERE `seen` = 1";
                                            $data2 = mysqli_query($connect, $qq);
                                            
                                            $qqq = "SELECT * FROM `user-quaries` WHERE `seen` = 0";
                                            $data3 = mysqli_query($connect, $qqq);
                                        
                                            $total = mysqli_num_rows($data1);
                                            $read = mysqli_num_rows($data2);
                                            $unread = mysqli_num_rows($data3);
                                            echo<<<query
                                                <tr class="text-center">
                                                    <td class="align-middle">$total</td>
                                                    <td class="align-middle">$read</td>
                                                    <td class="align-middle">$unread</td>
                                                </tr>
                                            query;
                                        ?>
                                        </tbody>
                                    </table>
                                    <a href="user_queries.php" class="position-absolute" style="bottom: 10px; right: 10px;"><i class="fa-solid fa-arrow-up-right-from-square text-danger fa-xl"></i></a>
                                
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-2">
                            <div class="card p-3 position-relative" style="height: 250px; overflow-y: scroll; " scrollbar= "width: 10px;" scrollbar-thumb="background: #888; " scrollbar-track="background: #f1f1f1;">
                                <h4 class="title mb-3 text-center">Testimonials</h4>
                                <table class="table table-hover border position-relative">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">Total</th>
                                            <th class="bg-primary text-light" scope="col">Shown in website</th>
                                            <th class="bg-primary text-light" scope="col">Not Shown</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $q = "SELECT * FROM `rating`";
                                        $data1 = mysqli_query($connect, $q);

                                        $qq = "SELECT * FROM `rating` WHERE `seen` = 1";
                                        $data2 = mysqli_query($connect, $qq);
                                        
                                        $qqq = "SELECT * FROM `rating` WHERE `seen` = 0";
                                        $data3 = mysqli_query($connect, $qqq);
                                        
                                        $total = mysqli_num_rows($data1);
                                        $show = mysqli_num_rows($data2);
                                        $unshow = mysqli_num_rows($data3);
                                        echo<<<query
                                            <tr class="text-center">
                                                <td class="align-middle">$total</td>
                                                <td class="align-middle">$show</td>
                                                <td class="align-middle">$unshow</td>
                                            </tr>
                                        query;
                                    ?>
                                    </tbody>
                                </table>
                                <a href="rating.php" class="position-absolute" style="bottom: 10px; right: 10px;"><i class="fa-solid fa-arrow-up-right-from-square text-danger fa-xl"></i></a>
                                
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-2">
                            <div class="card p-3 position-relative" style="height: 250px; overflow-y: scroll; " scrollbar= "width: 10px;" scrollbar-thumb="background: #888; " scrollbar-track="background: #f1f1f1;">
                                <h4 class="title mb-3 text-center">Users</h4>
                                <table class="table table-hover border position-relative">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $q = "SELECT * FROM `user-cred`";
                                        $data1 = mysqli_query($connect, $q);
                                        
                                        $total = mysqli_num_rows($data1);
                                        echo<<<query
                                            <tr class="text-center">
                                                <td class="align-middle">$total</td>
                                            </tr>
                                        query;
                                    ?>
                                    </tbody>
                                </table>
                                <a href="rating.php" class="position-absolute" style="bottom: 10px; right: 10px;"><i class="fa-solid fa-arrow-up-right-from-square text-danger fa-xl"></i></a>
                                
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 my-2">
                            <div class="card p-3 position-relative" style="height: 250px; overflow-y: scroll; " scrollbar= "width: 10px;" scrollbar-thumb="background: #888; " scrollbar-track="background: #f1f1f1;">
                                <h4 class="title mb-3 text-center">Booking</h4>
                                <table class="table table-hover border position-relative">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">User Name</th>
                                            <th class="bg-primary text-light" scope="col">User Number</th>
                                            <th class="bg-primary text-light" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td class="align-middle">fatimah</td>
                                            <td class="align-middle">+963981944215</td>
                                            <td class="align-middle">pending</td>
                                        </tr>
                                    <?php
                                        
                                    ?>
                                    </tbody>
                                </table>
                                <a href="booking.php" class="position-absolute" style="bottom: 10px; right: 10px;"><i class="fa-solid fa-arrow-up-right-from-square text-danger fa-xl"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    


    <!-- JS File  -->
        <?php require('inc/scripts.php'); ?>
</body>
</html>