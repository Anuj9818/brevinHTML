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
<section class="section-padding-inner">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12">
               <div class="freequoteform">
                <div class="text-center">
                    <h2 class="title wow animated fadeInDown"><strong>GET a quote now!<span class="primary-color"> Email US AT . . . . . . . </span></strong></h2>
                <h5 class=" wow animated fadeInDown">or complete the form below.</h5>
                </div>
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
                            <div class="col-lg-12 float-left">
                                <div id='mail_success2' class='success'><img src='images/success.png'> Thank you. The mailman is on his way.</div>
                                <div id='mail_fail2' class='error'><img src='images/error.png'> Sorry, don't know what happened. Try later.</div>
                                <p id='cf_submit_p2'>
                                    <input class="wow animated flipInX" type='submit' id='send_message2' value='Submit'>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <?php include_once('footer.php'); ?>
