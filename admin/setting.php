<?php
    require('inc/essentials.php');
    adminLogin ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Setting</title>
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
                    <h4 class="title mt-3 mb-4">Settings</h4>

                    <!-- general setting section-->
                    <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">general settings</h5>
                                <button type="button" class="btn p-0 ps-2 pe-2" data-bs-toggle="modal" 
                                data-bs-target="#general-s">
                                <i class="icon fa-solid fa-pencil me-1"></i>edit
                                </button>
                            </div>
                            <h6 class="card-subtitle mb-1 fw-bold">site title</h6>
                            <p class="card-text" id="site_title"></p>
                            <h6 class="card-subtitle mb-1 fw-bold">about us</h6>
                            <p class="card-text"  id="site_about"></p>
                        </div>
                    </div>

                    <!-- general setting Modal -->
                    <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" 
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" id="general_s_form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">general setting</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label class="mb-1" for="site_title_inp">site title</label>
                                            <input type="text" name="site-title" id="site_title_inp" class="form-control" required>
                                        </div>
                                        <div class="mb-2">
                                            <label class="mb-1" for="site_about_inp">about us</label>
                                            <textarea name="site-about" id="site_about_inp" rows="6" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="site_title.value = general_data.site_title, 
                                            site_about.value = general_data.site_about" class="btn cancel p-0 ps-2 pe-2" data-bs-dismiss="modal">cancel
                                        </button>
                                        <button type="submit" class="btn submit p-0 ps-2 pe-2">submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                    <!-- Management Team section-->
                    <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">Management Team</h5>
                                <button type="button" class="btn p-0 ps-2 pe-2" data-bs-toggle="modal" 
                                data-bs-target="#team-s">
                                <i class="icon fa-regular fa-plus-square me-1"></i>ADD
                                </button>
                            </div>
                            <div class="row" id="team-data"></div>
                        </div>
                    </div>

                    <!-- shutdown section -->
                    <!-- <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">Shutdown Website</h5>
                                <div class="form-check form-switch">
                                    <form class="shutdown" >
                                        <input onchange="upd_shutdown(this.value)" class="form-check-input bg-cutomer" type="checkbox" id="shutdown-toggle">
                                    </form>
                                </div>
                            </div>
                            <p class="card-text fw-bold">
                                No Customer will be allowed to book hotel room, when shutdow mode is turned on.
                            </p>
                        </div>
                    </div> -->

                    <!-- contact details section -->
                    <div class="card pb-1 mb-3 shadow">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">contacts settings</h5>
                                <button type="button" class="btn p-0 ps-2 pe-2" data-bs-toggle="modal" 
                                data-bs-target="#contacts-s">
                                <i class="icon fa-solid fa-pencil me-1"></i>edit
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">address</h6>
                                        <p class="card-text" id="address"></p>
                                    </div>
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">google map</h6>
                                        <p class="card-text" id="gmap"></p>
                                    </div>
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-2 fw-bold">phone number</h6>
                                        <p class="card-text">
                                            <i class="icon fa-solid fa-phone me-2 fs-4" style="color: var(--yellow)"></i>
                                            <span id="pn"></span>
                                        </p>
                                    </div>
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                                        <p class="card-text" id="email"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h6 class="card-subtitle mb-1 fw-bold">social links</h6>
                                        <p class="card-text">
                                            <i class="icon fa-brands fa-facebook me-2 fs-4" style="color: var(--yellow)"></i>
                                            <span id="fb"></span>
                                        </p>
                                        <p class="card-text">
                                            <i class="icon fa-brands fa-instagram me-2 fs-4" style="color: var(--yellow)"></i>
                                            <span id="insta"></span>
                                        </p>
                                        <p class="card-text">
                                            <i class="icon fa-brands fa-telegram me-2 fs-4" style="color: var(--yellow)"></i>
                                            <span id="tele"></span>
                                        </p>
                                    </div>
                                    <div class="mb-4">
                                            <h6 class="card-subtitle mb-1 fw-bold">iframe</h6>
                                            <iframe id="iframe" class="border p-2 w-100" loading="Lazy"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- contact details Modal -->
                    <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" 
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form method="POST" id="contacts_s_form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">contacts setting</h1>
                                    </div>
                                    <div class="modal-body">

                                        <div class="container-fluid p-0">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label mb-1">address</label>
                                                        <input type="text" name="address" id="address_inp" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label mb-1">google map link</label>
                                                        <input type="text" name="gmap" id="gmap_inp" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="mb-1 form-label">phone number (with country code)</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">
                                                            <i class="icon fa-solid fa-phone me-2 fs-4" style="color: var(--yellow)"></i>
                                                            </span>
                                                            <input type="text" name="pn" id="pn_inp" class="form-control shadow-none" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="mb-1">email</label>
                                                        <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="mb-1">social links</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                            <i class="icon fa-brands fa-facebook me-2 fs-4" style="color: var(--yellow)"></i>
                                                            </span>
                                                            <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                            <i class="icon fa-brands fa-instagram me-2 fs-4" style="color: var(--yellow)"></i>
                                                            </span>
                                                            <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" required>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                            <i class="icon fa-brands fa-telegram me-2 fs-4" style="color: var(--yellow)"></i>
                                                            </span>
                                                            <input type="text" name="tele" id="tele_inp" class="form-control shadow-none" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="mb-1">iframe SRC</label>
                                                        <input type="text" name="iframe" id="iframe_inp" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" onclick="contacts_inp(contacts_data)" class="btn cancel p-0 ps-2 pe-2" data-bs-dismiss="modal">cancel
                                        </button>
                                        <button type="submit" class="btn submit p-0 ps-2 pe-2">submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                    <!-- Management Team Modal -->
                    <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" 
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" id="team_s_form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Team Member</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label class="mb-1" for="site_title_inp">Name</label>
                                            <input type="text" name="member-name" id="member_name_inp" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <label class="mb-1" for="site_about_inp">Picture</label>
                                            <input type="file" name="member-picture" id="member_picture_inp" accept='.jpg,.png' class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn cancel p-0 ps-2 pe-2" data-bs-dismiss="modal">cancel
                                        </button>
                                        <button type="submit" class="btn submit p-0 ps-2 pe-2">submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                    <?php
                   # echo $_SERVER['DOCUMENT_ROOT'];
                    ?>



                </div>
            </div>
        </div>
        
    </div>
    


    <!-- JS File  -->
        <?php require('inc/scripts.php'); ?>

        <script>
            let general_data , contacts_data ;

            let general_s_form = document.getElementById('general_s_form');
            let contacts_s_form = document.getElementById('contacts_s_form');

            let site_title_inp = document.getElementById('site_title_inp');
            let site_about_inp = document.getElementById('site_about_inp');

            // let address_inp = document.getElementById('address_inp');
            // let gmap_inp = document.getElementById('gmap_inp');
            // let pn_inp = document.getElementById('pn_inp');
            // let email_inp = document.getElementById('email_inp');
            // let fb_inp = document.getElementById('fb_inp');
            // let insta_inp = document.getElementById('insta_inp');
            // let tele_inp = document.getElementById('tele_inp');
            // let iframe_inp = document.getElementById('iframe_inp');

            let team_s_form = document.getElementById('team_s_form');
            let member_name_inp = document.getElementById('member_name_inp');
            let member_picture_inp = document.getElementById('member_picture_inp');

            function get_general() {
                let site_title = document.getElementById('site_title');
                let site_about = document.getElementById('site_about');

                let shutdown_toggle = document.getElementById('shutdown-toggle');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/setting_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    general_data = JSON.parse(this.responseText);

                    site_title.innerText = general_data.site_title;
                    site_about.innerText = general_data.site_about;

                    site_title_inp.value = general_data.site_title;
                    site_about_inp.value = general_data.site_about;

                    // if (general_data.shutdown == 0) 
                    // {
                    //     shutdown_toggle.checked = false;
                    //     shutdown_toggle.value = 0;
                    // }
                    // else 
                    // {
                    //     shutdown_toggle.checked = true;
                    //     shutdown_toggle.value = 1;
                    // }
                }

                xhr.send('get_general');

                
            }

            general_s_form.addEventListener('submit' , function (e) {
                e.preventDefault ();
                upd_general(site_title_inp.value ,site_about_inp.value);
            }) ;
            
            function upd_general(site_title_val , site_about_val) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/setting_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {

                    var myModal = document.getElementById('general-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    if(this.responseText ==1)
                    {
                        alert('SUCCESS' , 'Changes Saved!');
                        get_general();
                    }
                    else
                        alert('ERROR' , 'No Changes Made!');
                }
                    xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');
            }

            function upd_shutdown(val){
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/setting_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    
                    if(this.responseText == 1 && general_data.shutdown == 0)
                    {
                        alert('SUCCESS' , 'Site has been Shutdown!');
                    }
                    else
                    {
                        alert('SUCCESS' , 'Shutdown mode off!');
                    }
                    get_general();
                }
                    xhr.send('upd_shutdown='+val);
            }

            function contacts_inp(data) {
                let contacts_inp_id = ['address_inp' , 'gmap_inp' , 'pn_inp' , 'email_inp' ,'fb_inp' , 'insta_inp' , 'tele_inp' , 'iframe_inp' ];

                for (let i=0; i<contacts_inp_id.length; i++) {
                    document.getElementById(contacts_inp_id[i]).value = data[i+1];
                }
            }

            function get_contacts() {

                let contacts_p_id = ['address' , 'gmap' , 'pn' , 'email' ,'fb' , 'insta' , 'tele' ];
                let iframe = document.getElementById('iframe');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/setting_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {

                    contacts_data = JSON.parse(this.responseText);
                    contacts_data = Object.values(contacts_data);
                    
                    // console.log(contacts_data)

                    for (i=0; i<contacts_p_id.length; i++) {
                        document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
                    }
                    iframe.src = contacts_data[8];
                    contacts_inp(contacts_data);
                }

                xhr.send('get_contacts');
            }

            function upd_contacts(address_val, gmap_val, pn_val , email_val, fb_val, insta_val , tele_val , iframe_val) {

                // let index = ['address_val', 'gmap_val', 'pn_val' , 'email_val', 'fb_val', 'insta_val' , 'tele_val' , 'iframe_val'];
                // let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn_inp' , 'email_inp', 'fb_inp', 'insta_inp' , 'tele_inp' , 'iframe_inp'];

                // let data_str = "";

                // for (i=0; i<index.length; i++) {
                //     data_str += index[i] + '=' +document.getElementById(contacts_inp_id[i]).value + '&';
                // }
                // console.log(data_str);

                // data_str += 'upd_contacts';ئئئئ
                

                console.log(address_val, gmap_val, pn_val , email_val, fb_val, insta_val , tele_val , iframe_val);
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/setting_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    var myModal = document.getElementById('contacts-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    if(this.responseText == 1 )
                    {
                        alert('SUCCESS' , 'Changes Saved!');
                        get_contacts();
                    }
                    else
                        alert('ERROR' , 'No Changes Made!');
                }

                // xhr.send();
                
                xhr.send('address_val=' + address_val + '&gmap_val=' + gmap_val + '&pn_val=' + pn_val + '&email_val=' + email_val + '&fb_val=' + fb_val + '&insta_val=' + insta_val + '&tele_val=' + tele_val + '&iframe_val=' + iframe_val + '&upd_contacts');

            }

            contacts_s_form.addEventListener('submit' , function (e) {
                e.preventDefault ();
                // upd_contacts();
                // console.log(address_inp.value , gmap_inp.value , pn_inp.value , email_inp.value , fb_inp.value , insta_inp.value , tele_inp.value , iframe_inp.value);
                upd_contacts(address_inp.value , gmap_inp.value , pn_inp.value , email_inp.value , fb_inp.value , insta_inp.value , tele_inp.value , iframe_inp.value);
            });

            // ============ add members ============ //
            
            team_s_form.addEventListener('submit' , function (e) {
                e.preventDefault ();
                add_member();
            });

            function add_member() {
                let data = new FormData();
                // console.log(member_name_inp.value)
                console.log(member_picture_inp.files[0].name)
                data.append('name' , member_name_inp.value);
                data.append('picture' , member_picture_inp.files[0]);
                data.append('add_member' , '');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/setting_crud.php", true);

                xhr.onload = function () {

                    var myModal = document.getElementById('team-s');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    if(this.responseText =='invalid_image')
                    {
                        alert('ERROR' , 'Only JPG and PNG Allowed!');
                    }
                    else if (this.responseText =='upd_failed') {
                        alert('ERROR' , 'Image Failed!');
                    }
                    else{
                        alert('SUCCESS' , 'New Member Added!');
                        member_name_inp.value=""
                        member_picture_inp.value=""
                        get_member();
                    }
                }
                    xhr.send(data);
            }

            function get_member() {

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/setting_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    document.getElementById('team-data').innerHTML = this.responseText
                }

                xhr.send('get_member');

                
            }

            function rem_member(val) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/setting_crud.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function () {
                    if(this.responseText ==1) {
                        alert('SUCCESS' , 'Member Removed!')
                        get_member()
                    }
                    else {
                        alert('ERROR' , 'Server Down!')
                        // alert('SUCCESS' , 'Member Removed!')
                    }
                }
                xhr.send('rem_member=' + val);
            }


            window.onload = function () {
                get_general();
                get_contacts();
                get_member();
            }
    
        </script>
</body>
</html>