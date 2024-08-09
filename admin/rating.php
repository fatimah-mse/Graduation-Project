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
    <title>Admin Panel - Testimonials</title>
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
                    <h4 class="title mt-3 mb-4">Testimonials</h4>

                    <?php 
                        if(isset($_GET['seen'])) {
                        $frm_data = filteration ($_GET);

                        if ($frm_data['seen']=='all') {

                        }
                        else {
                            $q= "UPDATE `rating` SET `seen`=? WHERE `sr_no`=?";
                            $values = [1,$frm_data['seen']];
                            if(update($q,$values,'ii')) {
                                alert('success' , 'Marked as Read');
                            }
                            else {
                                alert('error' , 'Failed');
                            }
                        }
                    }
                        
                    if(isset($_GET['del'])) {
                        $frm_data = filteration($_GET);
                        if ($frm_data['del'] == 'all') {
                        } else {
                            $q = "DELETE FROM `rating` WHERE `sr_no`=?";
                            $values = [$frm_data['del']];
                            if (delete($q, $values, 'i')) {
                                alert('success', 'Data Deleted');
                            } else {
                                alert('error', 'Failed');
                            }
                        }
                    } 
                    ?>

                    <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="table-responsive-md" style="min-height: 300px;">
                                <table class="table table-hover border position-relative">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">#</th>
                                            <th class="bg-primary text-light" scope="col">Name</th>
                                            <th class="bg-primary text-light" scope="col">Rating</th>
                                            <th class="bg-primary text-light" scope="col">Seen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $q= "SELECT * FROM `rating` ORDER BY `sr_no` DESC";
                                            $data = mysqli_query($connect,$q);
                                            $i = 1;

                                            while ($row =mysqli_fetch_assoc($data)) {

                                                $seen ="";
                                                if($row['seen']!=1) {
                                                    $seen = "<a href='?seen=$row[sr_no]' class='text-success'><i class='fa-solid fa-check-double fa-xl me-2'></i></a>";
                                                }
                                                $seen.="<a href='?del=$row[sr_no]' class='text-danger'><i class='fa-solid fa-trash-can fa-lg'></i></a>";
                                                echo<<<query
                                                    <tr class="text-center">
                                                        <td class="align-middle">$i</td>
                                                        <td class="align-middle">$row[name]</td>
                                                        <td class="align-middle" style="width: 400px;">$row[rating]</td>
                                                        <td class="align-middle">$seen</td>
                                                    </tr>
                                                query;
                                                $i++;
                                            }
                                        ?>
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