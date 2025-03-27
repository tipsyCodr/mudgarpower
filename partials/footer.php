<style>

</style>
<!--  footer -->
<footer id="contact">
   <div class="footer">
      <div class="container">
         <div class="row">

         </div>
         <div class="row">
            <div class="col-lg-4">
               <div class="heading3">
                  <a href="#"><img src="images/logo_white.png" style='width:150px' alt="#" /></a>
                  <p>Meipadam and Karlakattai is an ancient warrior fitness art which is 60000 years old and
                     native to Tamilnadu.</p>
               </div>
            </div>

            <div class="col-lg-3 ">
               <div class="heading3">
                  <h3>Contact Us</h3>
                  <ul class="infometion">
                     <li><a href="tel:+917735193115"><i class="fa fa-phone"></i> (+91) 7735193115</a></li>

                  </ul>
               </div>
               <div class="heading3">
                  <h3>Follow Us</h3>
                  <ul style="list-style-type: none; display: flex; justify-content: left; padding: 0; margin: 0;">
                     <li><a href="https://www.facebook.com/profile.php?id=100095122582196&mibextid=ZbWKwL"><i
                              style="padding-right:17px;" class="fa fa-facebook-f"></i></a></li>
                     <li><a href="https://www.instagram.com/bablibalbinder?utm_source=qr&igsh=MmxxZDNpMG01Nm9s"><i
                              style="padding-right:17px;" class="fa fa-instagram"></i></a></li>

                     <li><a href="https://youtube.com/@balbinderbabli4489?si=vT7gcCH9jR41ZQkn"><i
                              style="padding-right:17px;" class="fa fa-youtube"></i></a></li> <br />

                  </ul>

               </div>
            </div>
            <div class="col-lg-5">
               <!-- <div class="col-lg-5 offset-lg-7"> -->
               <form class="bottom_form">
                  <h3>Newsletter</h3>
                  <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                  <button class="sub_btn">subscribe</button>
               </form>
               <!-- </div> -->
            </div>
         </div>
      </div>
      <div class=" copyright">

         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>© 2024 All Rights Reserved. Designed By <u><a href="http://www.pathideamultiskill.com/">Path
                           Idea
                           Multiskills</a>
                     </u></p>
               </div>
            </div>
         </div>
      </div>

</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/ekko-lightbox@5.3.0/dist/ekko-lightbox.min.js"></script>

<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"
   integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   $('a[href^="#"]').on('click', function (event) {

      var target = $(this.getAttribute('href'));

      if (target.length) {
         event.preventDefault();
         $('html, body').stop().animate({
            scrollTop: target.offset().top
         }, 2000);
      }

   });
</script>
<script>
   // This example adds a marker to indicate the position of Bondi Beach in Sydney,
   // Australia.
   function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 11,
         center: { lat: 40.645037, lng: -73.880224 },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
         position: { lat: 40.645037, lng: -73.880224 },
         map: map,
         icon: image
      });
   }

</script>

<!-- google map js -->
<script
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>

<!-- end google map js -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<script src="./animation.js"></script>

</html>