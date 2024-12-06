<?php
// Start session
session_start();

// Include database connection
include 'backend/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to find the user
    $sql = "SELECT * FROM Users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Store user data in session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            
            // Redirect to the main page
            header('Location: index.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Cluster Residential</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  
  <div class="login-container">
    <div class="logo-container">
      <img src="images/best_cluster-removebg-preview (1).png" alt="Cluster Residential Logo" class="logo">
    </div>
    <!-- Left Section (Form) -->
    <div class="left-section">
      <form>
        <h1>Welcome!</h1>
        <p>Log in to manage your cluster residence profile!</p>

        <!-- Input Fields -->
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required />
        </div>

        <button type="submit" class="btn">Log In</button>

        <div class="signup-link">
          <p>Don't have an account? <a href="signup_page.php">Sign up</a></p>
        </div>
      </form>
    </div>

    <!-- Right Section (Image and Text) -->
    <div class="right-section">
      <div class="right-section-content">
        <h2>Best Cluster Community</h2>
        <p>Access your information, announcements, and marketplace easily.</p>
      </div>
    </div>
  </div>
</body>
</html>