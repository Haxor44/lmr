<!doctype html>

<html lang="en" class="no-js"><!--<![endif]-->


<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <link rel="icon" type="image/x-icon" href="http://webbox-assets.siteminder.com/assets/images/favicon-home.ico">
    <title>Lanet Matfam Resort</title>
    
    <meta property="og:url" content="rooms.html">
    <meta property="og:image"
        content="http://webbox.imgix.net/images/oCIHoVvCdCBfqGiT/452c4a04-4a8a-4777-893d-9ee3a4986396.jpg">
    <link rel="stylesheet" href="{{ url('/app.css') }}" />
   
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body >
  <div id="app">
  <header>
    <nav>
        <div class="nav__bar">
          <div class="logo">
            <a href="#"><img src="assets/logo.png" alt="logo" /></a>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/rooms') }}">Rooms</a></li>
          <li><a href="#service">Services</a></li>
          <li><a href="#explore">Events</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <button class="btns nav__btn">Accounts</button>
      </nav>
    </header>
  </div>
    
    <main style="margin-top:7rem;">
            @yield('content')
    </main>

    <footer class="footer" id="contact" style="background-color: #0c0a09; margin-top: 10rem;">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo">
            <a href="#home"><img src="assets/logo.png" alt="logo" /></a>
          </div>
          <p class="section__description">
            Discover a world of comfort, luxury, and adventure as you explore
            our curated selection of hotels, making every moment of your getaway
            truly extraordinary.
          </p>
          <button class="btns">Book Now</button>
        </div>
        <div class="footer__col">
          <h4>QUICK LINKS</h4>
          <ul class="footer__links">
            <li><a href="#">Browse Destinations</a></li>
            <li><a href="#">Special Offers & Packages</a></li>
            <li><a href="#">Room Types & Amenities</a></li>
            <li><a href="#">Customer Reviews & Ratings</a></li>
            <li><a href="#">Travel Tips & Guides</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>OUR SERVICES</h4>
          <ul class="footer__links">
            <li><a href="#">Gym</a></li>
            <li><a href="#">Saloon</a></li>
            <li><a href="#">Massage</a></li>
            <li><a href="#">Car wash</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>CONTACT US</h4>
          <ul class="footer__links">
            <li><a href="#">evolmalek04@gmail.com</a></li>
          </ul>
          <div class="footer__socials">
            <a href="#"><img src="images/facebook.png" alt="facebook" /></a>
            <a href="#"><img src="images/instagram.png" alt="instagram" /></a>
            <a href="#"><img src="images/youtube.png" alt="youtube" /></a>
            <a href="#"><img src="images/twitter.png" alt="twitter" /></a>
          </div>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Lanet Matfam Resort. All rights reserved.
      </div>
    </footer>

    
  </body>


</html>