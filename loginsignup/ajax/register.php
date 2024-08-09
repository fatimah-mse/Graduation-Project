<?php
    require('../../admin/inc/db_config.php');
    require('../../admin/inc/essentials.php');

    // require('../../inc/sendgrid/sendgrid-php.php');

    // function sendEmail($uemail , $name , $token) {
    //     require '../../vendor/autoload.php'; 
    
    //     $mail = new PHPMailer(true);
    
    //     try {
    //         $mail->SMTPDebug = 2;                                 
    //         $mail->isSMTP();                                      
    //         $mail->Host = 'smtp.mailtrap.io';  
    //         $mail->SMTPAuth = true;                               
    //         $mail->Username = 'fatimah mse';                 
    //         $mail->Password = 'fatimahemail';                           
    //         $mail->SMTPSecure = 'tls';                            
    //         $mail->Port = 587;                                    
        
    //         $mail->setFrom("fatimahmse83@gmail.com" , "fatimah mse");
    //         $mail->addAddress($uemail, $name);     
    
    //         $mail->isHTML(true);                                  
    //         $mail->Subject = "Account Verification Link";
    //         $mail->Body    = "Click The Link To Confirm email: <br>
    //         <a href='".SITE_URL."email_confirm.php?email=$uemail&token=$token"."'>CLICK ME</a>";
    //         $mail->AltBody = "Please click on the link below to verify your account:\n\n". SITE_URL . "email_confirm.php?email=" . urlencode($uemail) . "&token=" . urlencode($token);
    
    //         $mail->send();
    //         return 1; 
    //     } catch (Exception $e) {
    //         return 0;
    //     }
    // }

    if(isset($_POST['register'])) {
        $frm_data = filteration($_POST);
        $data = $frm_data;
    
        if ($data['password'] != $data['ConfirmPassWord']) {
            echo "pass_mismatch";
            // alert ('error' , 'Passwod Mismatch');
            exit;
        }

        $query = "SELECT * FROM `user-cred` WHERE `email`=? AND `phonenumber`=?";
        $params = [[$data['email']] , [$data['phonenumber']]];
        $types = 'ss'; // 's' للعناوين النصية، 'i' للأعداد الصحيحة
        $u_exsit = select($query, $params, $types);

        if(mysqli_num_rows($u_exsit) != 0) {
            $u_exsit_fetch = mysqli_fetch_assoc($u_exsit);
            // التحقق مما إذا كان البريد الإلكتروني موجودًا فقط
            if ($u_exsit_fetch['email'] == $data['email']) {
                echo 'email_already'; // إذا كان البريد الإلكتروني موجودًا بالفعل
            } else {
                echo 'phone_already'; // إذا كان الرقم الهاتفي موجودًا بالفعل
            }
        } 

    
        $token =bin2hex(random_bytes(16));
    
        // if (!sendEmail($data['email'], $data['name'],$token)){
        //     echo "mail_failed";
        //     // alert ('error' , 'Cannot Send Confirmation email, Server Down!');
        //     exit;
        // }
    
        // $enc_pass = password_hash($data['password'], PASSWORD_BCRYPT);
    
        $query = "INSERT INTO `user-cred`(`name`, `address`, `phonenumber`, `PinCode`, `dob`, `password`, `token`, `email`) VALUES (?,?,?,?,?,?,?,?)";
    
        $values = [$data['name'], $data['Address'] , $data['phonenumber'], $data['PinCode'] , $data['date'] , $data['password'], $token ,$data['email']];
    
        if(!insert($query, $values, "ssssssss")) {
            echo 'ins_failed';
            // alert ('error' , 'Failed, Server Down!');
        } else {
            echo 1;
            // alert('success' , 'Successful, Confirm Link Sent To Email!');
        }
    }
?>