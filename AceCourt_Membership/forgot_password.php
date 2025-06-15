<?php
// Include the database connection file
require 'db.php';

// Initialize an empty message string for user feedback
$message = "";

// Check if the form was submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form inputs
    $email = trim($_POST["email"]);
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Prepare a statement to check if the user exists in the database
    $stmt = $conn->prepare("SELECT memberId FROM member WHERE email = ?");
    $stmt->bind_param("s", $email); // Bind the email parameter
    $stmt->execute(); // Execute the query
    $stmt->store_result(); // Store the result for num_rows check

    // Check if the email exists in the database
    if ($stmt->num_rows == 0) {
        $message = "User not found.";
    } 
    // Check if both passwords match
    elseif ($new_password !== $confirm_password) {
        $message = "Passwords do not match.";
    } 
    // Ensure password meets length requirement
    elseif (strlen($new_password) < 6) {
        $message = "Password must be at least 6 characters.";
    } 
    // If all validations pass, update the password
    else {
        // Hash the new password securely
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);

        // Prepare an update statement to change the password
        $stmt = $conn->prepare("UPDATE member SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed, $email); // Bind the hashed password and email

        // Execute the update and set a success/failure message
        if ($stmt->execute()) {
            $message = "Password updated successfully. <a href='login.php'>Login now</a>.";
        } else {
            $message = "Error updating password.";
        }
    }

    // Close the statement to free resources
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Set the title shown in the browser tab -->
  <title>Forgot Password - AceCourt Membership</title>

  <!-- Link to external stylesheet -->
  <link rel="stylesheet" href="styles.css">

  <!-- Internal CSS for form styling -->
  <style>
    body {
      background-color: #e6eeff; /* Light blue background */
      font-family: Arial, sans-serif; /* Clean font */
    }

    .container {
      width: 400px; /* Set container width */
      margin: 100px auto; /* Center it vertically and horizontally */
      background: white; /* White background for the form */
      padding: 30px;
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Light shadow effect */
    }

    h2 {
      text-align: center; /* Center the heading */
    }

    form {
      display: flex;
      flex-direction: column; /* Stack inputs vertically */
    }

    label {
      margin-top: 10px;
    }

    input {
      padding: 10px;
      margin-top: 5px;
    }

    button {
      margin-top: 20px;
      padding: 10px;
      background-color: #007bff; /* Blue background */
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px;
    }

    button:hover {
      background-color: #0056b3; /* Darker blue on hover */
    }

    p {
      text-align: center;
      margin-top: 20px;
      color: red; /* Error or info message color */
    }
  </style>
</head>
<body>
  <!-- Centered form container -->
  <div class="container">
    <h2>Forgot Password</h2>

    <!-- Password reset form -->
    <form method="post">
      <label>Email:</label>
      <input type="email" name="email" required>

      <label>New Password:</label>
      <input type="password" name="new_password" required>

      <label>Confirm Password:</label>
      <input type="password" name="confirm_password" required>

      <!-- Submit button -->
      <button type="submit">Reset Password</button>
    </form>

    <!-- Display feedback message (success or error) -->
    <p><?php echo $message; ?></p>
  </div>
</body>
</html>
