<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rooms</title>
    <!-- CSS File -->
        <link rel="stylesheet" href="CSS/adminPanel.css">
    <!-- links  -->
        <?php require('inc/links.php'); ?>
    <!-- Favicons -->
        <link rel="shortcut icon" href="img/admin.png" type="image/x-icon">

</head>
<body>
    <div class="admin">

        <?php require('inc/header.php'); ?>

        <!-- main content -->
        <div class="container-fluid" id="main-content">
            <div class="row">
                <div class="col-lg-10 ms-auto p-3 overflow-hidden">
                    <h4 class="title mt-3 mb-4">Rooms</h4>

                    <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <button type="button" class="btn p-0 ps-2 pe-2 ms-auto" data-bs-toggle="modal" 
                                data-bs-target="#add-room">
                                <i class="icon fa-regular fa-plus-square me-1"></i>ADD
                                </button>
                            </div>
                            <div class="table-responsive-lg" style="min-height: 360px;">
                                <table class="table table-hover border position-relative">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">#</th>
                                            <th class="bg-primary text-light" scope="col">Name</th>
                                            <th class="bg-primary text-light" scope="col">Area</th>
                                            <th class="bg-primary text-light" scope="col">Guests</th>
                                            <th class="bg-primary text-light" scope="col">Price</th>
                                            <th class="bg-primary text-light" scope="col">Quantity</th>
                                            <th class="bg-primary text-light" scope="col">Status</th>
                                            <th class="bg-primary text-light" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="room-data"></tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>


                    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" 
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form method="POST" id="add_room_form" autocomplete="off">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Room</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="name_imp">Name</label>
                                                <input type="text" name="name" id="name_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="area_imp">Area</label>
                                                <input type="text" name="area" id="area_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="price_imp">Price</label>
                                                <input type="number" name="price" id="price_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="quantity_imp">Quantity</label>
                                                <input type="number" name="quantity" id="quantity_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="adult_imp">Adult (Max.)</label>
                                                <input type="number" name="adult" id="adult_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="children_imp">Children (Max.)</label>
                                                <input type="number" name="children" id="children_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-12 mt-4 mb-2">
                                                <label class="mb-1 text-primary">Features</label>
                                                <div class="row">
                                                    <?php
                                                        $res = selectAll('features');
                                                        while ($opt = mysqli_fetch_assoc($res)) {
                                                            echo "
                                                            <div class='col-md-3 mb-1'>
                                                                <input type='checkbox' name='features' value='$opt[id]' class='shadow-none'>
                                                                <label class='ms-1'>$opt[name]</label>
                                                            </div>
                                                            ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4 mb-2">
                                                <label class="mb-1 text-primary">Facilities</label>
                                                <div class="row">
                                                    <?php
                                                        $res = selectAll('facilities');
                                                        while ($opt = mysqli_fetch_assoc($res)) {
                                                            echo "
                                                            <div class='col-md-3 mb-1'>
                                                                <input type='checkbox' name='facilities' value='$opt[id]' class='shadow-none'>
                                                                <label class='ms-1'>$opt[name]</label>
                                                            </div>
                                                            ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4 mb-2">
                                                <label class="mb-1 text-primary" for="desc_inp">Description</label>
                                                <textarea class="w-100 px-2 py-1 rounded" name="desc" id="desc_inp" rows="4" require></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn cancel p-0 ps-2 pe-2" data-bs-dismiss="modal">cancel
                                        </button>
                                        <button type="submit" class="btn submit p-0 ps-2 pe-2">submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" 
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form method="POST" id="edit_room_form" autocomplete="off">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Room</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="name_imp">Name</label>
                                                <input type="text" name="name" id="name_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="area_imp">Area</label>
                                                <input type="text" name="area" id="area_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="price_imp">Price</label>
                                                <input type="number" name="price" id="price_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="quantity_imp">Quantity</label>
                                                <input type="number" name="quantity" id="quantity_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="adult_imp">Adult (Max.)</label>
                                                <input type="number" name="adult" id="adult_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="mb-1" for="children_imp">Children (Max.)</label>
                                                <input type="number" name="children" id="children_inp" class="form-control" require>
                                            </div>
                                            <div class="col-md-12 mt-4 mb-2">
                                                <label class="mb-1 text-primary">Features</label>
                                                <div class="row">
                                                    <?php
                                                        $res = selectAll('features');
                                                        while ($opt = mysqli_fetch_assoc($res)) {
                                                            echo "
                                                            <div class='col-md-3 mb-1'>
                                                                <input type='checkbox' name='features' value='$opt[id]' class='shadow-none'>
                                                                <label class='ms-1'>$opt[name]</label>
                                                            </div>
                                                            ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4 mb-2">
                                                <label class="mb-1 text-primary">Facilities</label>
                                                <div class="row">
                                                    <?php
                                                        $res = selectAll('facilities');
                                                        while ($opt = mysqli_fetch_assoc($res)) {
                                                            echo "
                                                            <div class='col-md-3 mb-1'>
                                                                <input type='checkbox' name='facilities' value='$opt[id]' class='shadow-none'>
                                                                <label class='ms-1'>$opt[name]</label>
                                                            </div>
                                                            ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4 mb-2">
                                                <label class="mb-1 text-primary" for="desc_inp">Description</label>
                                                <textarea class="w-100 px-2 py-1 rounded" name="desc" id="desc_inp" rows="4" require></textarea>
                                            </div>
                                            <input type="hidden" name="room-id">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn cancel p-0 ps-2 pe-2" data-bs-dismiss="modal">cancel
                                        </button>
                                        <button type="submit" class="btn submit p-0 ps-2 pe-2">submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>


                    

                </div>
            </div>
        </div>
        
    </div>
    


    <!-- JS File  -->
        <script>
            let add_room_form = document.getElementById('add_room_form')

            add_room_form.addEventListener('submit' , function (e) {
                e.preventDefault ();
                add_room();
            });

           

            function add_room() {
                let data = new FormData();
                data.append('add_room', '');
                data.append('name', add_room_form.elements['name'].value);
                data.append('area', add_room_form.elements['area'].value);
                data.append('price', add_room_form.elements['price'].value);
                data.append('quantity', add_room_form.elements['quantity'].value);
                data.append('adult', add_room_form.elements['adult'].value);
                data.append('children', add_room_form.elements['children'].value);
                data.append('desc', add_room_form.elements['desc'].value);

                let features = [];
                let facilities = [];

                add_room_form.elements['features'].forEach(e => {
                    if(e.checked) {
                        features.push(e.value);
                    }
                });

                add_room_form.elements['facilities'].forEach(e => {
                    if(e.checked) {
                        facilities.push(e.value);
                    }
                });

                data.append('features', JSON.stringify(features));
                data.append('facilities', JSON.stringify(facilities));

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/room.php", true);

                xhr.onload = function () {
                    var myModal = document.getElementById('add-room');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    if(this.responseText == 1) {
                        alert('SUCCESS', 'New Room Added!');
                        add_room_form.reset();
                        get_all_rooms()
                    } else {
                        alert('ERROR', 'Server Down!');
                    }
                };
                xhr.send(data);
            }


            function get_all_rooms() {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/room.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    document.getElementById('room-data').innerHTML = this.responseText
                }

                xhr.send('get_all_rooms');
            }

            function toggleStatus(id,val) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/room.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    if(this.responseText == 1) {
                        alert('SUCCESS', 'Status Toggled!');
                        get_all_rooms();
                    } else {
                        alert('ERROR', 'Server Down!');
                    }
                }

                xhr.send('toggleStatus='+id+'&value='+val);
            }

            let edit_room_form = document.getElementById('edit_room_form');

            function edit_room() {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/room.php", true);

                xhr.onload = function () {
                    
                };
                xhr.send('get_room='+id);
            }

            

            window.onload = function () {
                get_all_rooms();
            }



        </script>
        <?php require('inc/scripts.php'); ?>

        
</html>