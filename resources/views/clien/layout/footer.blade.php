
        <!-- main-content-wrap end -->

        <!-- footer Start -->
        <footer>
            <div class="footer-top section-pb section-pt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">

                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Contact Info</h6>

                                <div class="footer-addres">
                                    <div class="widget-content mb--20">
                                        <p>Address: 123 Main Street, Anytown, <br> CA 12345 - USA.</p>
                                        <p>Phone: <a href="tel:">(012) 800 000 789</a></p>
                                        <p>Fax: <a href="tel:">(012) 800 888 789</a></p>
                                        <p>Email: <a href="tel:">demo@hashthemes.com</a></p>
                                    </div>
                                </div>

                                <ul class="social-icons">
                                    <li>
                                        <a class="facebook social-icon" href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter social-icon" href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="instagram social-icon" href="#" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a class="linkedin social-icon" href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss social-icon" href="#" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Information</h6>
                                <ul class="footer-list">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact.html">Quick Contact</a></li>
                                    <li><a href="blog.html">Blog Pages</a></li>
                                    <li><a href="#">Concord History</a></li>
                                    <li><a href="#">Client Feed</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Extras</h6>
                                <ul class="footer-list">
                                   
                                    <li><a href="#">Concord History</a></li>
                                    <li><a href="#">Client Feed</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact.html">Quick Contact</a></li>
                                    <li><a href="blog.html">Blog Pages</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Get the app</h6>
                                <p>GreenLife App is now available on Google Play & App Store. Get it now.</p>
                                <ul class="footer-list">
                                    <li><img src="{{ asset('clien/assets/images/brand/img-googleplay.jpg')}}" alt=""></li>
                                    <li><img src="{{ asset('clien/assets/images/brand/img-appstore.jpg')}}" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="copy-left-text">
                                <p>Copyright &copy; <a href="#">Ruiz</a> 2019. All Right Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="copy-right-image">
                                <img src="{{ asset('clien/assets/images/icon/img-payment.png')}}" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer End -->

    </div>

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{ asset('clien/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>

    <!-- jquery -->		
    <script src="{{ asset('clien/assets/js/vendor/jquery-3.6.1.min.js')}}"></script>
    <script src="{{ asset('clien/assets/js/vendor/jquery-migrate-3.4.0.min.js')}}"></script>		

    <!-- Bootstrap JS -->
    <script src="{{ asset('clien/assets/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('clien/assets/js/plugins/slick.min.js')}}"></script>
    <script src="{{ asset('clien/assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('clien/assets/js/plugins/countdown.min.js')}}"></script>
    <script src="{{ asset('clien/ssets/js/plugins/image-zoom.min.js')}}"></script>
    <script src="{{ asset('clien/assets/js/plugins/fancybox.js')}}"></script>
    <script src="{{ asset('clien/assets/js/plugins/scrollup.min.js')}}"></script>
    <script src="{{ asset('clien/assets/js/plugins/jqueryui.min.js')}}"></script>
     <script src="{{ asset('clien/assets/js/plugins/ajax-contact.js')}}"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

    <!-- Main JS -->
    <script src="{{ asset('clien/assets/js/main.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#sort').on('change',function(){
                var url = $(this).val();
                if(url){
                    window.location = url;
                }
                return false;
            })
        })

    </script>

</body>


<!-- Mirrored from htmldemo.net/ruiz/ruiz/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Apr 2023 14:58:44 GMT -->
</html>