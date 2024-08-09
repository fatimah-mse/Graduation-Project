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
    <title>Admin Panel - Users</title>
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
                    <h4 class="title mt-3 mb-4">Users</h4>

                    <?php 
                        
                        if(isset($_GET['del'])) {
                            $frm_data = filteration($_GET);
                            if ($frm_data['del'] == 'all') {
                            } else {
                                $q = "DELETE FROM `user-cred` WHERE `id`=?";
                                $values = [$frm_data['del']];
                                if (delete($q, $values, 'i')) {
                                    alert('success', 'User Deleted');
                                } else {
                                    alert('error', 'Failed');
                                }
                            }
                        } 

                    ?>

                    <div class="row">
                        
                        <?php 
                            $q= "SELECT * FROM `user-cred` ORDER BY `id` DESC";
                            $data = mysqli_query($connect,$q);
                            $i = 1;

                            while ($row =mysqli_fetch_assoc($data)) {

                                $is_verified ="";
                                $is_verified.="<a href='?del=$row[id]' class='text-danger'><i class='fa-solid fa-trash-can fa-lg'></i></a>";
                                echo<<<query
                                <div class="col-12 col-md-6 col-lg-4 my-2">
                                    <div class="card p-3 d-flex w-100 position-relative">
                                        <div class="position-absolute" style="right: 10px; top: 10px;">$is_verified</div>
                                        <div class="w-100 d-flex align-items-center pb-2 mb-2 border-bottom">
                                            <i class="fa-solid fa-user me-4" style="font-size: 50px; color: var(--green);"></i>
                                            <h4 class="mb-0">$row[name]</h4>
                                        </div>
                                        <p class="mb-2"><i class="fa-solid fa-location me-2 text-warning"></i>$row[address]</p>
                                        <p class="mb-2"><i class="fa-solid fa-phone me-2 text-warning"></i>$row[phonenumber]</p>
                                        <p class="mb-2"><i class="fa-solid fa-qrcode me-2 text-warning"></i>$row[PinCode]</p>
                                        <p class="mb-2"><i class="fa-solid fa-calendar-days me-2 text-warning"></i>$row[dob]</p>
                                        <p class="mb-2"><i class="fa-solid fa-lock me-2 text-warning"></i>$row[password]</p>
                                        <p class="mb-2"><i class="fa-solid fa-calendar-days me-2 text-warning"></i>$row[datentime]</p>
                                        <p class="mb-2"><i class="fa-solid fa-at me-2 text-warning"></i>$row[email]</p>
                                    </div>
                                </div>
                                query;
                                $i++;
                            }
                        ?>
                            
                        </div>
                        
                    </div>

                    
                    

                </div>
            </div>
        </div>
        
    </div>
    


    <!-- JS File  -->
        <?php require('inc/scripts.php'); ?>

        
</html>