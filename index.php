<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mse Hotel - Home</title>
    <!-- links  -->
      <?php require('inc/links.php'); ?>
    <!-- Favicons -->
      <link rel="shortcut icon" href="imgs/favicon.png" type="image/x-icon">
</head>
<body>
   
    <!-- header  -->
      <?php require('inc/header.php'); ?>
    <!-- landing -->
      <div class="landing">
        <div class="swiper mySwiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img class="img-fluid col-lg-12" src="imgs/carousel/1.jpg" />
            </div>
            <div class="swiper-slide">
              <img class="img-fluid col-lg-12" src="imgs/carousel/2.jfif" />
            </div>
            <div class="swiper-slide">
              <img class="img-fluid col-lg-12" src="imgs/carousel/3.jpg" />
            </div>
            <div class="swiper-slide">
              <img class="img-fluid col-lg-12" src="imgs/carousel/4.jfif" />
            </div>
            <div class="swiper-slide">
              <img class="img-fluid col-lg-12" src="imgs/carousel/5.jpg" />
            </div>
          </div>
        </div>
      </div>
    <!-- check availability form -->
      <div class="container booking pt-3 pb-3 shadow">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center align-items-center">
            <h2>Welcome to 5<i class="fa-solid fa-star ms-2 me-2"></i>Hotel</h2>
          </div>
          <div class="col-lg-12 d-flex justify-content-center align-items-center">
            <h6>check booking availability</h6>
          </div>
          <form class="form-booking mt-1">
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center mt-2">
                <label class="form-lable">ckeck-in</label>
                <input type="date" name="date" class="form-control shadow-none">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center mt-2">
                <label class="form-lable">ckeck-out</label>
                <input type="date" name="date" class="form-control shadow-none">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-2 d-flex justify-content-center align-items-center mt-2">
                <label class="form-lable">Adult</label>
                <select class="form-select shadow-none">
                  <option selected>Open & Select</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                  <option value="4">Four</option>
                  <option value="5">Five</option>
                  <option value="6">Six</option>
                </select>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center mt-2">
                <label class="form-lable">Children</label>
                <select class="form-select shadow-none">
                  <option selected>Open & Select</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                  <option value="4">Four</option>
                  <option value="5">Five</option>
                  <option value="6">Six</option>
                </select>
              </div>
              <div class="col-md-12 col-lg-1 mt-2 d-flex justify-content-center align-items-center">
              <button type="submit" class="btn">Submit</button>
            </div>
          </div>
            
          </form>
        </div>
      </div>
    <!-- Rooms -->
      <div class="Rooms mt-1" id="rms">
        <h2 class="pt-3 mb-2 text-center fw-bold h-font">Our Rooms</h2>
        <div class="container">
          <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <?php
              $room_res= select ("SELECT * FROM `rooms` WHERE `status`=?", [1], 'i');
              while ($room_data = mysqli_fetch_assoc($room_res)) {

                  $fea_q = mysqli_query($connect, "SELECT f.name FROM `features` f INNER JOIN `room-features` rfea ON f.id = rfea.features_id WHERE rfea.room_id ='$room_data[id]'");
                  $fac_q = mysqli_query($connect, "SELECT f.name FROM `facilities` f INNER JOIN `room-facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id ='$room_data[id]'");
                  
                  $features_data ="";
                  $facilities_data ="";

                  while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                      $features_data .= "<span class='mx-2'>$fea_row[name]</span>";
                  }

                  while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                      $facilities_data .= "<span class='mx-2'>$fac_row[name]</span>";
                  }

                  echo <<< data
                    <div class="col-lg-4 col-md-6 py-3 ny-3">
                      <div class="card border-0 shadow">
                        <img src="imgs/room/room_1.jpg" class="card-img-top img-fluid" style="height:200px;" >
                        <div class="card-body">
                          <h4>$room_data[name]</h4>
                          <h5 class="mb-3">$room_data[price] SP Per Night</h5>
                          <div class="features mb-3">
                            <h6 class="mb-1">features</h6>
                            $features_data
                          </div>
                          <div class="facil mb-3">
                            <h6 class="mb-1">facilities</h6>
                            $facilities_data
                          </div>
                          <div class="guests mb-3">
                            <h6 class="mb-1">guests</h6>
                            <span class="badge rounded-pill text-wrap">
                              $room_data[adult] adults
                            </span>
                            <span class="badge rounded-pill text-wrap">
                              $room_data[children] children
                            </span>
                          </div>
                          <div class="rating d-flex justify-content-center mt-2 mb-3">
                          <i class="icon fa-solid fa-star text-warning me-2"></i>
                          <i class="icon fa-solid fa-star text-warning me-2"></i>
                          <i class="icon fa-solid fa-star text-warning me-2"></i>
                          <i class="icon fa-solid fa-star text-warning me-2"></i>
                          <i class="icon fa-solid fa-star-half-stroke text-warning me-2"></i>
                          </div>
                          <div class="d-flex justify-content-evenly mt-1">
                            <a href="#" class="btn btn-sm fw-bold">Book Now</a>
                            <a href="rooms.php" class="btn btn-sm fw-bold">More Details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  data;
              }
            ?>
            <div class="col-lg-12 text-center mt-1 mb-3">
              <a href="rooms.php" class="btn btn-sm fw-bold">More Rooms >>></a>
            </div>
          </div>
        </div>
      </div>
    <!-- facilities -->
      <div class="facilities" id="facil">
        <h2 class="pt-3 mb-2 text-center fw-bold h-font">Our facilities</h2>
        <div class="container">
          <div class="row justify-content-evenly px-lg-0 px-md-0 px-5 pb-3">
            <?php
              $res = selectAll('facilities');
              $path = FACILITISE_IMG_PATH ;
              while ($row = mysqli_fetch_assoc($res)) {
                  echo <<<data
                  <div class="features col-lg-3 col-md-2 shadow rounded py-4 ny-3 text-center m-3" style="">
                      <img class="mb-3" src="$path$row[icon]" width="80px"/>
                      <h6 class="mb-2">$row[name]</h6>
                  </div>
              data;
              }
            ?>
          </div>
          <div class="col-lg-12 text-center mt-1 pb-3">
              <a href="facilities.php" class="btn btn-sm fw-bold">More facilities >>></a>
            </div>
        </div>
      </div>
    <!-- Testimonials -->
      <div class="Testimonials pb-1">
        <h2 class="pt-3 mb-4 text-center fw-bold h-font">Testimonials</h2>
        <div class="container">
          <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper pb-5">
              <?php
                $res =selectAll('rating');
                while ($row = mysqli_fetch_assoc($res) ) {
                  if($row['seen']==1){
                    echo <<<data
                    <div class="swiper-slide rounded shadow p-3">
                      <div class="profile d-flex align-items-center mb-3">
                        <i class="icon fa-solid fa-user"></i>
                        <h6 class="m-0 ms-2">$row[name]</h6>
                      </div>
                      <p>$row[rating]</p>
                      <div class="rating">
                        <i class="icon fa-solid fa-star text-warning me-2"></i>
                        <i class="icon fa-solid fa-star text-warning me-2"></i>
                        <i class="icon fa-solid fa-star text-warning me-2"></i>
                        <i class="icon fa-solid fa-star text-warning me-2"></i>
                        <i class="icon fa-solid fa-star-half-stroke text-warning me-2"></i>
                      </div>
                    </div>
                data;}
                }
              ?>
              <!-- <div class="swiper-slide rounded shadow p-3">
                <div class="profile d-flex align-items-center mb-3">
                  <i class="icon fa-solid fa-user"></i>
                  <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta velit expedita voluptatum quam unde et dolorem.</p>
                <div class="rating">
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star-half-stroke text-warning me-2"></i>
                </div>
              </div>
              <div class="swiper-slide rounded shadow p-3">
                <div class="profile d-flex align-items-center mb-3">
                  <i class="icon fa-solid fa-user"></i>
                  <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta velit expedita voluptatum quam unde et dolorem.</p>
                <div class="rating">
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star-half-stroke text-warning me-2"></i>
                </div>
              </div>
              <div class="swiper-slide rounded shadow p-3">
                <div class="profile d-flex align-items-center mb-3">
                  <i class="icon fa-solid fa-user"></i>
                  <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta velit expedita voluptatum quam unde et dolorem.</p>
                <div class="rating">
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star text-warning me-2"></i>
                  <i class="icon fa-solid fa-star-half-stroke text-warning me-2"></i>
                </div>
              </div>
            </div> -->
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    <!-- reach us -->
    <?php 
      $coonect_q ="SELECT * FROM `contact-details` WHERE `sr_no`=?";
      $values = [1];
      $coonect_r =mysqli_fetch_assoc(select($coonect_q,$values,'i'));
      // print_r($coonect_r);
    ?>
      <div class="reach-us pb-4">
        <h2 class="pt-3 mb-4 text-center fw-bold h-font">Reach Us</h2>
        <div class="container">
          <div class="row justify-content-evenly px-lg-0 px-md-0 px-4">
            <div class="map shadow col-lg-8 col-md-8 p-3 mb-lg-0 mb-3 rounded">
              <iframe class="w-100 rounded " height="300" 
                src="<?php echo $coonect_r['iframe'] ?>" loading="lazy">
              </iframe>
            </div>
            <div class="col-lg-4 col-md-4 ps-lg-4 ps-md-2 p-0">
              <div class="num shadow p-3 rounded">
                <h4 class="fw-bold pb-1">Call Us</h4>
                <a href="tel: <?php echo $coonect_r['pn'] ?>" class="d-inline-block mb-1 text-decoration-none">
                <i class="icon fa-solid fa-phone me-2"></i><?php echo $coonect_r['pn'] ?></a>
              </div>
              <div class="links shadow p-3 rounded mt-4">
                <h4 class="fw-bold pb-1">Follow Us</h4>
                <a href="<?php echo $coonect_r['fb'] ?>" target="_blank" 
                  class="d-inline-block mb-1 text-decoration-none">
                <i class="icon fa-brands fa-facebook me-2"></i>facebook</a>
                <br>
                <a href="<?php echo $coonect_r['insta'] ?>" target="_blank" 
                  class="d-inline-block mb-1 text-decoration-none">
                <i class="icon fa-brands fa-instagram me-2"></i>instagram</a>
                <br>
                <a href="<?php echo $coonect_r['tele'] ?>" target="_blank" 
                  class="d-inline-block text-decoration-none">
                <i class="icon fa-brands fa-telegram me-2"></i>telegram</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- footer  -->
      <?php require('inc/footer.php'); ?>

    <!-- JS files  -->
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/all.min.js"></script>
    <!-- swiper img  -->
      <script>
        var swiper = new Swiper(".mySwiper-container", {
          spaceBetween: 30,
          effect: "fade",
          loop: true,
          autoplay: {
          delay: 3500,
          disableOnInteraction: false,
          }
        });
        var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        initialSlide: 1,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        }
        });
      </script>
    
</body>
</html>