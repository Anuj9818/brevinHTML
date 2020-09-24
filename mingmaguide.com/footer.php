<!-- footer section starts here -->
<section class="section-padding footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title text-center wow animated fadeInDown">
                    <h1>Get In Touch</h1>
                    <hr class="footer-hr">
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="social-media text-center">
                    <span class="wow bounce" data-wow-duration="2s" data-wow-iteration="100" data-wow-delay="0.1s"><a href="#facebook"><i class="fab fa-facebook"></i></a></span>
                    <span class="wow bounce" data-wow-duration="2s" data-wow-iteration="100" data-wow-delay="0.2s"><a href="#facebook"><i class="fab fa-instagram"></i></a></span>
                    <span class="wow bounce" data-wow-duration="2s" data-wow-iteration="100" data-wow-delay="0.3s"><a href="#facebook"><i class="fab fa-youtube"></i></a></span>
                    <span class="wow bounce" data-wow-duration="2s" data-wow-iteration="100" data-wow-delay="0.4s"><a href="#facebook"><i class="fab fa-linkedin"></i></a></span>
                    <span class="wow bounce" data-wow-duration="2s" data-wow-iteration="100" data-wow-delay="0.5s"><a href="#facebook"><i class="fab fa-google-plus"></i></a></span>
                   </div>
                <!-- copyright -->
                <p class="text-center copyright"><span class="primary-color"><i class="fa fa-copyright"></i> <span id="displayYear"></span> Mingmaguide</span> Website by: <span><a href="http://brevincreation.com/#about" target="_blank">Brevin Creation</a></span></p>
                <!-- copyright -->
                 <a href="#" class="scrollup">
                    TO TOP <i class="fa fa-long-arrow-alt-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script type='text/javascript' src='https://gitcdn.xyz/repo/thesmart/jquery-scrollspy/0.1.3/scrollspy.js'></script>
<script src="https://gitcdn.xyz/repo/thesmart/jquery-scrollspy/0.1.3/scrollspy.js"></script>
<script src="js/custom.js"></script>
<script src="js/contact.js"></script>
<script>
    $(document).ready(function () {
        $(".fancybox").fancybox();
    });
</script>
<script>
    $(window).load(function () {
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: true,
            live: true
        });
        wow.init();
    });
    
</script>
<script>
    if ($(window).width() <= 991) {
        $(".wow").removeClass("wow");
    }
    $(window).load(function () {
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: off,
            live: true
        });
        wow.init();
    });</script>
    <script>
    // Repeat demo content
    var $body = $('body');
    var $box = $('.box');
    for (var i = 0; i < 20; i++) {
        $box.clone().appendTo($body);
    }

    // Helper function for add element box list in WOW
    WOW.prototype.addBox = function (element) {
        this.boxes.push(element);
    };
    // Init WOW.js and get instance
    var wow = new WOW();
    wow.init();
    // Attach scrollSpy to .wow elements for detect view exit events,
    // then reset elements and add again for animation
    $('.wow').on('scrollSpy:exit', function () {
        $(this).css({
            'visibility': 'hidden',
            'animation-name': 'none'
        }).removeClass('animated');
        wow.addBox(this);
    }).scrollSpy();
</script>

</body>
</html>
<!-- footer ends here