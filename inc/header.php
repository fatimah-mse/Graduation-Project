
<?php 
    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');

    // $coonect_qq ="SELECT * FROM `settings` WHERE `sr_no`=?";
    // $value = [1];
    // $coonect_rr =mysqli_fetch_assoc(select($coonect_qq,$value,'ii'));

    $coonect_q ="SELECT * FROM `contact-details` WHERE `sr_no`=?";
    $values = [1];
    $coonect_r =mysqli_fetch_assoc(select($coonect_q,$values,'i'));
    // print_r($coonect_r);
?>

<!-- navbar  -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid ps-5 pe-5">
            <a class="navbar-brand fw-bold fs-3 h-font text-uppercase" href="index.php">
            <i class="hotel fa-solid fa-hotel fa-1x pe-3"></i>MSE Hotel</a>
            <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#main" 
            aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>    
            </button>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item text-center p-md-2 p-lg-0">
                        <i class="icon fa-solid fa-house me-2"></i>
                        <a class="text nav-link me-2 fs-5" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item text-center p-md-2 p-lg-0">
                        <i class="icon fa-solid fa-bed me-2"></i>
                        <a class="text nav-link me-2 fs-5" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item text-center p-md-2 p-lg-0">
                        <i class="icon fa-solid fa-heart me-2"></i>
                        <a class="text nav-link me-2 fs-5" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item text-center p-md-2 p-lg-0">
                        <i class="icon fa-solid fa-phone me-2"></i>
                        <a class="text nav-link me-2 fs-5" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item text-center p-md-2 p-lg-0">
                        <i class="icon fa-solid fa-address-card"></i>
                        <a class="text nav-link fs-5" href="about.php">About</a>
                    </li>
                    <li class="nav-item text-center p-md-2 p-lg-0">
                        <i class="icon fa-solid fa-star"></i>
                        <a class="text nav-link fs-5" href="rating.php">Rating</a>
                    </li>
                    <a class="d-flex align-items-center ms-3" href="loginsignup/sign-up-in.php" target="_blank"><i class="icon fa-solid fa-user-plus text-warning"></i></a>
                </ul>
            </div>
        </div>
    </nav>