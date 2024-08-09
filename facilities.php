<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mse Hotel - Facilities</title>
    <!-- links  -->
        <?php require('inc/links.php'); ?>
    <!-- CSS Files  -->
        <link rel="stylesheet" href="css/facilities.css"/>
    <!-- Favicons -->
        <link rel="shortcut icon" href="imgs/favicon.png" type="image/x-icon">
</head>
<body>
    
    <!-- header  -->
        <?php require('inc/header.php'); ?>
    
    <!-- facilities -->
        <div class="facilities title p-5">
            <h2 class="fw-bold h-font text-center">our facilities</h2>
            <div class="line"></div>
            <p class="txt text-center mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Qui quos autem aperiam <br> ipsum dignissimos voluptates soluta 
                doloribus laborum et consectetur!
            </p>
        </div>
        <div class="facil p-5">
            <div class="container">
                <div class="row d-flex justify-content-evenly">

                    <?php
                        $res = selectAll('facilities');
                        $path = FACILITISE_IMG_PATH ;
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo <<<data
                            <div class="details col-lg-3 col-md-5 m-4 p-4 rounded shadow px-4 text-center" style="height: 300px;">
                                <img class="mb-3" src="$path$row[icon]" width="80px"/>
                                <h5>$row[name]</h5>
                                <p class="text-start">$row[description]</p>
                            </div>
                        data;
                        }
                    ?>
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