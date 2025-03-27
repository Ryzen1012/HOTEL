<?php
include 'db_connect.php';

$sql = "INSERT INTO rooms (name, image, price, features, facilities, guests, status) 
VALUES 
('Vanilla Cove', 'img/rooms/room1.jpg', 2500.00, '1 Double-size Bed, Bathroom, Air Condition (Hot & Cold), Room Safety, Wi-Fi, Dining', 'Pool, Elevator, Parking', '5 Adults, 4 Children', 'Unavailable'),
('Family Haven', 'img/rooms/room2.jpg', 3000.00, '1 Double-size Bed, Bathroom, Air Condition (Hot & Cold), Room Safety, Wi-Fi, Dining', 'Pool, Elevator, Parking', '5 Adults, 4 Children', 'Available'),
('Ocean Breeze', 'img/rooms/room3.jpg', 4500.00, '1 Double-size Bed, Bathroom, Air Condition (Hot & Cold), Room Safety, Wi-Fi, Dining', 'Pool, Elevator, Parking', '5 Adults, 4 Children', 'Available'),
('Midnight Haven', 'img/rooms/room4.jpg', 4500.00, '1 Double-size Bed, Bathroom, Air Condition (Hot & Cold), Room Safety, Wi-Fi, Dining', 'Pool, Elevator, Parking', '5 Adults, 4 Children', 'Unavailable'),
('Garden Escape', 'img/rooms/room5.jpg', 4200.00, '2 Queen-size Beds, 2 Bathrooms, Living Room, Garden View, Air Condition, Room Safety, Wi-Fi, Dining', 'Garden Access, Pool, Parking', '4 Adults, 3 Children', 'Available');";

if ($conn->query($sql) === TRUE) {
    echo "Rooms added successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
