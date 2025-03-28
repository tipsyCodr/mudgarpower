<?php require_once('./partials/head.php'); ?>

   <!-- banner -->
   <section class="banner_main" style="">
      <style>

      </style>
      <div class="container-fluid">


         <!-- Slider main container -->
         <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
               <!-- Slides -->
               <?php
               require_once('./root/db_connection.php');
               $titles = [
                  // 'Transform Your Fitness Journey with Mudgar Exercise..',
                  // 'Empower Your Body and Mind',
                  // 'Experience the Ancient Wisdom of Mudgar'
               ];
               $subs = [
                  // 'Discover the Ancient Art of Strength and Wellness.',
                  // 'Unlock Inner Strength Through Mudgar Practice.',
                  // 'Timeless Techniques for Modern Living.'
               ];
               $imgs = [
                  // 'images/gallery/10.jpg',
                  // 'images/gallery/11.jpg',
                  // 'images/gallery/12.jpg'
               ];


               $qry = $db->query("SELECT * FROM slide_information") or die('');
               $qry2 = $db->query("SELECT * FROM explore_our_class") or die('');
               $qry3 = $db->query("SELECT * FROM about_section_information") or die('');
               $qry4 = $db->query('SELECT * FROM `differece_between_section_information`') or die('');

               $exp_class = $qry2->fetch(PDO::FETCH_ASSOC);
               $about_sec = $qry3->fetch(PDO::FETCH_ASSOC);
               $diff_bet = $qry4->fetch(PDO::FETCH_ASSOC);


               while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                  $titles[] = $row['slide_title'];
                  $imgs[] = $row['slide_image'];
                  $subs[] = $row['slide_subtitle'];
               }


               $count = count($titles);
               foreach ($titles as $i => $title) {
                  ?>
                  <div class="swiper-slide">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-lg-4 left-main fadeInUp">
                              <img class=' img-responsive'
                                 src="<?php echo "./admin/html/uploads/slider_images/" . $imgs[$i]; ?>" alt="#"
                                 style='border:10px solid #ddd;' />
                           </div>
                           <!-- <div class="col-lg-2 right-main  fadeInLeft"></div> -->
                           <div class="col-lg-6 right-main  fadeInLeft">
                              <h1 style='super-title'><?php echo $title; ?></h1>
                              <h2 style='font-weight:200'><?php echo $subs[$i]; ?></h2>
                              <div class="buttons">
                                 <a class='whatsapp custom-btn' target="_blank" href="https://wa.me/+917735193115">
                                    <i><img src="images/social-icons/wp.png" alt="Chat on whatsapp" width="30px"></i>
                                    Chat on Whatsapp
                                 </a>
                                 <a class='custom-btn book'
                                    href="mailto: support@gmail?subject=I'm interested in your program&cc=pathideamultiskill@gmail.com">Book
                                    Now</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
               }
               ?>

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <!-- <div class="swiper-button-prev"></div>
     <div class="swiper-button-next"></div> -->

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
         </div>
      </div>




   </section>
   <!-- end banner -->
   <br>
   <br>
   <br>
   <!-- video -->
   <div id="video" class="video">
      <div class="container">
         <div class="row">
            <div class="col-md-6 justify-content-center align-content-center">
               <div class="ser_img">
                  <figure><video controls autoplay>
                        <source src="media/3.mp4" type="video/mp4">
                        <!-- <source src="movie.ogg" type="video/ogg"> -->
                        Your browser does not support the video tag.
                     </video></figure>

               </div>
            </div>
            <div class="col-md-6">
               <div class="ser_img">
                  <!-- <h1 class="display-4 font-bold"> Explore Our Class</h1>
                   <h3 class="accented">Unlocking Vitality: Meipadam and Karlakattai</h3>
                <p style='text-align:justify;'>
                   Discover the ancient fitness arts that resonate with both body and
                     mind: Meipadam and Karlakattai. These practices, when performed 108 times, create a profound impact
                     on your central nervous system. Why 108? It symbolizes the 108 nerve plexuses within your body, and
                     through these movements, you strengthen each one.</p>
                  <h3 class="p-0 pt-4"><em class='accented' style="text-align:center">“The ultimate fitness art your
                        body and
                        mind
                        crave.”</em>
                  </h3> 
                  <h3 class="font-bold accented">Benefits:</h3>
                   <ul>
                     <li>
                        <h4 class="font-bold ">Balanced Brain Activity:</h4>
                        <ol>
                           <li>Engage both the right and left brain hemispheres.</li>
                           <li>Experience mental agility and clarity.</li>
                        </ol>
                     </li>
                     <li>
                        <h4 class="font-bold ">Boosted Confidence:</h4>
                        <ol>
                           <li>Enhance your body language and self-assurance.</li>
                           <li>Stand tall and radiate confidence.</li>
                        </ol>
                     </li>
                     <li>
                        <h4 class="font-bold ">Stress Reduction:</h4>
                        <ol>
                           <li>Clear brain fog and reduce anxiety.</li>
                           <li>Promote better mental health.</li>
                        </ol>
                  </li>
                     <li>
                        <h4 class="font-bold ">Emotional Resilience:</h4>
                        <ol>
                           <li>Cultivate inner strength and stability.</li>
                           <li>Face life’s challenges with grace.</li>
                        </ol>
                  </li>
                     <li>
                        <h4 class="font-bold ">Holistic Massage:</h4>
                        <ol>
                           <li>Each repetition acts as a gentle massage for your organs.</li>
                           <li>Regulate their function and protect against diseases.</li>
                        </ol>
                     </li> 
                  <li>
                        <h4 class="font-bold ">Spiritual Connection:</h4>
                        <ol>
                           <li>Meipadam and Karlakattai foster faith and spirituality.</li>
                           <li>Connect with your inner self.</li>
                        </ol>
                  </li>
                     <li>
                        <h4 class="font-bold ">Unique Strength:</h4>
                        <ol>
                           <li>Unlike other fitness practices, these movements strengthen your internal organs and
                              nervous system holistically.</li>
                        </ol>
                     </li>
                  </ul>
                  <p>
                     <span class="font-bold accented">Disclaimer</span>: The side effects? Feeling lighter, more
                     energetic
                     throughout the day, and experiencing a rejuvenated sense of youth.
                  </p>
                  <p>
                     Embrace these practices, unlock vitality, and discover a renewed zest for life. 🌟
                  </p> -->
                  <?php echo html_entity_decode($exp_class['description']); ?>
                  <div>
                     <h3>Our Next Classes Starts on:</h3>
                     <p class="font-bold accented text-capitalize">
                        <?= date('M-d-Y', strtotime($exp_class['next_class'])); ?>
                     </p>
                     <a class=" btn btn-danger my-2 active:color-red" href=" mailto:support@gmail?subject=I'm interested in your
                        program&cc=pathideamultiskill@gmail.com">Book
                        Now</a>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- service -->
   <section class='customer'>

      <div class="benefits" style="background:white;">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center display-1">
                  <h2 class="section-head">Meipadam & Karlakattai Can Help You</h2>

               </div>
            </div>
            <div class="row">
               <div class="col-lg-3 col-sm-12 left-align animated animate_on_scroll  " data-animate="fadeInLeft"
                  id="left-side-properties">
                  <span class="properties">
                     <i> <img src="images/icons/pain.png" alt=""></i> Ease & Reduce Pain
                  </span>
                  <span class="properties">
                     <i> <img src="images/icons/003-elastic.png" alt=""></i> Improve Flexibility
                  </span>
                  <span class="properties">
                     <i> <img src="images/icons/002-pain.png" alt=""></i> Reduce Stress & Anxiety
                  </span>

               </div>


               <div class="col-lg-6  center-align animated animate_on_scroll" data-animate="zoomIn">

                  <img class='img-responsive' style="margin-left: 32px" src="images/benefit.png" alt="" id="motoimg">
               </div>


               <div class="col-lg-3 col-sm-12 right-align animated animate_on_scroll " data-animate="fadeInRight"
                  id="right-side-properties">

                  <span class="properties">
                     Increase Muscle Strength <i> <img src="images/icons/009-strong.png" alt=""></i>
                  </span>
                  <span class="properties">
                     Sleep Better <i> <img src="images/icons/001-day.png" alt=""></i>
                  </span>
                  <span class="properties">
                     And So Much More <i> <img src="images/icons/010-philosophy.png" alt=""></i>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <br>
   </section>

   <!-- about -->
   <div id="about" class="about">
      <div class="container p-10">
         <div class="row py-10">
            <div class="col-lg-6">
               <div class="row">
                  <div class="col-lg-12">
                     <?php
                     if (empty($about_sec['about_img'])) {
                        ?>
                        <img class='img-responsive' src="images/gallery/1.jpg" alt="about">

                        <?php
                     } else {
                        ?>
                        <img class='img-responsive'
                           src="<?php echo "./admin/html/uploads/about_images/" . $about_sec['about_img'] ?>" alt="about">

                        <?php
                     }
                     ?>

                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="titlepage">
                  <!-- <h1 style='color:white; text-transform:uppercase'> About Meipadam & Karlakattai</h1>
                  <h2>Why Karlakattai.</h2>
                  <br>
                  <ul class="text-white ">
                     <li><b>Ancient Origin</b> : Meipadam and Karlakattai is a 60,000-year-old warrior fitness art
                        native
                        to
                        Tamil Nadu.</li>
                     <li><b>Historical Practice</b>: Practiced by both warriors and common people in ancient times to
                        maintain
                        health, fitness, and disease prevention.</li>
                     <li><b>Powerful Moves</b>: Consists of powerful movements that enhance mobility, flexibility, and
                        strength.</li>
                     <li><b>Breathing Technique</b>: Performed in combination with a breathing technique called
                        Kshakthiriya
                        Pranayama.</li>
                     <li><b>Neuro-Muscular Benefits</b>: This combination of neuro-muscular movements and breathing
                        keeps
                        practitioners focused and ensures even circulation of oxygen and blood throughout the body.</li>
                     <li><b>Unique Fitness Practice</b>: Distinguished from other fitness practices by its holistic
                        approach to
                        health and wellness.</li>
                  </ul> -->
                  <?php echo $about_sec['about_description']; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end about -->

   <section class='customer'>
      <div class="classes">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <div class="row">

                        <div class="col-lg-6 animated animate_on_scroll" data-animate="fadeInLeft">

                           <?php
                           if (empty($diff_bet['diff_img'])) {
                              ?>
                              <img style="padding-top:80px;" src="images/gallery/14.jpg" alt="">

                              <?php
                           } else {
                              ?>
                              <img class='img-responsive'
                                 src="<?php echo "./admin/html/uploads/difference_between_images/" . $diff_bet['diff_img'] ?>"
                                 alt="about">

                              <?php
                           }
                           ?>

                        </div>
                        <div class="col-lg-6 right-side difference_bet animated animate_on_scroll"
                           data-animate="fadeInRight">
                           <?php echo $diff_bet['diff_description']; ?>
                           <!-- <h3 class="section-head">Difference Between</h3>
                           <small class="small-text">other fitness practice and Meipadam and Karlakattai</small>
                           <p>Discover the transformative power of Meipadam and Karlakattai, where fitness transcends
                              the ordinary. Here's what makes these practices unique:</p>

                           <ol >
                              <li><b class="accented">360° Mobility Training</b>:
                                 <ul>
                                    <li>Meipadam introduces you to a full-circle approach to mobility.</li>
                                    <li>Explore movement in all directions, enhancing joint flexibility and range.</li>
                                 </ul>
                              </li>
                              <li><b class="accented">Dynamic Resistance Training:</b>:
                                 <ul>
                                    <li>Unlike conventional weight training, Karlakattai introduces dynamic resistance.
                                    </li>
                                    <li>Engage your muscles from various angles, creating a fresh and effective workout
                                       experience</li>
                                 </ul>
                              </li>
                              <li><b class="accented">Muscle Synergy</b>:
                                 <ul>
                                    <li>Every joint movement involves a symphony of muscles working together.</li>
                                    <li>Meipadam and Karlakattai honor this cooperative action, promoting overall muscle
                                       synergy.</li>
                                    <li>By training holistically, we avoid disrupting blood flow through individual
                                       nerves, safeguarding against vascular issues.</li>
                                 </ul>
                              </li>
                              <li><b class="accented">Neuromuscular Coordination</b>:
                                 <ul>
                                    <li>Meipadam enhances neuro-muscular coordination.</li>
                                    <li>Strengthen your nervous system, regulating it in ways unmatched by other fitness
                                       practices.</li>
                                 </ul>
                              </li>
                              <li><b class="accented">Balanced Brain Engagement</b>:
                                 <ul>
                                    <li>Both Meipadam and Karlakattai activate both the right and left brain
                                       hemispheres.</li>
                                    <li>Achieve mental balance and clarity as you move.</li>
                                 </ul>
                              </li>
                           </ol> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Customer Section -->
   <div id="customer" class="customer">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2><img src="images/head.png" alt="Section Icon" /> Certificates and Photos</h2>
               </div>
            </div>
         </div>

         <!-- Carousel Section -->
         <div id="myCarousel" class="carousel slide customer_Carousel" data-merge="2" data-ride="carousel">

            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
               <?php
               // Get images and videos from both directories
               $directories = ["images/certificates", "images/gallery"];
               $media_files = [];

               foreach ($directories as $directory) {
                  $media_files = array_merge($media_files, glob($directory . "/*.{jpg,mp4}", GLOB_BRACE));
               }

               $items_per_slide = 3; // Number of media items per slide
               $total_slides = ceil(count($media_files) / $items_per_slide);

               for ($i = 0; $i < $total_slides; $i++) {
                  $activeClass = ($i === 0) ? 'active' : '';
                  echo "<li data-target='#myCarousel' data-slide-to='$i' class='$activeClass'></li>";
               }
               ?>
            </ol>

            <!-- Carousel Inner -->
            <div class="carousel-inner">
               <?php
               for ($i = 0; $i < $total_slides; $i++) {
                  $isActive = ($i === 0) ? 'active' : '';
                  echo "<div class='carousel-item $isActive'><div class='container'><div class='carousel-caption'><div class='test_box'>";

                  // Loop through a chunk of media files for each slide
                  for ($j = $i * $items_per_slide; $j < ($i + 1) * $items_per_slide && $j < count($media_files); $j++) {
                     $file = $media_files[$j];
                     $file_extension = pathinfo($file, PATHINFO_EXTENSION);

                     if (strtolower($file_extension) === 'mp4') {
                        // Video rendering
                        echo "<video class='fixed-height-media' controls>
                              <source src='$file' type='video/mp4'>
                              Your browser does not support the video tag.
                           </video>";
                     } else {
                        // Image rendering
                        echo "<img src='$file' alt='Gallery Image' class='fixed-height-media img-fluid'>";
                     }
                  }

                  echo "</div></div></div></div>";
               }
               ?>
            </div>

            <!-- Carousel Controls -->
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
               <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
               <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
         </div>
      </div>
   </div>
   <!-- End Customer Section -->

   <!-- CSS for Fixed Media Height -->
   <style>
      .fixed-height-media {
         height: 340px;
         /* Set a fixed height for both images and videos */
         width: auto;
         object-fit: cover;
         /* Ensures media fits without distortion */
      }
   </style>
   </div>

   <!--  contact -->
   <div id="contact" class="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2> <img src="images/head.h.png" alt="#" />Request A call Back</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <form id="request" class="main_form" action="php/mail.php" method="post">
                  <!-- <form id="request" class="main_form" action="mailto:mudgarpower@gmail.com?subject=Hello" method="post"> -->
                  <div class="row">
                     <div class="col-md-12 ">
                        <input class="contactus" placeholder="Name" type="type" name="name">
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Email" type="type" name="email">
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Phone Number" type="type" name="mobile">
                     </div>
                     <div class="col-md-12">
                        <textarea class="textarea" placeholder="Message" type="type" name="message"> </textarea>
                     </div>
                     <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <button class="send_btn">Send</button>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
               <div class="map-responsive">
                  <iframe
                     src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                     frameborder="0" style="border:0; width: 100%; height:400px;" allowfullscreen>
                  </iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end contact -->
 <?php require_once('./partials/footer.php'); ?>