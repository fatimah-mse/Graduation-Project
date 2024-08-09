<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mse Hotel - Contact</title>
    <!-- links  -->
        <?php require('inc/links.php'); ?>
    <!-- CSS Files  -->
        <link rel="stylesheet" href="css/contact.css"/>
    <!-- Favicons -->
        <link rel="shortcut icon" href="imgs/favicon.png" type="image/x-icon">
</head>
<body>
    
    <!-- header  -->
        <?php require('inc/header.php'); ?>

    <!-- contact -->
        <div class="title p-5">
            <h2 class="fw-bold h-font text-center">Rating</h2>
            <div class="line"></div>
            <p class="txt text-center mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Qui quos autem aperiam <br> ipsum dignissimos voluptates soluta 
                doloribus laborum et consectetur!
            </p>
        </div>

        <?php
            
        ?>
        <div class="contact">
            <div class="container">
                <div class="row d-flex justify-content-evenly px-lg-0 px-md-0 px-4 py-3">
                    
                <?php if(isset($_POST['send'])) 
                        {
                            $frm_data = filteration ($_POST);
                            $q = "INSERT INTO `rating`(`name`, `rating`) VALUES (? , ?)";
                            $values = [$frm_data['name'], $frm_data['rating']];
                            $res = update($q,$values,'ss');
                            if ($res == 1) {
                                alert('success' , 'Rating Sent!');
                                $frm_data['name']='';
                                $frm_data['rating']='';
                            }
                            else {
                                alert('ERROR' , 'Server Down! Try Again Later. ');
                            }
                        } 
                    ?> 

                    <div class="form col-12 mt-4 mb-4 p-4 rounded shadow px-4 d-flex justify-content-between">
                        <img src="imgs/rating.svg" style="height: 400px;">
                        <form method="POST" style="width: 600px;">
                            <div class="mt-3 d-flex justify-content-evenly align-items-center">
                                <i class="icon me-3 fa-solid fa-user"></i>
                                <input class="text rounded shadow p-2" type="text" name="name" placeholder="UserName" required>
                            </div>
                            <div class="mt-3 d-flex justify-content-evenly align-items-center">
                                <i class="icon me-3 fa-solid fa-message"></i>
                                <textarea class="rounded shadow p-2" name="rating" rows="6" placeholder="The Message"></textarea>
                            </div>
                            <div class="mt-4 d-flex justify-content-evenly align-items-center">
                                <input class="button reset shadow ps-3 pe-3" type="reset" value="RESET">
                                <button type="submit" name="send" class="button signup shadow pt-1 ps-3 pe-3">send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            
        ?>

    <!-- footer  -->
        <?php require('inc/footer.php'); ?>

    <!-- JS files  -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/all.min.js"></script>


  
</body>
</html>