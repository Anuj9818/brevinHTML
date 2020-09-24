<?php include_once('header.php'); ?>
<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-6 float-left">
                    <h2>Contact Us</h2>
                </div>
                <div class="col-lg-6 float-left">
                    <h3><a href="./">Home </a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> Contact Us </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact body -->
<section class="section-padding">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow animated fadeInLeft" data-wow-duration="1000ms" data-wow-delay="0.1s">
                <div class="contactinfo text-center text-capitalize">
                    <i class="fa fa-phone"></i>
                    <h3>Call Us</h3>
                    <a href="tel:01-4422661">  01-4422661</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow animated fadeInLeft" data-wow-duration="1000ms" data-wow-delay="0.2s">
                <div class="contactinfo text-center text-capitalize">
                    <i class="fa fa-envelope"></i>
                    <h3>Email Us</h3>
                    <a href="mailto:ktmspa@gmail.com"> ktmspa@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow animated fadeInLeft" data-wow-duration="1000ms" data-wow-delay="0.3s">
                <div class="contactinfo text-center text-capitalize">
                    <i class="fa fa-map-marker"></i>
                    <h3>Find Us</h3>
                    <a href="#"> Thamel, Ktm 44600</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding freequote">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="aboutus-btm">
                    <h2>Feel free to get connected</h2>
                    <p>If you have any queries about our services or if you didn't find the info you are searching for in our website which is related to our services. Please feel free to get in touch with us. We will be back to you with the best possible solutions for you. You can give us a call at our number below.</p>
                    <a href="tel:01-4422661"><strong> 01-4422661</strong></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="freequoteform">
                    <h2><strong>Get in Touch with us</strong></h2>
                    <div id='contact_form_holder'>
                        <form action='send_mail2.php' method='post' id='contact_form2'>
                            <div class="col-lg-6 float-left">
                                <p>

                                <div id='name_error2' class='error'><img src='images/error.png'> I don't talk to strangers.</div>
                                <div><input type='text' name='name2' id='name2' placeholder="Your Name"></div>
                                </p>
                            </div>
                            <div class="col-lg-6 float-left">
                                <p>

                                <div id='email_error2' class='error'><img src='images/error.png'> You don't want me to answer?</div>
                                <div><input type='text' name='email2' id='email2' placeholder="Your Email" class="formemail"></div>
                                </p>

                            </div>
                            <div class="col-lg-6 float-left">
                                <p>

                                <div id='phone_error2' class='error'><img src='images/error.png'> We will give you a call back!</div>
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
                                <div id='message_error2' class='error'><img src='images/error.png'> Forgot why you came here?</div>
                                <textarea name='message2' id='message2' placeholder="Your Message">
                                    
                                </textarea>
        
                            </div>
                            <div class="col-lg-6 float-left">
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

        </div>
    </div>
</section>
<section class="section-padding1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 no-padding">
                <div class="gmap">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.036984696898!2d85.30876951449225!3d27.716144331713405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fd27fb7ab1%3A0x5ef21e1fa5bf9878!2sKathmandu%20Spa%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1568014821551!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</section>

<?php include_once('footer.php'); ?>
