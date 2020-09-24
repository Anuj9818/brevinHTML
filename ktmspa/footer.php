<!-- footer starts here -->
<footer class="section-footer section-padding">
    <div class="container">
        <!-- Three column Footer -->
        <div class="row">
                    
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="footer-widget about-footer">
            <img src="images/logo.png">
            <div class="social-media-icons">
                <ul class="">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="footer-widget">
            <h3>Contact Details</h3>
            <ul class="footer-gallery">
                <li><i class="fa fa-map-marker"></i> Thamel, Ktm 44600</li>
                <li><i class="fa fa-phone"></i> 01-4422661</li>
                <li><i class="fa fa-envelope"></i> ktmspa@gmail.com</li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4">
            <div class="footer-widget">
            <h3>Quick Links</h3>
            <ul class="footer-menu">
                <li><a href="index.php" class="hvr-forward"><i class="fas fa-angle-double-right"></i> Home</a></li>
                <li><a href="about.php" class="hvr-forward"><i class="fas fa-angle-double-right"></i> About</a></li>
                <li><a href="packages.php" class="hvr-forward"><i class="fas fa-angle-double-right"></i> Packages</a></li>
                <li><a href="gallery.php" class="hvr-forward"><i class="fas fa-angle-double-right"></i> Gallery</a></li>
                <li><a href="contact.php" class="hvr-forward"><i class="fas fa-angle-double-right"></i> Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<div class="btm-footer">
    <div class="container">
                <div class="row">
            <div class="col-lg-6">
                <div class="copyright">
                    <p>&copy; <span id="displayYear"></span>. <strong class="title color-orange"> KTM SPA.</strong> All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="powered">
                    <span>Design & Developed by <a href="http://brevincreation.com/#about" target="_blank">brevin creation</a></span>
                </div>
                <a href="#" class="scrollup"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
</footer>

<div class="footer-button">
    <div class="container">
        <div class="row d-block">
            <div class="hidden-lg hidden-md hidden-sm col-xs-12">
                <ul class="footer-bar">
                    <li><a href="./"><i class="fa fa-home"></i></a></li>
                    <li><a href="tel:000000"><i class="fa fa-phone"></i></a></li>
                    <li><a href="sms:000000"><i class="fa fa-comment"></i></a></li>
                    <li><a href="mailto:ktmspa@gmail.com"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

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
            mobile: false,
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
<!-- footer ends here -->