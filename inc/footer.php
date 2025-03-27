<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
date_default_timezone_set("Asia/Manila");
?>
<div class="container-fluid bg-white mt-5">
      <div class="row">
        <div class="col-lg-4 p-4 ">
          <h3 class="h-font fw-bold fs-3">VINAS DELUXE</h3>
          <p>
          Where Luxury Meets Comfort.
          </p>
        </div>
        <div class="col-lg-4 p-4">
          <h5 class="mb-3"></h5>
          <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
          <a href="" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
          <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a> <br>
          <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a> <br>
          <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
        </div>
        <div class="col-lg-4 p-4">
          <h5 class="mb-3">Follow Us</h5>
          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2"><i class="bi bi-twitter-x me-1"></i>Twitter</a><br>

          <a href="#" class="d-inline-block text-dark text-decoration-none mb-2"><i class="bi bi-facebook me-1"></i>Facebook</a><br>

          <a href="#" class="d-inline-block text-dark text-decoration-none"><i class="bi bi-instagram me-1"></i>Instagram</a><br>
        </div>
      </div>
    </div>
    <div class="text-center mt-3">
    <p>Current Date and Time: <?php echo date("l, F j, Y - h:i A"); ?></p>
</div>



<h6 class="text-center bg-dark text-white p-3 m-0">ALL RIGHTS RESERVED &copy; 2025</h6>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>