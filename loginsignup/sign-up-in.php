<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Register</title>
    <!-- CSS Files -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/style-login-signup.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <!-- font files  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Favicons -->
        <link rel="shortcut icon" href="imgs/user-plus_1.png" type="image/x-icon">
</head>

<body>
    <div class="container wrapper box" id="box">
        
        <div class="sign-up mt-lg-0 mb-lg-0 mt-5 mb-5 ps-lg-1 pe-lg-1" id="reg">
            <div class="row">
                <div class="intro col-lg-5 col-md-12">
                    <h3 class="ms-0 m-4 ps-lg-2 pb-5 text-white">Welcome Back!</h3>
                    <p class="disc ms-1 ps-1 m-5 mb-0">register with your personal details to use all of site features</p>
                    <p class="link ps-1 p-4 ms-0 m-5 mb-0 text-white">do you have an account?
                        <br>
                        <a class="btn signIn-link mt-3 ps-3 pe-3" href="#">Sign in</a>
                </div>
                <div class="form col-lg-7 col-md-12 text-center">
                    <h2 class="text-center mt-3 mb-3">create account</h2>
                    <form action="sign-up-in.php" id='register-form' method="post">
                        <div class="row ps-5 pe-5">
                            <div class="col-md-12 col-lg-6 mb-3">
                                <i class="icon me-3 fa-solid fa-user"></i>
                                <input class="text rounded shadow p-2" type="text" name="name" placeholder="UserName" required>
                            </div>
                            <div class="col-md-12 col-lg-6 mb-3">
                                <i class="icon me-3 fa-solid fa-at"></i>
                                <input class="text rounded shadow p-2" type="email" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="col-md-12 col-lg-6 mb-3">
                                <i class="icon me-3 fa-solid fa-mobile-screen"></i>
                                <input class="text rounded shadow p-2" type="text" name="phonenumber" placeholder="PhoneNumber" required>
                            </div>
                            <div class="dateofbirth col-md-12 col-lg-6 mb-3">
                                <i class="icon fa-solid fa-calendar-days"></i>
                                <label class="fw-bold me-2" style="color: var(--dark-blue);">Birth</label>
                                <input class=" text rounded shadow p-2" type="date" name="date" required style="width: 60% !important;">
                            </div>
                            <div class="col-md-12 col-lg-6 mb-3">
                                <i class="icon me-3 fa-solid fa-qrcode"></i>
                                <input class="text rounded shadow p-2" type="text" name="PinCode" placeholder="PinCode" required>
                            </div>
                            <div class="col-md-12 col-lg-6 mb-3">
                                <i class="icon me-3 fa-solid fa-location-dot"></i>
                                <input class="text rounded shadow p-2" type="text" name="Address" placeholder="Address" required>
                            </div>
                            <div class="col-md-12 col-lg-6 mb-3">
                                <i class="icon me-3 fa-solid fa-key"></i>
                                <input class="text rounded shadow p-2" type="password" name="password" placeholder="PassWord" required>
                            </div>
                            <div class="col-md-12 col-lg-6 mb-3">
                                <i class="icon me-3 fa-solid fa-check-double"></i>
                                <input class="text rounded shadow p-2" type="password" name="ConfirmPassWord" placeholder="ConfirmPassWord" required>
                            </div>
                            <div class="col-lg-12 mt-3 mb-3 d-flex justify-content-evenly">
                                <input class="reset button shadow p-1 ps-3 pe-3" type="reset" value="RESET">
                                <button type="submit" name="register" class="button shadow p-1 ps-3 pe-3">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="sign-in mt-lg-0 mb-lg-0 mt-5 mb-5 ps-lg-1 pe-lg-1" id="login">
            <div class="row">
                <div class="intro col-lg-5 col-md-12">
                    <h3 class="ms-0 m-4 ps-lg-2 pb-5 text-white">hello friend!</h3>
                    <p class="disc pb-5 ms-1 ps-1 m-5 mb-0">Enter your personal details to use all of site features</p>
                    <p class="link ps-1 ms-0 p-4 mb-3 text-white">don't have an account?
                        <br>
                        <a class="btn signUp-link mt-4 mb-3 ps-3 pe-3" href="#">Sign up</a>
                </div>
                <div class="form col-lg-7 col-md-12 text-center">
                    <h2 class="text-center mt-3 mb-3">Login</h2>
                    <form action="">
                        <div class="row ps-5 pe-5">
                            <div class="col-lg-12 mb-3">
                                <i class="icon me-3 fa-solid fa-at"></i>
                                <input class="text rounded shadow p-2" type="email" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <i class="icon me-3 fa-solid fa-key"></i>
                                <input class="text rounded shadow p-2" type="password" name="password" placeholder="PassWord" required>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <i class="icon fa-solid fa-question"></i>
                                <i class="icon me-3 fa-solid fa-exclamation"></i>
                                <a class="text-decoration-none fw-bold" href="#">Forget PassWord</a>
                              </div>
                            <div class="col-lg-12 mt-3 mb-3 d-flex justify-content-evenly">
                                <button class="button signup shadow p-1 ps-3 pe-3">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script-login-signup.js"></script><script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="JS/bootstrap.bundle.min.js"></script>
    <script src="JS/all.min.js"></script>


    <script>
        function alert (type , msg) {
            let bs_class = (type == 'SUCCESS') ? 'alert-success' : 'alert-danger';
            let element = document.createElement('div');
            
            element.innerHTML=`<div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert" 
            style="top:20px; position: fixed; z-index-4; right: 18px; width: 50%; font-family: 'Edu VIC WA NT Beginner', cursive;">
            <strong class="me-3"> ${msg} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;

            document.body.append(element);
        }

        let register_form = document.getElementById('register-form')

        register_form.addEventListener('submit' , (e) => {
            e.preventDefault ();
            // reg() 

            let data = new FormData();
            data.append('name', register_form.elements['name'].value);
            data.append('email', register_form.elements['email'].value);
            data.append('phonenumber', register_form.elements['phonenumber'].value);
            data.append('date', register_form.elements['date'].value);
            data.append('PinCode', register_form.elements['PinCode'].value);
            data.append('Address', register_form.elements['Address'].value);
            data.append('password', register_form.elements['password'].value);
            data.append('ConfirmPassWord', register_form.elements['ConfirmPassWord'].value);
            
            data.append('register', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/register.php", true);

            xhr.onload = function () {
                if(this.responseText == 'pass_mismatch') {
                    alert ('ERROR' , 'Passwod Mismatch');
                }
                else if (this.responseText == 'ins_failed'){
                    alert ('ERROR' , 'Failed, Server Down!')
                }
                else {
                    alert('SUCCESS' , 'Successful, Confirm Link Sent To Email!')
                    register_form.reset()
                }
                
            }
                xhr.send(data);
        
    });

    </script>

    

</body>
</html>
