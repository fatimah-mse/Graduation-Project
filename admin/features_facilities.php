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
    <title>Admin Panel - Features & Facilities</title>
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
                    <h4 class="title mt-3 mb-4">Features & Facilities</h4>

                    <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">Features</h5>
                                <button type="button" class="btn p-0 ps-2 pe-2" data-bs-toggle="modal" 
                                data-bs-target="#feature-s">
                                <i class="icon fa-regular fa-plus-square me-1"></i>ADD
                                </button>
                            </div>
                            <div class="table-responsive-md" style="min-height: 300px;">
                                <table class="table table-hover border position-relative">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">#</th>
                                            <th class="bg-primary text-light" scope="col">Name</th>
                                            <th class="bg-primary text-light" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="features-data"></tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">Facilities</h5>
                                <button type="button" class="btn p-0 ps-2 pe-2" data-bs-toggle="modal" 
                                data-bs-target="#facility-s">
                                <i class="icon fa-regular fa-plus-square me-1"></i>ADD
                                </button>
                            </div>
                            <div class="table-responsive-md">
                                <table class="table table-hover border position-relative" style="min-height: 300px;">
                                    <thead class="position-sticky top-0">
                                        <tr class="text-center">
                                            <th class="bg-primary text-light" scope="col">#</th>
                                            <th class="bg-primary text-light" scope="col">Icon</th>
                                            <th class="bg-primary text-light" scope="col">Name</th>
                                            <th class="bg-primary text-light" scope="col">Description</th>
                                            <th class="bg-primary text-light" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="facilities-data"></tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>


                    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" 
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" id="feature_s_form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add features</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label class="mb-1" for="feature_name_inp">Name</label>
                                            <input type="text" name="feature-name" id="feature_name_inp" class="form-control" require>
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


                    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" 
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" id="facility_s_form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add facilities</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label class="mb-1" for="facility_name_inp">Name</label>
                                            <input type="text" name="facility-name" id="facility_name_inp" class="form-control" require>
                                        </div>
                                        <div class="mb-2">
                                            <label class="mb-1" for="facility_icon_inp">Icon</label>
                                            <input type="file" name="facility-icon" id="facility_icon_inp" accept='.svg' class="form-control" require>
                                        </div>
                                        <div class="mb-2">
                                            <label class="mb-1" for="facility_desc_inp">Description</label>
                                            <textarea class="w-100 px-2 py-1 rounded" name="facility-desc" id="facility_desc_inp" rows="4" require></textarea>
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
            let feature_s_form = document.getElementById('feature_s_form')
            let facility_s_form = document.getElementById('facility_s_form')
            let feature_name_inp = document.getElementById('feature_name_inp')
            let facility_name_inp = document.getElementById('facility_name_inp')
            let facility_icon_inp = document.getElementById('facility_icon_inp')
            let facility_desc_inp = document.getElementById('facility_desc_inp')

            feature_s_form.addEventListener('submit' , function (e) {
                e.preventDefault ();
                add_feature();
            });

           

            function add_feature() {
                let data = new FormData();
                data.append('name' , feature_name_inp.value);
                data.append('add_feature' , '');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/features_facilities.php", true);
                // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    // console.log(this.responseText);

                    var myModal = document.getElementById('feature-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    if(this.responseText ==1)
                    {
                        alert('SUCCESS' , 'New feature Added!')
                        feature_name_inp.value = ''
                        get_feature();
                    }
                    else{
                        alert('ERROR' , 'Server Down!');
                    }
                }
                    xhr.send(data);
            }

            facility_s_form.addEventListener('submit' , function (e) {
                e.preventDefault ();
                add_facility();
            });

            function add_facility() {
                let data = new FormData();
                data.append('icon' , facility_s_form.elements['facility-icon'].files[0]);
                data.append('name' , facility_s_form.elements['facility-name'].value);
                data.append('desc' , facility_s_form.elements['facility-desc'].value);
                data.append('add_facility' , '');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/features_facilities.php", true);

                xhr.onload = function () {
                    var myModal = document.getElementById('facility-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    if(this.responseText =='invalid_image')
                    {
                        alert('ERROR' , 'Only SVG Allowed!');
                    }
                    else if (this.responseText =='upd_failed') {
                        alert('ERROR' , 'Image Failed!');
                    }
                    else{
                        alert('SUCCESS' , 'New facility Added!');
                        facility_s_form.reset();
                        get_facility()
                    }
                }
                    xhr.send(data);
            }

            function get_feature() {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/features_facilities.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    document.getElementById('features-data').innerHTML = this.responseText
                }

                xhr.send('get_feature');
            }

            function get_facility() {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/features_facilities.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    document.getElementById('facilities-data').innerHTML = this.responseText
                }

                xhr.send('get_facility');
            }

            function rem_feature(val) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/features_facilities.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    if(this.responseText ==1) {
                        alert('SUCCESS' , 'Feature Removed!')
                        get_feature()
                    }
                    else {
                        alert('ERROR' , 'Server Down!')
                    }
                }
                xhr.send('rem_feature=' + val);
            }

            function rem_facility(val) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/features_facilities.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    if(this.responseText ==1) {
                        alert('SUCCESS' , 'Facility Removed!')
                        get_facility()
                    }
                    else {
                        alert('ERROR' , 'Server Down!')
                    }
                }
                xhr.send('rem_facility=' + val);
            }

            window.onload = function () {
                get_feature();
                get_facility();
            }



        </script>
        <?php require('inc/scripts.php'); ?>

        
</html>