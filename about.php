<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="icon" href="img/hotel/favicon.ico" type="image/x-icon">

   <?php require('inc/links.php'); ?>
    <style>
      .box{
        border-top-color: var(--black) !important;
      }

      .btn {
    background-color: #8B5E3C !important;
    color: white !important;
    border-color: #8B5E3C !important;
}
    </style>

    <title>Vinas Deluxe - ABOUT</title>
    
</head>

<body class="bg-light">

    <?php require('inc/header.php');?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2>
        <hr>
        <h5 class="text-center mt-3">
        Our exceptional facilities are designed to elevate your experience and ensure a truly unforgettable stay. <br>
        Explore everything we have to offer and indulge in the perfect blend of relaxation and convenience!
</h5>
      </div>

      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
            <h3 class='mb-3'></h3>
            <h5>
            Vinas Deluxe Hotel offers a perfect blend of luxury, comfort, and exceptional hospitality. Nestled in a prime location, our hotel provides elegant accommodations, world-class amenities, and personalized services to ensure a memorable stay. Guests can enjoy fine dining, relaxing spa treatments, a state-of-the-art gym, and top-tier recreational facilities. Whether traveling for business or leisure, Vinas Deluxe Hotel guarantees a refined experience with warm hospitality and impeccable service.
</h5>
          </div>
          <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
            <img src="img/about/building.jpg" class="w-100">
          </div>
        </div>
      </div>

      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class='bg-white rounded shadpw p-4 border-top border-4 text-center box'>
              <img src="img/about/hotel.svg" width='70px'>
              <h4 class='mt-3'>100+ ROOMS</h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class='bg-white rounded shadpw p-4 border-top border-4 text-center box'>
              <img src="img/about/customers.svg" width='70px'>
              <h4 class='mt-3'>200+ CUSTOMERS</h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class='bg-white rounded shadpw p-4 border-top border-4 text-center box'>
              <img src="img/about/ratings.svg" width='70px'>
              <h4 class='mt-3'>100+ REVIEWS</h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class='bg-white rounded shadpw p-4 border-top border-4 text-center box'>
              <img src="img/about/staff.svg" width='70px'>
              <h4 class='mt-3'>200+ STAFF</h4>
            </div>
          </div>
        </div>
      </div>


      <h3 class='my-5 fw-bold h-font text-center'>DEVELOPMENT TEAM</h3>
      <div class="container px-4">
       <div class="swiper mySwiper">
       <div class="swiper-wrapper mb-5">
           <div class="swiper-slide bg-white text-center overflow-hidden rounded">
            <img src="img/about/m1.jpg" class='w-100'>
            <h5 class=''mt-2>Ryzen Guerrero</h5>
           </div>
           <div class="swiper-slide bg-white text-center overflow-hidden rounded">
            <img src="img/about/m4.jpg" class='w-100'>
            <h5 class=''mt-2>Angelene Guiao</h5>
           </div>
           <div class="swiper-slide bg-white text-center overflow-hidden rounded">
            <img src="img/about/m3.jpg" class='w-100'>
            <h5 class=''mt-2>Marifel Cabral</h5>
           </div>
           <div class="swiper-slide bg-white text-center overflow-hidden rounded">
            <img src="img/about/m2.jpg" class='w-100'>
            <h5 class=''mt-2>Aj Antonio</h5>
           </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      </div>




    <?php require('inc/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
<script>
var swiper = new Swiper(".mySwiper", {
  loop: true, 
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 4,
    }
  }
});

</script>


</body>
</html>