<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="Home.php">Vinas Deluxe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active me-2" href="index.php">Home</a></li>

                <?php if (isset($_SESSION['user_email'])): ?>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="rooms.php">Rooms</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#" onclick="showLoginModal()">Rooms</a>
                    </li>
                <?php endif; ?>
                
                <li class="nav-item"><a class="nav-link me-2" href="facilities.php">Facilities</a></li>
                <li class="nav-item"><a class="nav-link me-2" href="contact.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link me-2" href="about.php">About</a></li>
            </ul>

            <div class="d-flex">
                <?php if (isset($_SESSION['user_email'])): ?>
                    <a href="logouts.php" class="btn btn-outline-dark shadow-none">Logout</a>
                <?php else: ?>
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" 
                        data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" 
                        data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<?php if (isset($_SESSION['register_error'])): ?>
    <div id="error-message" class="alert alert-danger text-center">
        <?php echo $_SESSION['register_error']; ?>
    </div>
    <?php unset($_SESSION['register_error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['register_success'])): ?>
    <div id="success-message" class="alert alert-success text-center">
        <?php echo $_SESSION['register_success']; ?>
    </div>
    <?php unset($_SESSION['register_success']); ?>
<?php endif; ?>

<script>
    setTimeout(function() {
        let errorMsg = document.getElementById('error-message');
        let successMsg = document.getElementById('success-message');
        if (errorMsg) errorMsg.style.display = 'none';
        if (successMsg) successMsg.style.display = 'none';
    }, 3000);
</script>


<div class="modal fade <?php if(isset($_SESSION['error_message'])) echo 'show d-block'; ?>" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="login.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-person fs-3 me-2"></i> User Login
                    </h5>
                    <button type="button" class="btn-close shadow-none close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo "<div class='alert alert-danger'>{$_SESSION['error_message']}</div>";
                        unset($_SESSION['error_message']);
                    }
                    ?>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control shadow-none" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control shadow-none" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    <?php if (isset($_SESSION['error_message'])): ?>
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    <?php endif; ?>
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const closeModalBtn = document.querySelector(".close-modal");
        if (closeModalBtn) {
            closeModalBtn.addEventListener("click", function() {
                document.getElementById("loginModal").classList.remove("show", "d-block");
                document.body.classList.remove("modal-open");
                let modalBackdrop = document.querySelector(".modal-backdrop");
                if (modalBackdrop) modalBackdrop.remove();
            });
        }
    });
</script>

<script>
    setTimeout(function() {
        let successAlert = document.getElementById('loginSuccess');
        if (successAlert) {
            successAlert.style.transition = "opacity 0.5s";
            successAlert.style.opacity = "0";
            setTimeout(() => successAlert.remove(), 500);
        }
    }, 3000);
</script>

<?php if (isset($_SESSION['register_success'])): ?>
    <div id="registerSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['register_success']; unset($_SESSION['register_success']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['register_error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['register_error']; unset($_SESSION['register_error']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content container-fluid">
            <form action="register.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" class="form-control shadow-none" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control shadow-none" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="dob" class="form-control shadow-none" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control shadow-none" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control shadow-none" required>
                </div>

                <button type="submit" class="btn btn-dark shadow-none w-100">REGISTER</button>
            </form>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        let successAlert = document.getElementById('registerSuccess');
        if (successAlert) {
            successAlert.style.transition = "opacity 0.5s";
            successAlert.style.opacity = "0";
            setTimeout(() => successAlert.remove(), 500);
        }
    }, 3000);
</script>


