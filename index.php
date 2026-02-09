<?php include "inc/header.php"?>

<section class="sec1 p-y-50px">
    <div class="sec1-left-side">
        <div class="slogan-container">
            <h1 class="slogan"><span id="highlight">Healing Elevation</span><br>Revitalize Your Health</h1>
            <p>Where Expertise Meets Holistic Healing through Ozone Therapy.</p>
            <button a href="#contact-us">Contact Us Today</a></button>
        </div>
    </div>
    <div class="sec1-right-side">
        <span class="image-background"></span>
        <img src="images/slogan-doctor.png" alt="Slogan Doctor">
        <div class="image-content image-content-1">
        <div class="details">
                <h4>Well Qualified doctors</h4>
                <p>Treat with care</p>
            </div>
        </div>
        <div class="image-content image-content-2">
            <div class="details">
                <h4>Contact no</h4>
                <p><a href="#">+383 45 000 000</a></p>
            </div>
        </div>
        <div class="image-content image-content-3">
            <div class="details">
                <h4>Book an appointment</h4>
                <p>Online appointement</p>
            </div>
        </div>
    </div>
</section>
<section class="sec2">
    <div class="container">
        <div class="title-container">
            <h2 class="sec2-title">Our Medical Services</h2>
            <p>We are dedicated to serve you<br> best medical services</p>
        </div>
        <div class="clinic-services">
            <div class="service">
                <div class="service-content">
                    <i class="fa-solid fa-microscope"></i>
                    <h4>Well equipped lab</h4>
                </div>
            </div>
            <div class="service">
                <div class="service-content">
                    <i class="fa-solid fa-truck-medical"></i>                        
                    <h4>Emergency Ambulance</h4>
                </div> 
            </div>
        <div class="service">
                <div class="service-content">
                <i class="fa-solid fa-comments"></i>                        
                    <h4>Online Appointment</h4>
                </div>
            </div>
            <div class="service">
                <div class="service-content">
                    <i class="fa-solid fa-headset"></i>                        
                    <h4>Call Center</h4>
                </div> 
            </div>
        </div>   
    </div>
</section>
<section class="sec3 rate">
        <div class="container">
            <div class="title-container">
                <h2 class="sec3-title">Meet Our Doctors</h2>
                <p>We are dedicated to serve you<br> best medical services</p>
            </div>
            <div class='clinic-doctors'>
            <?php
            $doktoret=merrDoktoret();
            $i=1;
            while ($doktori = mysqli_fetch_assoc($doktoret)){
                $doktoriid = $doktori['doktoriid'];
                $emriMbiemri = $doktori['emri'] . " ". $doktori['mbiemri'];
                $specializimi= $doktori['specializimi'];
                $bio = $doktori['bio'];
                if (strlen($bio)>50) {
                    $bio = substr($bio, 0, 50) . "...";
                } 
                echo '<div class="doctor">';
                    echo "<div class='doctor-content'>";
                    echo "<img src='images/doctor{$i}.jpg' alt='Doctor1'>";
                    echo '<div class="details">';
                    echo "<h4>{$emriMbiemri}</h4>";
                    echo "<h5>Specializimi: {$specializimi}</h5>";
                    echo "<p>{$bio}</p>";
                    // echo "<a class='meShume' href='doktoret.php?doktoriid={$doktoriid}'>me shume &#8658;</a>";
                    echo '<button>Book an appointment</button>';
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    $i++;
                    if ($i == 5) $i = 1;
                }
            ?>
        </div>
    </section>
</section>
    <section class="sec4 rate">
        <div class="container">
            <div class="title-container">
                <h2 class="sec4-title">Patients Reviews</h2>
                <p>Let’s see what our happy patients says</p>
            </div>
            <div class="patients-testimonial">
                <div class="testimonial">
                    <div class="testimonial-content">
                        <div class="circle-part"></div>
                        <div class="details">
                            <h3>Patient 1</h3>
                            <p>Patient with 1st Doctor</p>
                            <ul class="testimonial-rate">
                                <li><i class="fa-solid fa-star"></i></li>                           
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <p>I found incredible relief through Dr.1st's ozone therapy. 
                            His personalized approach and expertise are unmatched.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial-content">
                        <div class="circle-part">
                            <div class="circle"></div>
                        </div>
                        <div class="details">
                            <h3>Patient 2</h3>
                            <p>Patient with 2nd Doctor</p>
                            <ul class="testimonial-rate">
                                <li><i class="fa-solid fa-star"></i></li>                           
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <p>I found incredible relief through Dr.1st's ozone therapy. 
                                His personalized approach and expertise are unmatched.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial-content">
                        <div class="circle-part"></div>
                        <div class="details">
                            <h3>Patient 3</h3>
                            <p>Patient with 3rd Doctor</p>
                                <ul class="testimonial-rate">
                                    <li><i class="fa-solid fa-star"></i></li>                           
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <p>I found incredible relief through Dr.1st's ozone therapy. 
                                    His personalized approach and expertise are unmatched.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec5">
        <div class="container">
            <div class="title-container">
                <h2 class="sec5-title">Subscribe To Our Newsletter</h2>
                <p>Get latest news of our hospital</p>
            </div>
            <div class="container-main-content">
                <label for="email">
                    <h3>For Newsletter</h3>
                    <input type="email" placeholder="Enter your email here">
                    <button>Subscribe</button>
                </label>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">
            <div class="inner-footer 1">
                <p><a href="index.html">
                    <h1><i class="fa-brands fa-medrt"></i> BlueMed Clinic</h1>
                    </a>
                </p>
                <h3>CONTACT INFORMATION</h3>
                <hr>
                <p><i class="fa-regular fa-calendar-days"></i><span id="bold">  Monday - Saturday:</span> 8:00 AM to 11:00 PM</p>
                <p><i class="fa-solid fa-phone"></i><span>  Phone:</span> +383 (0) 45 000-000</p>
                <p><i class="fa-solid fa-fax"></i><span>  Fax:</span> (038) 000-000</p>
                <p><i class="fa-solid fa-envelope"></i><span>  Email:</span> info@domain.com</p>
            </div>

            <div class="inner-footer center">
                <h2>Our Services</h2>
                <hr>
                <a href="#">Dental</a>
                <a href="#">Neurology</a>
                <a href="#">Cadilogy</a>
                <a href="#">Heart Dieases</a>
                <a href="#">X-Ray</a>
            </div>

            <div class="inner-footer center">
                <h2>Latest News</h2>
                <hr>
                <a href="#">Treating Corona with Ozone</a>
                <a href="#">What Is Ozone Therapy?</a>
                <a href="#">All you need to know about childhood illnesses</a>
                <a href="#">Blood transfusion importance</a>
                <a href="#">Preparing for surgery? What you need to know</a>
            </div>
            <div class="inner-footer center">
                <h2>Our Locations</h2>
                <hr>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i><span id="bold">  Rr.Ukshin Kovaqica, Mitrovice</p>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i><span id="bold">  Rruga B, Prishtine</p>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i><span id="bold">  Rruga Apollonia, Veternik</p>
            </div>
            <div class="inner-footer 5">
                <h2>Contact Us</h2>
                <div class="contact-form">
                    <form action="" id="contact-us">
                        <input type="text" name="full-name" placeholder="Full Name">
                        <input type="email" name="email" placeholder="E-mail Address">
                        <input type="text" name="number" placeholder="Phone No:">
                        <textarea name="message"  rows="6" placeholder="Your Message"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </footer>
<?php
include "inc/footer.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // jQuery code goes here
        var currentIndex = 0;
        var doctorCount = $('.doctor').length;

        $('.next').click(function() {
            if (currentIndex < doctorCount - 1) {
                currentIndex++;
                updateSliderPosition();
            }
        });

        $('.prev').click(function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSliderPosition();
            }
        });

        function updateSliderPosition() {
            var newPosition = -currentIndex * $('.doctor').outerWidth(true);
            $('.doctors-wrapper').css('transform', 'translateX(' + newPosition + 'px)');
        }
    });
</script>