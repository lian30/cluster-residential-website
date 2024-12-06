<?php
require_once 'backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST['first-name'];
  $lastName = $_POST['last-name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $ownershipStatus = $_POST['ownership-status'];

  $sql = "INSERT INTO residents (residentFirstName, residentLastName, gender, phoneNumber, address, statusOwnership, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssss", $residentFirstName, $residentLastName, $gender, $password, $phoneNumber, $address, $statusOwnership, $email);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Cluster Residential</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="signup-container">
    <!-- Left Section (Form) -->
    <div class="left-section">
      <form>
        <h1>Create an Account</h1>
        <p>Sign up to manage your cluster residence profile!</p>

        <!-- Input Fields -->
        
        <div class="input-group">
          <label for="first-name">First Name</label>
          <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required />
        </div>

        <div class="input-group">
          <label for="last-name">Last Name</label>
          <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required />
        </div>
        <div class="input-group">
          <label for="gender">Gender</label>
          <select id="gender" name="gender" required>
            <option value="" disabled selected>Select your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required />
        </div>

        <div class="input-group">
          <label for="phone">Phone Number</label>
          <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required />
        </div>

        <div class="input-group">
          <label for="address">Home Address</label>
          <input type="text" id="address" name="address" placeholder="Enter your home address" required />
        </div>

        <div class="input-group">
          <label for="ownership-status">Status Ownership</label>
          <select id="ownership-status" name="ownership-status" required>
            <option value="" disabled selected>Select ownership status</option>
            <option value="owned">Owned</option>
            <option value="rented">Rented</option>
          </select>
        </div>

        <div class="terms">
          <input type="checkbox" id="terms" name="terms" required />
          <label for="terms">I agree to the Terms and Privacy Policy</label>
        </div>

        <button type="submit" class="btn">Sign Up</button>

        <div class="login-link">
          <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>
      </form>
    </div>

    <!-- Right Section (Image and Text) -->
    <div class="right-section">
      <div class="right-section-content">
        <h2>One Step Away</h2>
        <p>Manage your information, stay updated, and connect with your neighbors!</p>
      </div>
    </div>
  </div>
</body>
</html>


