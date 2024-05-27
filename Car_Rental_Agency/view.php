<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rented Cars - Car Rental Agency</title>
    <link rel="stylesheet" href="./CSS/styleview.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1 class="heading">Car Rental Agency</h1>
            </div>
            <div class="nav-links">
                <a href="home.html">Home</a>
                <a href="addcar.html">Add New Cars</a>
                <a href="available.php">Available Cars to Rent</a>
                <a href="view.php">View Rented Cars</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="cars-section">
            <div class="cars-container">
                <h2>Rented Cars</h2>
                <div class="car-list">
                    <table class="rented-cars-table">
                        <thead>
                            <tr>
                                <th>Vehicle Model</th>
                                <th>Vehicle Number</th>
                                <th>Seating Capacity</th>
                                <th>Rent per Day</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Establish database connection
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "car_rental_db";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM rented";
                            $result = $conn->query($sql);

                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row['model']."</td>";
                                echo "<td>".$row['number']."</td>";
                                echo "<td>".$row['capacity']."</td>";
                                echo "<td>".$row['rent']."</td>";
                                echo "<td>
                                        <form method='post' action='rent.php'>
                                            <input type='hidden' name='car_id' value='".$row['id']."'>
                                            <button type='submit' name='remove' style='background-color: #ff0000; color: #fff; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;'>Remove</button>
                                        </form>
                                    </td>";
                                echo "</tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Car Rental Agency. All rights reserved.</p>
    </footer>
</body>
</html>
