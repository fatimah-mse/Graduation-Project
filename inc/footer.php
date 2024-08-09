<?php
    $coonect_q ="SELECT * FROM `contact-details` WHERE `sr_no`=?";
    $values = [1];
    $coonect_r =mysqli_fetch_assoc(select($coonect_q,$values,'i'));
    // print_r($coonect_r);
    
    // $coonect_qq ="SELECT * FROM `settings` WHERE `sr_no`=?";
    // $value = [1];
    // $coonect_rr =mysqli_fetch_assoc(select($coonect_qq,$value,'ii'));
?>
<!-- footer -->
    <footer class="footer">
        <div class="footer container">
            <div class="row">
                <div class="col-lg-4 p-4">
                <h4 class="h-font fw-bold fs-3 mb-2 text-center">MSE Hotel</h4>
                <p class="discription fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Dolorem placeat praesentium nam, rem, 
                    porro a illo repudiandae voluptatum architecto, 
                    neque necessitatibus iusto dignissimos velit ipsam perspiciatis. 
                    Laborum aut dignissimos temporibus!</p>
                </div>
                <div class="col-lg-4 p-4 text-center">
                <h4 class="mb-3 fw-bold">links</h4>
                <a href="#" class="link fw-bold d-inline-block mb-2 text-decoration-none">home</a>
                <br>
                <a href="#" class="link fw-bold d-inline-block mb-2 text-decoration-none">rooms</a>
                <br>
                <a href="#" class="link fw-bold d-inline-block mb-2 text-decoration-none">facilities</a>
                <br>
                <a href="#" class="link fw-bold d-inline-block mb-2 text-decoration-none">contact us</a>
                <br>
                <a href="#" class="link fw-bold d-inline-block mb-2 text-decoration-none">about</a>
                </div>
                <div class="col-lg-4 p-4 text-center">
                    <h4 class="fw-bold pb-1 mb-3">Follow Us</h4>
                    <a href="<?php echo $coonect_r['fb'] ?>" target="_blank" 
                    class="Follow fw-bold d-inline-block mb-1 text-decoration-none">
                    <i class="icon fa-brands fa-facebook me-2"></i>facebook</a>
                    <br>
                    <a href="<?php echo $coonect_r['insta'] ?>" target="_blank" 
                    class="Follow fw-bold d-inline-block mb-1 text-decoration-none">
                    <i class="icon fa-brands fa-instagram me-2"></i>instagram</a>
                    <br>
                    <a href="<?php echo $coonect_r['tele'] ?>" target="_blank" 
                    class="Follow fw-bold d-inline-block text-decoration-none">
                    <i class="icon fa-brands fa-telegram me-2"></i>telegram</a>
                </div>
                <h5 class="text-warning fs-3 fw-bold pt-lg-2 pt-4 pb-2 col-lg-12 text-center">copyright © 2024 By Fatimah Mselmani</h5>
            </div>
        </div>
    </footer>
    
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>