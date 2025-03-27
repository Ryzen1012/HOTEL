<?php

session_start();

if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {

    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['user_email'])) {

    header("Location: login.php");
    exit();
}
if (isset($_SESSION['booking_success']) && $_SESSION['booking_success']) {
    echo '<script>alert("Booking Successfully!");</script>';
    unset($_SESSION['booking_success']);
}

require 'db_connect.php';

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" href="img/hotel/favicon.ico" type="image/x-icon">

    <?php require('inc/links.php');
     ?>

    <title>Vinas Deluxe - ROOMS</title>

    <style>
        :root {
            --brown: #8B5E3C;
            --brown_hover: #754C29;
            --gray: #808080;
            --green: #28a745;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .h-font {
            font-family: 'Gelasio', serif;
        }

        .custom-bg {
            background-color: var(--brown);
            border: 1px solid var(--brown);
        }

        .custom-bg:hover {
            background-color: var(--brown_hover);
            border-color: var(--brown_hover);
        }

        .qr-code {
            display: none;
            width: 400px;
            margin-top: 10px;
        }

        .status-available {
            color: var(--green);
            font-weight: bold;
        }

        .status-unavailable {
            color: var(--gray);
            font-weight: bold;
        }

        .warning-message {
            color: red;
            font-weight: bold;
            display: none;
        }
        .btn {
                background-color: #8B5E3C !important;
                color: white !important;
                border-color: #8B5E3C !important;
            }

         .btn:hover {
                background-color: #754C29 !important;
                border-color: #754C29 !important;
            }
   
    </style>
</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-9 col-md-12 px-4">
                <?php 
                    $rooms = [
                        [
                            "name" => "Vanilla Cove",
                            "image" => "img/rooms/room 1.jpg",
                            "price" => "₱2,500/night",
                            "features" => [
                                "1 Double-size Bed", "Bathroom", "Air Condition (Hot & Cold)", 
                                "Room Safety", "Wi-Fi", "Dining"
                            ],
                            "facilities" => ["Pool", "Elevator", "Parking"],
                            "guests" => ["5 Adults", "4 Children"],
                            "status" => "Unavailable"
                        ],
                        [
                            "name" => "Family Haven",
                            "image" => "img/rooms/room 2.jpg",
                            "price" => "₱3,000/night",
                            "features" => [
                                "1 Double-size Bed", "Bathroom", "Air Condition (Hot & Cold)", 
                                "Room Safety", "Wi-Fi", "Dining"
                            ],
                            "facilities" => ["Pool", "Elevator", "Parking"],
                            "guests" => ["5 Adults", "4 Children"],
                            "status" => "Available"
                        ],
                        [
                            "name" => "Midnight Haven",
                            "image" => "img/rooms/room 4.jpg",
                            "price" => "₱4,500/night",
                            "features" => [
                                "1 Double-size Bed", "Bathroom", "Air Condition (Hot & Cold)", 
                                "Room Safety", "Wi-Fi", "Dining"
                            ],
                            "facilities" => ["Pool", "Elevator", "Parking"],
                            "guests" => ["5 Adults", "4 Children"],
                            "status" => "Unavailable" 
                        ],
                        [
                            "name" => "Ocean Breeze",
                            "image" => "img/rooms/room5.jpg",
                            "price" => "₱5,000/night",
                            "features" => [
                                "2 Queen-size Beds", "Sea View", "Bathroom", "Air Condition", 
                                "Mini Bar", "Wi-Fi", "Dining"
                            ],
                            "facilities" => ["Private Beach", "Pool", "Spa"],
                            "guests" => ["6 Adults", "4 Children"],
                            "status" => "Available"
                        ],
                        
                        [
                            "name" => "Garden Escape",
                            "image" => "img/rooms/room6.jpg",
                            "price" => "₱4,200/night",
                            "features" => [
                                "2 Queen-size Bed", "2 Bathrooms", "Living Room", "Garden View", "Bathroom", "Air Condition", 
                                "Room Safety", "Wi-Fi", "Dining"
                            ],
                            "facilities" => ["Garden Access", "Pool", "Parking"],
                            "guests" => ["4 Adults", "3 Children"],
                            "status" => "Available"
                        ]
                    ];
                    
                ?>
                
                <?php foreach ($rooms as $index => $room): ?>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 px-lg-3">
                            <img src="<?= $room['image']; ?>" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5">
                            <h5 class="mb-3"> <?= $room['name']; ?> </h5>
                            <h5 class="card-title"> <?= $room['price']; ?> </h5>
                            <p class="status <?= $room['status'] == 'Available' ? 'status-available' : 'status-unavailable' ; ?>">
                                <?= $room['status']; ?>
                            </p>
                            
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="card-body">
                            <button class="btn btn-sm w-100 text-white shadow-none mb-2 
                    <?= $room['status'] == 'Unavailable' ? 'bg-secondary disabled' : 'custom-bg'; ?>" 
                    <?= $room['status'] == 'Unavailable' ? 'disabled' : ''; ?> 
                    data-bs-toggle="modal" 
                    <?= $room['status'] == 'Unavailable' ? '' : 'data-bs-target="#bookNowModal"'; ?>
                    onclick="setRoomId(<?= $index; ?>)">
                        Book Now
                    </button>

                                <button class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2" data-bs-toggle="modal" data-bs-target="#roomDetailsModal<?= $index; ?>">More Details</button>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="roomDetailsModal<?= $index; ?>" tabindex="-1" aria-labelledby="roomDetailsModalLabel<?= $index; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="roomDetailsModalLabel<?= $index; ?>">Room Details: <?= $room['name']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6>Features:</h6>
                                <ul>
                                    <?php foreach ($room['features'] as $feature): ?>
                                    <li><?= $feature; ?></li>
                                    <?php endforeach; ?>
                                </ul>

                                <h6>Facilities:</h6>
                                <ul>
                                    <?php foreach ($room['facilities'] as $facility): ?>
                                    <li><?= $facility; ?></li>
                                    <?php endforeach; ?>
                                </ul>

                                <h6>Guests:</h6>
                                <ul>
                                    <?php foreach ($room['guests'] as $guest): ?>
                                    <li><?= $guest; ?></li>
                                    <?php endforeach; ?>
                                </ul>

                                <h6>Status:</h6>
                                <p class="status <?= $room['status'] == 'Available' ? 'status-available' : 'status-unavailable'; ?>">
                                    <?= $room['status']; ?>
                                </p>

                                <h6>Price:</h6>
                                <p><?= $room['price']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div> 
        </div>
    </div>

<div class="modal fade" id="bookNowModal" tabindex="-1" aria-labelledby="bookNowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookNowModalLabel">Book a Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="bookingForm" action="book_form.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="roomId" name="roomId" value="<?php echo $roomId; ?>">
    <div class="mb-3">
        <label for="fullName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fullName" name="fullName" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="proofOfPayment" class="form-label">Proof of Payment</label>
        <input type="file" class="form-control" id="proofOfPayment" name="proofOfPayment" accept="image/*" required>
        </div>
    <div class="mb-3">
    <label for="checkInDate" class="form-label">Check-in Date</label>
    <input type="date" class="form-control" id="checkInDate" name="checkIn" required>
    </div>
    <div class="mb-3">
    <label for="checkOutDate" class="form-label">Check-out Date</label>
    <input type="date" class="form-control" id="checkOutDate" name="checkOut" required>
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" id="age" name="age" required>
    </div>
    <div class="mb-3">
        <label for="paymentMethod" class="form-label">Payment Method</label>
        <select class="form-select" id="paymentMethod" name="paymentMethod" required>
            <option value="" disabled selected>Select Payment Method</option>
            <option value="e-wallet">E-Wallet</option>
            <option value="bank">Bank Transfer</option>
        </select>
    </div>
    <div class="mb-3 text-center">
        <img id="qrCode" class="qr-code d-none" src="img/qr/qr.jpg" alt="QR Code for E-Wallet">
        <img id="bankQrCode" class="qr-code d-none" src="img/qr/qr.jpg" alt="QR Code for Bank Transfer">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
    </div>
</form>
<p id="warningMessage" class="warning-message">You must be 18 or older to book a room.</p>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>

function setRoomId(roomIndex) {
    document.getElementById('roomId').value = roomIndex;
}

document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("checkInDate").setAttribute("min", today);
    document.getElementById("checkOutDate").setAttribute("min", today);
});

document.getElementById("checkInDate").addEventListener("change", function () {
    document.getElementById("checkOutDate").setAttribute("min", this.value);
});

document.getElementById("bookingForm").addEventListener("submit", function(event) {
    console.log("Form submitted!");

    const checkIn = new Date(document.getElementById("checkInDate").value);
    const checkOut = new Date(document.getElementById("checkOutDate").value);
    const age = parseInt(document.getElementById("age").value);
    const proofOfPayment = document.getElementById("picture").files.length;

    const warningMessage = document.getElementById("warningMessage");
    const dateWarningMessage = document.getElementById("dateWarningMessage");

    warningMessage.classList.add("d-none");
    dateWarningMessage.classList.add("d-none");

    if (age < 18) {
        warningMessage.classList.remove("d-none");
        return;
    }

    if (checkOut <= checkIn) {
        dateWarningMessage.classList.remove("d-none");
        return;
    }

    if (proofOfPayment === 0) {
        alert("Please upload proof of payment.");
        return;
    }

    alert("Booking Confirmed!");
    this.submit();
});

document.getElementById("paymentMethod").addEventListener("change", function () {
    const paymentMethod = this.value;
    document.getElementById("qrCode").classList.toggle("d-none", paymentMethod !== "e-wallet");
    document.getElementById("bankQrCode").classList.toggle("d-none", paymentMethod !== "bank");
});
</script>

</body>
</html>
