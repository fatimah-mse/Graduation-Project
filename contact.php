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
            <h2 class="fw-bold h-font text-center">contact us</h2>
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
                <div class="row d-flex justify-content-evenly px-lg-0 px-md-0 px-4">
                    <div class="map col-lg-5 col-md-5 mt-4 mb-4 p-3 rounded shadow py-4 ny-3">
                        <iframe class="w-100 rounded mb-3" height="300" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26030.58455680879!2d35.90898494981247
                            !3d35.36003700159032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1523fe3a68bf33eb%3A0xe07
                            c09df6304fdfe!2sJableh%2C%20Syria!5e0!3m2!1sen!2s!4v1698349715790!5m2!1sen!2s" loading="lazy">
                        </iframe>
                        <h5>address</h5>
                        <a href="https://maps.app.goo.gl/y8UBmhb4tKtMbDCG8" target="_blank">
                            <i class="icon me-3 fa-solid fa-location-dot"></i>jableh latakia syria
                        </a>
                        <h5 class="mt-3">Call Us</h5>
                        <a href="tel: +963981944215">
                            <i class="icon fa-solid fa-phone me-2"></i>+963 981 944 215
                        </a>
                        <h5 class="mt-3">email</h5>
                        <a href="mailto: fatimahmse83@gmail.com" target="_blank">
                            <i class="icon me-3 fa-solid fa-at"></i>fatimah mse
                        </a>
                        <h5 class="mt-3">Follow Us</h5>
                        <a href="https://www.facebook.com/fatimah.mse.750983" target="_blank">
                        <i class="icon fa-brands fa-facebook me-2"></i></a>
                        <a href="https://www.instagram.com/fatimahmse?igshid=NzZIODkYWE$Ng==" target="_blank">
                        <i class="icon fa-brands fa-instagram me-2"></i></a>
                        <a href="https://t.me/FatimahMse" target="_blank">
                        <i class="icon fa-brands fa-telegram me-2"></i></a>
                    </div>
                    <div class="form col-lg-5 col-md-5 mt-4 mb-4 p-4 rounded shadow px-4">
                        <form method="POST" class="mb-5">
                            <h5>send a message</h5>
                            <div class="mt-3 d-flex justify-content-evenly align-items-center">
                                <i class="icon me-3 fa-solid fa-user"></i>
                                <input class="text rounded shadow p-2" type="text" name="name" placeholder="UserName" required>
                            </div>
                            <div class="mt-3 d-flex justify-content-evenly align-items-center">
                                <i class="icon me-3 fa-solid fa-at"></i>
                                <input class="text rounded shadow p-2" type="email" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="mt-3 d-flex justify-content-evenly align-items-center">
                                <i class="icon me-3 fa-regular fa-face-grin-wide"></i>
                                <input class="text rounded shadow p-2" type="text" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="mt-3 d-flex justify-content-evenly align-items-center">
                                <i class="icon me-3 fa-solid fa-message"></i>
                                <textarea class="rounded shadow p-2" name="message" rows="1" placeholder="The Message"></textarea>
                            </div>
                            <div class="mt-4 d-flex justify-content-evenly align-items-center">
                                <input class="button reset shadow ps-3 pe-3" type="reset" value="RESET">
                                <button type="submit" name="send" class="button signup shadow pt-1 ps-3 pe-3">send</button>
                            </div>
                        </form>
                        <?php if(isset($_POST['send'])) 
                        {
                            $frm_data = filteration ($_POST);
                            $q = "INSERT INTO `user-quaries`(`name`, `email`, `subject`, `message`) VALUES (? , ? , ? , ?)";
                            $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];
                            $res = update($q,$values,'ssss');
                            if ($res == 1) {
                                alert('success' , 'Mail Sent!');
                                $frm_data['name']='';
                                $frm_data['email']='';
                                $frm_data['subject']='';
                                $frm_data['message']='';
                            }
                            else {
                                alert('ERROR' , 'Server Down! Try Again Later. ');
                            }
                        } ?> 
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