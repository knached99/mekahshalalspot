 <!-- footer section -->
 <footer class="footer_section">
     <div class="container">
         <div class="row">
             <div class="col-md-4 footer-col">
                 <div class="footer_contact">
                     <h4>
                         Contact Us
                     </h4>
                     <div class="contact_link_box">
                         <a href="https://maps.app.goo.gl/iRwjn2gLEyBefYRP6" target="_blank" rel="noopener noreferrer">
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <span>
                                 Location
                             </span>
                         </a>
                         <a href="">
                             <i class="fa fa-phone" aria-hidden="true"></i>
                             <span>
                                 Call (203)-931-1444
                             </span>
                         </a>

                     </div>
                 </div>
             </div>
             <div class="col-md-4 footer-col">
                 <div class="footer_detail">
                     <a href="" class="footer-logo">
                         Mekah's Halal Spot
                     </a>
                     <p>
                         Necessary, making this the first true generator on the Internet. It uses a dictionary of over
                         200 Latin words, combined with
                     </p>
                     <div class="footer_social">
                         <a href="">
                             <i class="fa fa-facebook" aria-hidden="true"></i>
                         </a>
                         <a href="">
                             <i class="fa fa-twitter" aria-hidden="true"></i>
                         </a>
                         <a href="">
                             <i class="fa fa-linkedin" aria-hidden="true"></i>
                         </a>
                         <a href="">
                             <i class="fa fa-instagram" aria-hidden="true"></i>
                         </a>
                         <a href="">
                             <i class="fa fa-pinterest" aria-hidden="true"></i>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-4 footer-col">
                 <h4>
                     Opening Hours
                 </h4>
                 <p>
                     Everyday
                 </p>
                 <p>
                     11.00 Am -11.00 Pm
                 </p>
             </div>
         </div>
         <div class="footer-info" style="visibility: hidden;">
             <p>
                 &copy; <span id="displayYear"></span> All Rights Reserved By
                 <a href="https://html.design/">Free Html Templates</a><br><br>
                 &copy; <span id="displayYear"></span> Distributed By
                 <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
             </p>
         </div>
     </div>
 </footer>
 <!-- footer section -->

 <!-- jQery -->
 <script src="js/jquery-3.4.1.min.js"></script>
 <!-- popper js -->
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
     integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
 </script>
 <!-- bootstrap js -->
 {{-- <script src="{{asset('js/bootstrap.js')}}"></script> --}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
 </script>

 <!-- owl slider -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 <!-- isotope js -->
 <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
 <!-- nice select -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
 <!-- custom js -->
 <script src="{{ asset('js/custom.js') }}"></script>
 <!-- Google Map -->
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
 </script>
 <!-- End Google Map -->

 <!-- Inject script if on catering menu -->
 @if (\Route::currentRouteName() === 'catering')
     <script src="{{ asset('js/zoomLens.js') }}"></script>
     <script src="{{ asset('js/deviceDetect.js') }}"></script>
 @endif
 </body>

 </html>
