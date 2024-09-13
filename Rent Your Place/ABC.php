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
  $full_name = $_POST["full_name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];

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
<html>
<head>
  <title>Registration Form</title>
</head>
<body>

  <h1>Registration Form</h1>

  <?php if (isset($success_message)): ?>
    <p><?php echo $success_message; ?></p>
  <?php endif; ?>

  <?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
  <?php endif; ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="full_name">Full Name:</label>
    <input type="text" id="full_name" name="full_name"><br><br>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone"><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password"><br><br>

    <input type="submit" value="Register">

  </form>

</body>
</html>
