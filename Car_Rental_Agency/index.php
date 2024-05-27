<?php
session_start();
// Check if the user is logged in


$_SESSION['loggedin'] = false;

$_SESSION['agency'] = false;

require "DB_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Agency</title>
    <link rel="stylesheet" href="./CSS/stylehome.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <h1 class="heading">Car Rental Agency</h1>
            </div>
            <div class="nav-links">
                <a href="available.php">Available Cars to Rent</a>
                <a href="User/User_login.php">User</a>
                <a href="Agency/agency_login.php">Agency</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>Rent a Car Today</h2>
                <p>Experience the freedom of the open road with our reliable and affordable car rental services.</p>
            </div>
        </section>

        <section class="featured-cars">
            <h2>Featured Cars</h2>
            <div class="car-grid">
                <div class="car-card">
                    <img src="./assets/sedan.jpg" alt="Car Image">
                    <h3>Sedan</h3>
                    <p>Seating Capacity: 5</p>
                    <p>Rent per Day: 5,000</p>
       
                </div>
                <div class="car-card">
                    <img src="./assets/suv.jpg" alt="Car Image">
                    <h3>SUV</h3>
                    <p>Seating Capacity: 7</p>
                    <p>Rent per Day: 7,000</p>
 
                </div>
                <div class="car-card">
                    <img src="./assets/compact.jpg" alt="Car Image">
                    <h3>Compact</h3>
                    <p>Seating Capacity: 4</p>
                    <p>Rent per Day: 4,000</p>

                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Car Rental Agency. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>