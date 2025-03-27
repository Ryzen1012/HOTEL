<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/hotel/favicon.ico" type="image/x-icon">

<style>
  .btn {
    background-color: #8B5E3C !important;
    color: white !important;
    border-color: #8B5E3C !important;
}
</style>


   <?php require('inc/links.php'); ?>
    <title>Vinas Deluxe - CONTACT</title>
  
</head>

<body class="bg-light">

    <?php require('inc/header.php');?>
      <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <hr>
        <p class="text-center mt-3">
        Our exceptional facilities are designed to elevate your experience and ensure a truly unforgettable stay. <br>
        Explore everything we have to offer and indulge in the perfect blend of relaxation and convenience!
        </p>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class=" bg-white rounded shadow p-4">
              <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3851.459702233642!2d120.58743607488377!3d15.133077985418813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f24ec2f5a1f9%3A0x5e0af8a6aaab2282!2sHoly%20Angel%20University!5e0!3m2!1sen!2sph!4v1740897226811!5m2!1sen!2sph"></iframe>
                <h5>Address</h5>
                <a href="https://maps.app.goo.gl/L9Kq259M1MtvNg2z9" target="_blank "class="d-inline-vlock text-decoration-none text-dark mb-2">
                <i class="bi bi-geo"></i>Angeles City Pampanga
                </a>
                <h5 class="mt-4">Call Us</h5>
            <a href="tel: +09876543212" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone"></i> 09876543212</a>
            <br>
            <a href="tel: +09876543212" class="d-inline-block text-decoration-none text-dark">
              <i class="bi bi-telephone"></i> 09876543212</a>
              <h5 class="mt-4">Email</h5>
              <a href="mailto:: ask.cabralmarifel06@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope-at"></i> Ask Angelene 
              </a>
              <h5 class='mt-2'>Follow Us</h5>
            <a href="#" class="d-inline-block  text-dark fs-5 me-2">
            
              <i class="bi bi-twitter-x me-1"></i>
           
            </a>
            
            <a href="#" class="d-inline-block  text-dark fs-5 me-2">
             
              <i class="bi bi-facebook me-1"></i>
              
            </a>
            
            <a href="#" class="d-inline-block text-dark fs-5 me-2">
              
              <i class="bi bi-instagram me-1"></i>
           
            </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6  px-4">
            <div class="bg-white rounded shadow p-4 ">
             
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form id="contactForm">
    <h5>Send a message</h5>
    <div class="mt-3">
        <label class="form-label" style='font-weight:500;'>Name</label>
        <input type="text" class="form-control shadow-none" name="name" required>
    </div>
    <div class="mt-3">
        <label class="form-label" style='font-weight:500;'>Email</label>
        <input type="email" class="form-control shadow-none" name="email" required>
    </div>
    <div class="mt-3">
        <label class="form-label" style='font-weight:500;'>Subject</label>
        <input type="text" class="form-control shadow-none" name="subject" required>
    </div>
    <div class="mt-3">
        <label class="form-label" style='font-weight:500;'>Message</label>
        <textarea class="form-control shadow-none" rows="5" style='resize:none;' name="message" required></textarea>
    </div>
    <button type="submit" class="btn text-white custom-bg mt-3 shadow-none">SEND</button>
</form>

<script>
    $(document).ready(function () {
        $("#contactForm").submit(function (event) {
            event.preventDefault();

            console.log("Form Submitted! Sending AJAX request...");

            $.ajax({
                type: "POST",
                url: "process_contact.php",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    console.log("AJAX Success Response:", response);

                    if (response.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Message Sent!",
                            text: response.message,
                            confirmButtonColor: "#FF0000"
                        });
                        $("#contactForm")[0].reset();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: response.message,
                            confirmButtonColor: "#FF0000"
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.log("AJAX Error:", error);
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "Message sending failed!",
                        confirmButtonColor: "#FF0000"
                    });
                }
            });
        });
    });
</script>

            </div>
          </div>   
        </div>
      </div>


    <?php require('inc/footer.php');?>

</body>
</html>