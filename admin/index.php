<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <!-- links  -->
        <?php require('inc/links.php'); ?>
    <!-- CSS Files  -->
        <link rel="stylesheet" href="CSS/adminLogin.css"/>
    <!-- Favicons -->
        <link rel="shortcut icon" href="img/admin.png" type="image/x-icon">
</head>
<body>
    <?php
        if(isset($_POST["loginBtn"])) {

            $frm_data = filteration($_POST);
            $quary = "SELECT * FROM `admincred` WHERE `adminName`=? AND `adminPass`=?";
            $values = [$frm_data['adminName'],$frm_data['adminPass']];
            $res = select($quary,$values,"ss");
            if($res -> num_rows == 1){
                $row = mysqli_fetch_assoc($res);
                session_start();
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminId'] = $row['sr_no'];
                redirect('dashboard.php');
            }
            else {
                alert ('ERROR', 'Login Failed - Invalid Credentials!');
            }
        }
    ?>
    <div class="container">
        <form class="admin-login col-lg-6 col-md-8 col-sm-12 p-3 rounded shadow" method ="POST">
            <h3 class="mb-3 text-center">Admin Login Panel</h3>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <i class="icon me-3 fa-solid fa-user"></i>
                <input class="text rounded shadow p-2" type="text" name="adminName" placeholder="Admin Name" required>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <i class="icon me-3 fa-solid fa-key"></i>
                <input class="text rounded shadow p-2" type="password" name="adminPass" placeholder="PassWord" required>
            </div>
            <div class="w-100 text-center">
                <button class="btn ps-3 pe-3" name="loginBtn" type="submit">Login</button>
            </div>
            
        </form>
    </div>

    


    <!-- JS File  -->
        <?php require('inc/scripts.php'); ?>

</body>
</html>