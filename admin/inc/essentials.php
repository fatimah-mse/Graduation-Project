<?php

    define('SITE_URL', 'http://127.0.0.1/BookingSys');
    define('ABOUT_IMG_PATH', SITE_URL.'/imgs/about/');
    define('FACILITISE_IMG_PATH', SITE_URL.'/imgs/facilities/');

    define('UPLEAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/BookingSys/imgs/');
    define('ABOUT_FOLDER', 'about/');
    define('FACILITISE_FOLDER', 'facilities/');



    define('API_KEY', 'SG.Nq5jKLk5TOO1JJ_WeMMK8g.EwhejpWWWIIRpLifJbFeQxfklJ1ghkLno9gh4SKr8');

    function adminLogin (){
        session_start();
        if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true ))
        {
            header ("location : index.php");
            echo "<script>window.location.href='index.php';</script>";
            exit ;
        }
        // session_regenerate_id(true);
    }

    function redirect($url) {
        echo "<script>window.location.href='$url';</script>";
        exit ;
    }

    function alert ($type,$msg){
        $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
        echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert " role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }

    function uploadImage($image, $folder) {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];

        if(!in_array($img_mime, $valid_mime)) {
            return 'invalid_image';
        }
        else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            
            $rname = $image['name'];
    
            $image_path = UPLEAD_IMAGE_PATH . $folder . $rname;
            if (move_uploaded_file($image['tmp_name'], $image_path)) {
                return $rname;
            }
            else {
                return 'upd_failed';
            }
        }
    }

    function DeleteImage($image, $folder) {

        if(unlink(UPLEAD_IMAGE_PATH . $folder . $image)) {
            return true;
        }
        else {
            return false;
        }
    }

    function uploadSVGImage($image, $folder) {
        $valid_mime = ['image/svg+xml'];
        $img_mime = $image['type'];

        if(!in_array($img_mime, $valid_mime)) {
            return 'invalid_image';
        }
        else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            
            $rname = $image['name'];
    
            $image_path = UPLEAD_IMAGE_PATH . $folder . $rname;
            if (move_uploaded_file($image['tmp_name'], $image_path)) {
                return $rname;
            }
            else {
                return 'upd_failed';
            }
        }
    }
?>