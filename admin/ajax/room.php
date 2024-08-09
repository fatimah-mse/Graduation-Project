<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin ();

    if(isset($_POST['add_room'])) 
    {
        $frm_data = filteration ($_POST);
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));
        $flag = 0;

        $q = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
        $values = [$frm_data['name'],$frm_data['area'],$frm_data['price'],$frm_data['quantity'],$frm_data['adult'],$frm_data['children'],$frm_data['desc']];

        if (insert($q, $values, 'siiiiis')) {
            $flag = 1;
        }

        $room_id = mysqli_insert_id($connect);
        $q2 = "INSERT INTO `room-facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

        if ($stmt = mysqli_prepare($connect, $q2)) {
            foreach($facilities as $f) {
               mysqli_stmt_bind_param($stmt,"ii",$room_id,$f); 
               mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
            
        }
        else {
            $flag = 0;
            die('Query cannot be prepared - Select');
        }

        $q3 = "INSERT INTO `room-features`(`room_id`, `features_id`) VALUES (?,?)";

        if ($stmt = mysqli_prepare($connect, $q3)) {
            foreach($features as $f) {
               mysqli_stmt_bind_param($stmt,"ii",$room_id,$f); 
               mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
            
        }
        else {
            $flag = 0;
            die('Query cannot be prepared - Select');
        }
        

        if($flag) {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_all_rooms'])) {
        $res = selectAll('rooms');
        $i = 1;
        while ($row = mysqli_fetch_assoc($res)) {

            if($row['status'] == 1) {
                $status = "<button type='button' onclick='toggleStatus($row[id],0)' class='btn bg-success text-light '>Active</button>";
            }
            else {
                $status = "<button type='button' onclick='toggleStatus($row[id],1)' class='btn bg-danger text-light'>In-Active</button>";
            }

            echo <<<data
            <tr class="text-center align-middle">
                <td>$i</td>
                <td>$row[name]</td>
                <td>$row[area]</td>
                <td>
                    <span class="badge rounded-pill text-wrap text-dark">Adult: $row[adult]</span>
                    <br/>
                    <span class="badge rounded-pill text-wrap text-dark">Children: $row[children]</span>
                </td>
                <td>$row[price]</td>
                <td>$row[quantity]</td>
                <td>$status</td>
                <td width="180px">
                    <button type="button" onclick="edit_room($row[id])" class="btn bg-transparent" data-bs-toggle="modal" data-bs-target="#edit-room">
                        <i class="text-warning fa-solid fa-pencil-square fa-xl"></i>
                    </button>
                    <button type="button" class="btn bg-transparent">
                        <i class="text-danger fa-solid fa-trash-can fa-xl"></i>
                    </button>
                </td>
            </tr>
        data;
        $i ++;
        }
    }

    if(isset($_POST['toggleStatus'])) 
    {
        $frm_data = filteration ($_POST);
        $values = [$frm_data['value'],$frm_data['toggleStatus']];
        $q = "UPDATE `rooms` SET `status`=? WHERE `id`=?";
        if (update($q, $values, 'ii')) {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    if(isset($_POST['get_room'])) 
    {
        $frm_data = filteration ($_POST);
        $res1 = select("SELECT * FROM `rooms` WHERE `id` =?",[$frm_data['get_room']] , 'i');
        $res2 = select("SELECT * FROM `room-features` WHERE `room_id` =?",[$frm_data['get_room']] , 'i');
        $res2 = select("SELECT * FROM `room-facilities` WHERE `room_id` =?",[$frm_data['get_room']] , 'i');

        $roomdata = mysqli_fetch_assoc($res1);
        $features =[];
        $facilities =[];

        if (mysqli_fetch_assoc($res2)>0) {
            while ($row = mysqli_fetch_assoc($res2)) {
                array_push($features, $row['features_id']);
            }
        }

        if (mysqli_fetch_assoc($res3)>0) {
            while ($row = mysqli_fetch_assoc($res3)) {
                array_push($facilities, $row['facilities_id']);
            }
        }

        $data = ["roomdata" => $roomdata, "features" => $features , "facilities" => $facilities];
        $data = json_encode($data);

        echo $data;
    }
    
?>