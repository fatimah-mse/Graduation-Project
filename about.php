<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mse Hotel - About</title>
    <!-- links  -->
        <?php require('inc/links.php'); ?>
    <!-- CSS Files  -->
        <link rel="stylesheet" href="css/about.css"/>
    <!-- Favicons -->
        <link rel="shortcut icon" href="imgs/favicon.png" type="image/x-icon">
</head>
<body>
    
    <!-- header  -->
        <?php require('inc/header.php'); ?>
    
    <!-- about -->
        <div class="title p-5">
            <h2 class="fw-bold h-font text-center">about us</h2>
            <div class="line"></div>
            <p class="txt text-center mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Qui quos autem aperiam <br> ipsum dignissimos voluptates soluta 
                doloribus laborum et consectetur!
            </p>
        </div>
        <div class="cart">
            <div class="container p-4">
                <div class="row">
                    <div class="disc col-lg-6 col-md-6 p-3 mt-lg-5 mb-lg-5 order-2 order-md-1 order-lg-1">
                        <h3 class="mb-3">Lorem ipsum dolor sit </h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Obcaecati earum nisi, sed quae assumenda dignissimos eaque.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Obcaecati earum nisi, sed quae assumenda dignissimos eaque.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 p-0 mt-lg-5 mb-lg-5 order-1 order-md-2 order-lg-2">
                        <img class="w-100 fluid" src="imgs/about1.jpg" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="about p-5">
           <div class="container about">
                <div class="row d-flex justify-content-evenly">
                    <div class="col-lg-3 col-md-6 px-4 mb-4 mt-1 mb-lg-2">
                        <div class="section p-3 rounded shadow text-center">
                            <i class="icon fa-solid fa-hotel mb-3"></i>
                            <h5>100+ Rooms</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 px-4 mb-4 mt-1 mb-lg-2">
                        <div class="section p-3 rounded shadow text-center">
                            <i class="icon fa-solid fa-user mb-3"></i>
                            <h5>200+ customers</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 px-4 mb-4 mt-1 mb-lg-2">
                        <div class="section p-3 rounded shadow text-center">
                            <i class="icon fa-solid fa-star mb-3"></i>
                            <h5>150+ reviews</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 px-4 mb-4 mt-1 mb-lg-2">
                        <div class="section p-3 rounded shadow text-center">
                            <i class="icon fa-solid fa-users mb-3"></i>
                            <h5>200+ staffs</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="members pt-1">
            <h3 class="my-4 h-font d-flex justify-content-evenly">management team</h3>
            <!-- Swiper -->
            <div class="container px-4">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper pb-5">

                        <?php 
                            $about_q = selectAll('team-details');
                            while ($row = mysqli_fetch_assoc($about_q)) {
                                $path = ABOUT_IMG_PATH;
                                echo <<<data
                                <div class="swiper-slide shadow" style="height: 400px;">
                                    <img class="w-100 overflow-hidden img-fluid" src="$path$row[picture]" style="object-fit: cover; height: 88%">
                                    <h5 class="m-3 text-center">$row[name]</h5>
                                </div>
                                data;
                            }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    

    <!-- footer  -->
        <?php require('inc/footer.php'); ?>

    <!-- JS files  -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/all.min.js"></script>
    <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView:4,
                spaceBetween:40,
                pagination: {
                    el: ".swiper-pagination",
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                    },
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                }
            });
        </script>
    
      
</body>
</html>