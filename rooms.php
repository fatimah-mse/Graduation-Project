<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mse Hotel - Rooms</title>
    <!-- links  -->
        <?php require('inc/links.php'); ?>
    <!-- CSS Files  -->
        <link rel="stylesheet" href="css/rooms.css"/>
    <!-- Favicons -->
        <link rel="shortcut icon" href="imgs/favicon.png" type="image/x-icon">
</head>
<body>
    
    <!-- header  -->
        <?php require('inc/header.php'); ?>
    
    <!-- rooms -->
        <div class="title p-5">
            <h2 class="fw-bold h-font text-center">rooms</h2>
            <div class="line"></div>
            <p class="txt text-center mt-3 text-bold text-capitalize">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Qui quos autem aperiam <br> ipsum dignissimos voluptates soluta 
                doloribus laborum et consectetur!
            </p>
        </div>
        <div class="room p-5">
            <div class="container">
                <div class="row d-flex justify-content-evenly">
                    <div class="filters col-lg-3 col-md-12 p-2 rounded shadow mb-lg-0 mb-4 me-3">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid flex-lg-column align-items-stretch">
                                <h4 class="mt-2 mb-3">filters</h4>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="filterDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse flex-column" id="filterDropdown">
                                    <div class="Border p-3 mt-2 mb-2 rounded">
                                        <h5 class="mb-3">check availability</h5>
                                        <div class="d-flex justify-content-evenly align-items-center mb-2">
                                            <label class="form-lable">chech in</label>
                                            <input class="input p-1 rounded" type="date" name="check-in-date">
                                        </div>
                                        <div class="d-flex justify-content-evenly align-items-center mb-2">
                                            <label class="form-lable">chech out</label>
                                            <input class="input p-1 rounded" type="date" name="check-in-date">
                                        </div>
                                    </div>
                                    <div class="Border p-3 mt-2 mb-2 rounded">
                                        <h5 class="mb-3">facilities</h5>
                                        <div class="d-flex align-items-stretch align-items-center mb-2">
                                            <input class="check p-1 me-3 rounded" type="checkbox" name="checkbox" id="f1">
                                            <label for="f1" class="facil">facility one</label>
                                        </div>
                                        <div class="d-flex align-items-stretch align-items-center mb-2">
                                            <input class="check p-1 me-3 rounded" type="checkbox" name="checkbox" id="f2">
                                            <label for="f2" class="facil">facility two</label>
                                        </div>
                                        <div class="d-flex align-items-stretch align-items-center mb-2">
                                            <input class="check p-1 me-3 rounded" type="checkbox" name="checkbox" id="f3">
                                            <label for="f3" class="facil">facility three</label>
                                        </div>
                                    </div>
                                    <div class="Border p-3 mt-2 mb-2 rounded">
                                        <h5 class="mb-3">guests</h5>
                                        <div class="d-flex justify-content-evenly align-items-center mb-2">
                                            <label class="form-lable">Adults</label>
                                            <input class="input p-1 rounded" type="number" name="numofadults">
                                        </div>
                                        <div class="d-flex justify-content-evenly align-items-center mb-2">
                                            <label class="form-lable">childern</label>
                                            <input class="input p-1 rounded" type="number" name="numofchilder">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </nav>
                    </div>
                    <div class="details col-lg-8 col-md-12">

                        <?php
                            $room_res= select ("SELECT * FROM `rooms` WHERE `status`=?", [1], 'i');
                            while ($room_data = mysqli_fetch_assoc($room_res)) {

                                $fea_q = mysqli_query($connect, "SELECT f.name FROM `features` f INNER JOIN `room-features` rfea ON f.id = rfea.features_id WHERE rfea.room_id ='$room_data[id]'");
                                $fac_q = mysqli_query($connect, "SELECT f.name FROM `facilities` f INNER JOIN `room-facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id ='$room_data[id]'");
                                
                                $features_data ="";
                                $facilities_data ="";

                                while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                                    $features_data .= "<span class='mx-2'>$fea_row[name]</span>";
                                }

                                while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                                    $facilities_data .= "<span class='mx-2'>$fac_row[name]</span>";
                                }

                                echo <<< data
                                    <div class="card shadow pt-2 pb-2 my-4">
                                        <h4 class="w-100 text-center p-1 m-0">$room_data[name]</h4>
                                        <div class="row g-0 p-2 align-items-center">
                                            <div class="image col-md-4 me-2">
                                                <img src="imgs/room/room_1.jpg" class="img-fluid rounded" alt="...">
                                            </div>
                                            <div class="disc1 col-md-4 p-2">
                                                <div class="features mb-2">
                                                    <h6 class="mb-1">features</h6>
                                                    $features_data
                                                </div>
                                                <div class="facil mb-2">
                                                    <h6 class="mb-1">facilities</h6>
                                                    $facilities_data
                                                </div>
                                                <div class="guests">
                                                    <h6 class="mb-1">guests</h6>
                                                    <span>$room_data[adult] adults</span>
                                                    <span>$room_data[children] children</span>
                                                </div>
                                            </div>
                                            <div class="disc2 col-md-3 p-2">
                                                <h6 class="cost mb-4">$room_data[price] SP Per Night</h6>
                                                <a href="booking.php" class="btn btn-sm fw-bold mb-2 w-100">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                data;
                                
                                // echo $features_data;
                                // echo $facilities_data;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    

    <!-- footer  -->
        <?php require('inc/footer.php'); ?>

    <!-- JS files  -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/all.min.js"></script>
    
    
      
</body>
</html>