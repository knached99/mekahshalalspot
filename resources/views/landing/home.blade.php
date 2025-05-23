<x-header />
<div class="hero_area">
    <div class="bg-box">
        <!-- <img src="images/chicken_basket_hero.png"  alt=""> -->
        <video width="100%" height="auto" autoplay loop muted>
            <source src="videos/bgVid.mov" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Navbar -->
    <x-navbar />
    <!-- / Navbar -->
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box"
                                    style="display: flex; justify-content: center; align-items: center; height: 100vh; width: 100%;">
                                    <div class="overlay"></div>
                                    <div class="content"
                                        style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                        <img src="images/logo.avif" class="logo">
                                        <h1 class="restaurantTitle">Mekahs</h1>
                                        <h2 class="restaurauntSubTitle">Halal Spot</h2>
                                        <p>403 Saw Mill Rd, West Haven, CT 06516</p>
                                        <div class="btn-box">
                                            <a href="https://www.ubereats.com/..." target="_blank"
                                                rel="noopener noreferrer" class="btn1">Order Now</a>
                                            <h6 class="mt-4 text-white"
                                                style="font-weight: 800; font-size: 25px; font-style: italic; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                                                Please note, this is our <span class="fw-bold">only</span> location as
                                                of now<h6>
                                        </div>
                                    </div>
                                </div>



                                <!-- Has dark overlay for bright videos in background-->
                                <!-- <div class="detail-box" style="position: relative; overflow: hidden; padding: 40px;">
                    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6); z-index: 1;"></div>
                    <h1 style="font-weight: 900; position: relative; z-index: 2; color: white;">Crown Chicken & Fish</h1>
                    <p style="font-weight: 800; position: relative; z-index: 2; color: white;">403 Saw Mill Rd, West Haven, CT 06516</p>
                    <div class="btn-box" style="position: relative; z-index: 2;">
                      <a href="https://www.ubereats.com/store/crown-fried-chicken-%26-fish/evRCIlylTtazJen8954vwQ?diningMode=DELIVERY&pl=JTdCJTIyYWRkcmVzcyUyMiUzQSUyMjM3MCUyMFBhaW50ZXIlMjBEciUyMiUyQyUyMnJlZmVyZW5jZSUyMiUzQSUyMmhlcmUlM0FhZiUzQXN0cmVldHNlY3Rpb24lM0FCaFoyUUg0S1JzcXN3ak41LWQ5dTVCJTNBQ2djSUJDREMwckFhRUFFYUF6TTNNQSUyMiUyQyUyMnJlZmVyZW5jZVR5cGUlMjIlM0ElMjJoZXJlX3BsYWNlcyUyMiUyQyUyMmxhdGl0dWRlJTIyJTNBNDEuMjY2NzklMkMlMjJsb25naXR1ZGUlMjIlM0EtNzIuOTU4MjUlN0Q%3D&sc=SEARCH_SUGGESTION" target="_blank" rel="noopener noreferrer" class="btn1" style="color: white;">Order Now</a>
                    </div>
                  </div> -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Fast Food Restaurant
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Fast Food Restaurant
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="container">



            <!-- <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol> -->
        </div>
</div>

</section>
<!-- end slider section -->
</div>

<!-- offer section -->

<x-home.deals :deal="$deal" />

<!-- end offer section -->

@if (!$sections->isEmpty())
    <!-- food section -->
    <div style="height: 100vh; overflow-x: hidden; overflow-y: auto;">
        <x-home.menu :sections="$sections" :menuItems="$menuItems" />
    </div>
    <!-- end food section -->
@endif
<!-- about section -->

<x-home.about :content="$content" />

<!-- end about section -->

<!-- Contact section -->
<x-home.contact-us />
<!-- end Contact section -->

<!-- Customer Reviews -->
<!-- These reviews will be pulled up from Google -->
<!-- end customer reviews section -->
<!-- Footer -->
<x-footer />
