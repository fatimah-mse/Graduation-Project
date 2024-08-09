<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin ();

    if(isset($_POST['add_feature'])) 
    {
        $frm_data = filteration ($_POST);
        $q = "INSERT INTO `features`(`name`) VALUES (?)";
        $values = [$frm_data['name']];
        $res = insert($q, $values, 's');
        echo $res;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_feature'])) {
        $res = selectAll('features');
        $i = 1;
        while ($row = mysqli_fetch_assoc($res)) {
            echo <<<data
            <tr class="text-center">
                <td>$i</td>
                <td>$row[name]</td>
                <td><button type="button" onclick="rem_feature($row[id])" class="btn bg-transparent text-danger"><i class="fa-solid fa-trash-can fa-lg"></i></button></td>
            </tr>
        data;
        $i ++;
        }
    }

    if(isset($_POST['rem_feature'])) 
    {
        $frm_data = filteration ($_POST);
        $values = [$frm_data['rem_feature']];
        $q = "DELETE FROM `features` WHERE `id`=?";
        $res = delete($q, $values, 'i');
        echo $res;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_facility'])) {
        $frm_data = filter_input_array(INPUT_POST, [
            'name' => FILTER_SANITIZE_STRING,
            'desc' => FILTER_SANITIZE_STRING
        ]);
        
        if (!$frm_data || !isset($frm_data['name']) || !isset($frm_data['desc'])) {
            die('Missing required fields');
        }
        $img_r = uploadSVGImage($_FILES['icon'], FACILITISE_FOLDER);
    
        if ($img_r == 'invalid_image') {
            echo $img_r;
        }
        elseif ($img_r == 'upd_failed') {
            echo $img_r;
        }
        else {
            $qq = "INSERT INTO `facilities` (`icon`, `name`, `description`) VALUES(?,?,?)";
            $values = [$img_r, $frm_data['name'], $frm_data['desc']];
            $res = insert($qq, $values, 'sss');
            echo $res;
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_facility'])) {
        $res = selectAll('facilities');
        $i = 1;
        $path = FACILITISE_IMG_PATH ;
        while ($row = mysqli_fetch_assoc($res)) {
            echo <<<data
            <tr class="text-center align-middle">
                <td>$i</td>
                <td><img src="$path$row[icon]" width="60px"/></td>
                <td>$row[name]</td>
                <td width="400px">$row[description]</td>
                <td><button type="button" onclick="rem_facility($row[id])" class="btn bg-transparent text-danger"><i class="fa-solid fa-trash-can fa-lg"></i></button></td>
            </tr>
        data;
        $i ++;
        }
    }

    if(isset($_POST['rem_facility'])) 
    {
        $frm_data = filteration ($_POST);
        $values = [$frm_data['rem_facility']];
        $q = "DELETE FROM `facilities` WHERE `id`=?";
        $res = delete($q, $values, 'i');
        echo $res;
    }
    
?>