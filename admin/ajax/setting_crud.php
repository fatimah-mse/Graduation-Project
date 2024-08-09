<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin ();

    if(isset($_POST['get_general']))
    {
        $q = "SELECT * FROM `settings` WHERE `sr_no`=? " ;
        $values = [1];
        $res = select($q, $values , "i");
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encode($data);
        echo $json_data;
    }

    if(isset($_POST['upd_general'])) 
    {
        $frm_data = filteration ($_POST);
        $qq = "UPDATE `settings` SET `site_title`=?,`site_about`=? WHERE `sr_no`=? ";
        $values = [$frm_data['site_title'],$frm_data['site_about'],1];
        $res = update ($qq,$values,'ssi');
        echo $res;
    }

    if(isset($_POST['upd_shutdown'])) 
    {
        $frm_data = ($_POST['upd_shutdown'] == 0 ) ? 1 : 0;
        $qq = "UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=? ";
        $values = [$frm_data,1];
        $res = update ($qq,$values,'ii');
        echo $res;
    }

    if(isset($_POST['get_contacts']))
    {
        $q = "SELECT * FROM `contact-details` WHERE `sr_no`=? " ;
        $values = [1];
        $res = select($q, $values , "i");
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encode($data);
        echo $json_data;
    }

    if(isset($_POST['upd_contacts']))
    {
        // $add=$_POST['address'];
        // $map=$_POST['gmap'];
        // $pn=$_POST['pn'];
        // $email=$_POST['email'];
        // $fb=$_POST['fb'];
        // $insta=$_POST['insta'];
        // $tele=$_POST['tele'];
        // $iframe=$_POST['iframe'];
        // $q = "UPDATE `contact-details` SET `address`=$add,
        // `gmap`=$map,`pn`=$pn,`email`=$email,`fb`=$fb,
        // `insta`=$insta,`tele`=$tele,`iframe`=$iframe" ;
        // mysqli_query($connect,$q);

        $frm_data = filteration ($_POST);
        $q = "UPDATE `contact-details` SET `address`=?,`gmap`=?,`pn`=?,`email`=?,`fb`=?,`insta`=?,`tele`=?,`iframe`=? WHERE `sr_no`=1" ;
        $values = [$frm_data['address_val'],$frm_data['gmap_val'],$frm_data['pn_val'],$frm_data['email_val'],$frm_data['fb_val'],$frm_data['insta_val'],$frm_data['tele_val'],$frm_data['iframe_val'],1];
        $res = update($q,$values,'ss');
        echo $res;
    }
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_member'])) {
        $frm_data = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $img_r = uploadImage($_FILES['picture'], ABOUT_FOLDER);
    
        if ($img_r == 'invalid_image') {
            echo $img_r;
        }
        elseif ($img_r == 'upd_failed') {
            echo $img_r;
        }
        else {
            $q = "INSERT INTO `team-details`(`name`, `picture`) VALUES(?,?)";
            $values = [$frm_data, $img_r];
            $res = insert($q, $values, 'ss');
            echo $res;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_member'])) {
        $res = selectAll('team-details');
        while ($row = mysqli_fetch_assoc($res)) {
            $path = ABOUT_IMG_PATH;
            // echo "{$path}{$row['picture']}";
            echo <<<data
            <div class="col-4 col-md-2 mb-2">
                <div class="card bg-dark text-white position-relative border-1" style="height: 300px;" id="mem">
                    <img class="img-fluid h-100 w-100" src=" $path{$row['picture']}" style="object-fit: cover;">
                    <div class="card-img-overlay">
                        <button type="button" onclick="rem_member($row[sr_no])" class="btn shadow-none" style="position: absolute; !important; left: 6px !important; top: 6px !important;"><i class="fa-solid fa-trash"></i></button>
                    </div>
                    <p class="card-text text-center w-100 bg-dark text-light px-2 py-1 text-capitalize">{$row['name']}</p>
                </div>
            </div>
    data;
        }
    }

    if(isset($_POST['rem_member'])) 
    {
        $frm_data = filteration ($_POST);
        $values = [$frm_data['rem_member']];
        $q = "DELETE FROM `team-details` WHERE `sr_no`=?";
        $res = delete($q, $values, 'i');
        echo $res;
    }
    
    
    
?>