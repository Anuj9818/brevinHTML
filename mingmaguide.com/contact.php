<?php include_once('header.php'); ?>
<!-- breadkcrumb wrapper starts here -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12">
                    <h2>Contac Us</h2>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- contact body -->
<section class="section-padding ">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12">
               <div class="freequoteform">
                <h2><strong>Contact Us</strong></h2>
                <p>Get a quote now! Complete the form below.</p>
                <div id='contact_form_holder'>
                    <form action='send_mail2.php' method='post' id='contact_form2'>
                        <div class="col-lg-6 float-left">
                            <p>

                                <div id='name_error2' class='error'><img src='images/error.png'> Name is required.</div>
                                <div><input type='text' name='name2' id='name2' placeholder="Your Name"></div>
                            </p>
                        </div>
                        <div class="col-lg-6 float-left">
                            <p>

                                <div id='email_error2' class='error'><img src='images/error.png'> Not a valid email</div>
                                <div><input type='text' name='email2' id='email2' placeholder="Your Email" class="formemail"></div>
                            </p>

                        </div>
                        <div class="col-lg-6 float-left">
                            <p>

                                <div id='phone_error2' class='error'><img src='images/error.png'>Please ! Enter Correct Number.</div>
                                <div><input type='text' name='phone2' id='phone2' placeholder="Your Phone"></div>
                            </p>
                        </div>
                        <div class="col-lg-6 float-left">
                            <p>

                                <div id='subject_error2' class='error'><img src='images/error.png'> What is the purpose of the contact?</div>
                                <div><input type='text' name='subject2' id='subject2' placeholder="Your Subject" class="formemail"></div>
                            </p>

                        </div>
                        <div class="col-lg-12 float-left">
                            <p>
                                <div id='message_error2' class='error'><img src='images/error.png'> This field is required.</div>
                                <textarea name='message2' id='message2' placeholder="">

                                </textarea>

                            </div>
                            <div class="col-lg-12 float-left wow animated flipInX">
                                <div id='mail_success2' class='success'><img src='images/success.png'> Thank you. The mailman is on his way.</div>
                                <div id='mail_fail2' class='error'><img src='images/error.png'> Sorry, don't know what happened. Try later.</div>
                                <p id='cf_submit_p2'>
                                    <input type='submit' id='send_message2' value='Submit'>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- contact infos -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow animated fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.1s">
                <div class="contact-info">
                   <div class="icon-circle">
                        <i class="fa fa-envelope"></i>
                   </div>
                    <a href="mailto:">info@migmaguide.com</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow animated fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.2s">
                <div class="contact-info">
                   <div class="icon-circle">
                        <i class="fa fa-mobile-alt"></i>
                   </div>
                    <a href="tel:">+977 987983434</a>
                </div>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow animated fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
                <div class="contact-info">
                   <div class="icon-circle">
                        <i class="fa fa-map-marker"></i>
                   </div>
                    <a href="#">Kathmandu, Nepal</a>
                </div>
            </div>
            <!-- contact infos -->

        </div>
    </div>
</section>

<!-- date -->

<!-- date -->

<section class="section-padding1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 no-padding">
                <div class="gmap">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.73139916196!2d85.35068454974916!3d27.7255783312148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1961a2862feb%3A0x3a3e51d2d3fcc853!2sAscent+Himalayas+Pvt+Ltd!5e0!3m2!1sen!2snp!4v1565692784764!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
             </div>
         </div>
     </div>
 </section>

 <?php include_once('footer.php'); ?>
