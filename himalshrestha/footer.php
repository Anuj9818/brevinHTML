<!-- footer section -->
<section class=" footer-section">
    <div class="container">
        <div class="row">
            <!-- large title contact -->
            <div class="col-lg-12">
                <div class="large-title-container text-center">
                    <h1 class="wow animated slideInUp" data-wow-duration="2s" data-wow-delay="0.6s">Contact</h1>
                    <div class="profile-image-circle">
                        <img src="images/profile.png" alt="himal shrestha">
                    </div>
                </div>
            </div>
            <!-- /large title contact -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center">
                <ul class="social-icons text-center">
                    <li class="wow bounce animated animated" data-wow-duration="2s" data-wow-iteration="100" data-wow-delay="0.3s"><a href="https://www.facebook.com/himalshresthaofficial" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="wow bounce animated animated" data-wow-duration="2s" data-wow-iteration="100" data-wow-delay="0.1s"><a href="https://www.instagram.com/himal4u/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  
                    <li class="wow bounce animated animated" data-wow-duration="2s" data-wow-iteration="100" data-wow-delay="0.3s"><a href="https://twitter.com/mhimal" target="_blank"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>

            <!-- copyright -->
                <hr class="white-hr">
            <div class="copyright-block col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="copyright-block">
                        <p class="pull-left color-black wow animated fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">Copyright &copy; <span id="displayYear"></span> by <span class="color-black">HimalShrestha</span> . All rights reserved.</p>
                       <p class="pull-right color-black wow animated fadeInUp"  data-wow-duration="2s" data-wow-delay="0.2s">Website by <span><a href="http://brevincreation.com/#about-us/"  class="color-black">Brevin Creation</a></span></p>
                </div>
            </div>
            <!-- copyright -->

        </div>
    </div>
</section>
<!-- footer section -->

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/audioList.js"></script>
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