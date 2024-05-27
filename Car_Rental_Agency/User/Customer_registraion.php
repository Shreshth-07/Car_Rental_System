<?php
	require "../DB_connect.php";
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
						initial-scale=1.0">
    <title>Car Rental Agency</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<header>
        <nav>
            <div class="logo">
                <h1 class="headi">Car Rental Agency</h1>
            </div>
            <div class="nav-links">
                <a href="../logout.php">Log Out</a>
            </div>
        </nav>
</header>
<section>
        <h1 class="heading">User Page</h1>
        <h3 class="title">Sign-Up Form</h3>
</section>
 <form class="signup-box" method="post" action="#">
 <input type="text" class="name ele" name="name" placeholder="Enter your name" required>
 <input type="email" class="email ele" name="email" placeholder="youremail@email.com" required>
 <input type="number" class="email ele" name="mobile" placeholder="123456789" required>
 <input type="password" class="password ele" name="password" placeholder="password" required>
 <input type="password" class="password ele" name="confpassword" placeholder="Confirm password" required>
 <button type="submit" name="signup" class="clkbtn">Signup</button>
</form>
<footer>
        <p>&copy; 2023 Car Rental Agency. All rights reserved.</p>
    </footer>
</body>

<?php
if(isset($_POST['signup'])) {
    if($_POST['password']!=$_POST['confpassword']){
        echo"confirm password is not same as password";
    }
    else{
        $name = $_POST['name'];
        $mobile= $_POST['mobile'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        $sql = "INSERT INTO users (name, email, password, mobile) VALUES ('$name', '$email', '$password','$mobile')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: User_login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>

</html>