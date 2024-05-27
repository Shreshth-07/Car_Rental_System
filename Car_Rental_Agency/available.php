<?php
    require "session.php";
    require "DB_connect.php";
    require "message.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Cars - Car Rental Agency</title>
    <link rel="stylesheet" href="./CSS/styleavailable.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1 class="heading">Car Rental Agency</h1>
            </div>
            <div class="nav-links">
          
            <?php if( $_SESSION['agency']): ?>
    
                <a href="Agency/addcar.php">Add Car</a>
   
                <a href="Agency/viewbooking.php">View Booking</a>
     
            <?php endif; ?>

            <?php if( $_SESSION['loggedin']): ?>
                <a href="logout.php">logout</a>
            </div>
            <?php endif; ?>
        </nav>
    </header>
    <div class="error-message" id="error-message">
				<p id="error"></p>
	</div>
			

    <main>
        <section class="cars-section">
            <div class="cars-container">
                <h2>Available Cars</h2>
                <div class="car-list">
                    <table class="available-cars-table">
                        <thead>
                            <tr>
                                <th>Vehicle Model</th>
                                <th>Vehicle Number</th>
                                <th>Seating Capacity</th>
                                <th>Rent per Day</th>
                                <?php if( $_SESSION['loggedin']): ?>
                                <th> Starting Date</th>
                                <th>No. of Days</th>
                                <?php endif; ?>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM addcar";
                                $result = $conn->query($sql);
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <td><?php echo $rows['model'];?></td>
                                <td><?php echo $rows['number'];?></td>
                                <td><?php echo $rows['capacity'];?></td>
                                <td><?php echo $rows['rent'];?></td>
                                <form method="Post" action="#">
                                <?php if( $_SESSION['loggedin']): ?>
                                    <td><input name="dt" type="date"></td>
                                   <td> <input type="number" name="days" id="number" min="1" ></td>
                                </td>
                                <?php endif; ?>
                                <input type="hidden" name="car_id" value="<?php echo $rows['id'];?>">
                                <td><button type="submit" name="btn" class="btn">Rent Now</button></td>
                                </form>
                            </tr>
                            <?php
                                }
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
<?php
        if(isset($_POST['btn']) ){
            if($_SESSION['loggedin']===false){
                header("Location: User/User_login.php");
            }else if($_SESSION['agency']==true){
                echo error_without_field("Agency can not book the car");
            }else{
                $car_id = $_POST['car_id'];
                $sql_select = "SELECT * FROM addcar WHERE id = $car_id";
                $result = $conn->query($sql_select);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $date = $_POST['dt'];
                    $sql_insert = "INSERT INTO rented (model, number, capacity, rent,date,days,email) VALUES (?, ?, ?, ?,?,?,?)";
                    $stmt = $conn->prepare($sql_insert);
                    $stmt->bind_param("ssdisds", $row['model'], $row['number'], $row['capacity'], $row['rent'], $_POST['dt'], $_POST['days'], $row['email']);
                    if ($stmt->execute()) {
                        $sql_delete = "DELETE FROM addcar WHERE id = $car_id";
                        $conn->query($sql_delete);
                        header("Location: ViewBooking.php");
                        exit();
                    } else {
                        echo "Error: " . $conn->error;
                    }
                }
                            } 
                        }
?>
</html>


