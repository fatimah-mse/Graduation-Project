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
            <h2 class="fw-bold h-font text-center">Booking</h2>
            <div class="line"></div>
            <p class="txt text-center mt-3 text-bold text-capitalize">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Qui quos autem aperiam <br> ipsum dignissimos voluptates soluta 
                doloribus laborum et consectetur!
            </p>
        </div>
        <div class="room p-5">
            <div class="container p-4">
                <div class="bg-light row ">
                    <div class="col-lg-5 col-md-6 p-0">
                        <img class="w-100 fluid h-100" src="imgs/room/room_1.jpg" alt="...">
                    </div>
                    <div class="disc col-lg-7 col-md-6 p-3 my-2">
                        <h4 class="mb-3">Booking This Room Now</h4>
                        <form action="" class="row">
                            <div class="col-6 mb-4 d-flex justify-content-between align-items-center">
                                <label for="">check in</label>
                                <input class="rounded shadow py-2 px-2"style="width:200px" type="date" name="" id="">
                            </div>
                            <div class="col-6 mb-4 d-flex justify-content-between align-items-center">
                                <label for="">check out</label>
                                <input class="rounded shadow py-2 px-2"style="width:200px" type="date" name="" id="">
                            </div>
                            <div class="col-6 mb-4 d-flex justify-content-between align-items-center">
                                <label for="">Adult</label>
                                <input class="rounded shadow py-2 px-2"style="width:200px" type="number" name="" id="">
                            </div>
                            <div class="col-6 mb-4 d-flex justify-content-between align-items-center">
                                <label for="">Children</label>
                                <input class="rounded shadow py-2 px-2"style="width:200px" type="number" name="" id="">
                            </div>
                            <div class="col-6 mb-4 d-flex justify-content-between align-items-center">
                                <label for="">user name</label>
                                <input class="rounded shadow py-2 px-2"style="width:200px" type="text" name="" id="">
                            </div>
                            <div class="col-6 mb-4 d-flex justify-content-between align-items-center">
                                <label for="">email</label>
                                <input class="rounded shadow py-1 px-2"style="width:200px" type="email" name="" id="">
                            </div>
                            <div class="d-flex justify-content-evenly">
                                <input class="btn btn-primary"style="width:100px" type="reset" name="" id="" value="RESET">
                                <input class="btn btn-primary"style="width:100px" type="submit" name="" id="" value="SEND">
                            </div>
                        </form>
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