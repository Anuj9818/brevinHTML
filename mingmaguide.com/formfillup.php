  <!-- service menu container starts her -->
  <div class="sidebar wow animate slideInLeft">
   <section class="section-padding quote-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="free-estimate">
                    <div class="title">
                        <h2 class="text-uppercase">BOOK NOW</h2>
                    </div>
                    <div id='contact_form_holder'>
                        <form action='send_mail.php' method='post' id='contact_form'>
                            <div class="col-lg-12">
                                <p>

                                    <div id='name_error' class='error'><img src='images/error.png'> I don't talk to strangers.</div>
                                    <div><input type='text' name='name' id='name' placeholder="Your Name"></div>
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <p>

                                    <div id='email_error' class='error'><img src='images/error.png'> You don't want me to answer?</div>
                                    <div><input type='text' name='email' id='email' placeholder="Your Email" class="formemail"></div>
                                </p>

                            </div>
                            <div class="col-lg-12">
                                <p>

                                    <div id='phone_error' class='error'><img src='images/error.png'> We will give you a call back!</div>
                                    <div><input type='text' name='phone' id='phone' placeholder="Your Phone"></div>
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <p>

                                    <div id='subject_error' class='error'><img src='images/error.png'> What is the purpose of the contact?</div>
                                    <div><input type='text' name='subject' id='subject' placeholder="Your Subject" class="formemail"></div>
                                </p>

                            </div>
                            <div class="col-lg-12">
                                <p>

                                    <div id='howhear_error' class='error'><img src='images/error.png'> How did you hear about us?</div>
                                    <div><input type='text' name='howhear' id='howhear' placeholder="How did you hear about us?" class="formemail"></div>
                                </p>

                            </div>
                            <div class="col-lg-12">
                                <p>

                                    <div id='message_error' class='error'><img src='images/error.png'> Forgot why you came here? </div>
                                    <div>
                                        <textarea id="message" class="message" name="message" placeholder="Your Message"></textarea>
                                    </div>
                                </p>

                            </div>
                            <div class="col-lg-12">
                                <div id='mail_success' class='success'><img src='images/success.png'> Thank you. The mailman is on his way.</div>
                                <div id='mail_fail' class='error'><img src='images/error.png'> Sorry, don't know what happened. Try later.</div>
                                <p id='cf_submit_p'>
                                    <input type='submit' id='send_message' value='Send'>
                                </p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
<!-- service menu container ends here-->