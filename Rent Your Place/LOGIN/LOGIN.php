<?php

// Connect to MySQL database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Collect user input from form
  $full_name = $_POST["username"];
  $email = $_POST["emailAdress"];
  $phone = $_POST["phone"];
  $password = $_POST["pwd"];
  $confirm_password = $_POST["passwordCon"];

  // Check if passwords match
  if ($password != $confirm_password) {
    $error_message = "Passwords do not match!";
  } else {
    // Hash password before storing in database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into database
    $sql = "INSERT INTO users (full_name, email, phone, pwd) VALUES ('$full_name', '$email', '$phone', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
      $success_message = "User registered successfully!";
    } else {
      $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- 9218EU8DHEBHAGVEWSMs243243723894439427424e7r352roidcj2uwerzxmxjcu34cmct34tcumtxmmmmmmmmmm2tu3ice2 -->
    <meta charset="UTF-8">
    <title>title_here</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./LOGIN.CSS">

</head>

<body>
    <!-- partial:index.partial.html -->
    
    <div class="container">
        <section id="formHolder">

            <div class="row">


                <div class="col-sm-6 brand">
                    <a href="../index.html" class="logo">Rent Your Place<span>.</span></a>
                    <div class="heading">
                        <h2>Rent</h2>
                        <h3>Your</h3>
                        <h2> Place</h2>
                        <p>"""Your one-stop for all your rental needs."""
                        </p>
                    </div>
                    <div class="success-msg">
                        <p>"Glad you're here!"
                        </p>
                        <a href="./INDEX2.HTML" class="profile">LET'S CHECK PROFILE</a>
                    </div>
                </div>


                <!-- Form Box -->
                <div class="col-sm-6 form">

                    
                
                    <div class="login form-peice switched">
                        <form class="login-form" action="./INDEX2.HTML" method="post">
                            <div class="form-group">
                                <label for="loginemail">Email Adderss</label>
                                <input type="email" name="loginemail" id="loginemail" required>
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" name="loginPassword" id="loginPassword" required>
                            </div>

                            <div class="CTA">

                                <BUTTON VALUE="LOGIN" onclick="checkCredentials();">LOGIN</BUTTON>
                                <a href="#" class="switch">I'm New</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Form -->


                    <!-- Signup Form -->
                    <div class="signup form-peice">
                        <form class="signup-form" action="LOGIN.php" method="post">

                            <div class="form-group">
                                <!-- <label for="name">Full Name</label> -->
                                <input type="text" name="username" id="name" placeholder="username" class="name">
                                <span class="error"></span>
                            </div>


                            <div class="form-group">
                                <!-- <label for="email">Email Adderss</label> -->
                                <input type="email" name="emailAdress" id="email" placeholder="email address"class="email">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <!-- <label for="phone">Phone Number - <small>Optional</small></label> -->
                                <input type="text" name="phone" placeholder="phone number"id="phone">
                            </div>

                            <div class="form-group">
                                <!-- <label for="password">Password</label> -->
                                <input type="password" name="pwd" id="password" placeholder="password" class="pass">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <!-- <label for="passwordCon">Confirm Password</label> -->
                                <input type="password" name="passwordCon" id="passwordCon" placeholder="conform password"class="passConfirm">
                                <span class="error"></span>
                            </div>

                            <div class="CTA">
                                <BUTTON type="submit" value="Signup" id="submit">Sign UP</BUTTON>
                                <a href="#" class="switch">I have an account</a>

                            </div>
                        </form>
                    </div>
                    <!-- End Signup Form -->
                </div>
            </div>

        </section>

    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
     <!-- <script src="./LOGIN.JS"></script> -->

</body>

</html>