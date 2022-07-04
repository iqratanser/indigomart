   <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer">
                                <h2 class="title__line--2">ABOUT US</h2>
                                <div class="ft__details">
                                    <p>WE Sell Products Online .... </p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">information</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="about.php">About us</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                        <li><a href="policies.php#privacypolicy">Privacy & Policy</a></li>
                                        <li><a href="policies.php">Terms  & Condition</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                     
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Our service</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="Customers/login.php">My Account</a></li>
                                        <li><a href="show-cart.php">My Cart</a></li>
                                        <li><a href="Customers">Login</a></li>
                                        <li><a href="Customers/Wishlist.php">Wishlist</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Shopping Bazzar </h2>
                                <div class="ft__inner">
                                   
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>Copyright© <a href="index.php">Indigo Mart</a> 2021. All right reserved.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="assets/ShopPage/js/vendor/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {

            
           $(window).on("beforeunload", function() { 
              $.ajax({
                      url:"function.php",
                      method:"post",
                      dataType:"json",
                      data:{opp:"cookie"},
                      success:function(response){
                       

        }
     });
            });
        });
    </script>

    
    <!-- Bootstrap framework js -->
    <script src="assets/ShopPage/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="assets/ShopPage/js/plugins.js"></script>
    <script src="assets/ShopPage/js/slick.min.js"></script>
    <script src="assets/ShopPage/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="assets/ShopPage/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="assets/ShopPage/js/main.js"></script>
    
</body>

</html>