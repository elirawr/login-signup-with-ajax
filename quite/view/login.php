<?php
session_start(); // start ang session
include '..\model\database.php';
include '..\config\loginSession.php'; 

// link ang php file 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Listen for the form submission
        $('#login-form').on('submit', function(event) {
            event.preventDefault();  // Prevent the default form submission
            
            var username = $('#usern').val();
            var password = $('#passw').val();
            
            // Send a AJAX request 
            $.ajax({
                url: '../config/loginSession.php',  // php script ng login 
                method: 'POST',
                data: {
                    username: username,
                    password: password
                },
                success: function(response) {
                    // checking ng response sa server
                    if (response == 'success') {
                        // i link dito kung success ang response
                        window.location.href = 'homepage.php';
                    } else {
                        // else error kung mali yung password 
                        alert('Login failed: ' + response); // Display response message
                    }
                },
                error: function() {
                    // Handle AJAX errors (e.g., network issues)
                    alert('An error occurred.');
                }
            });
            
        });
    });
</script>
</head>
<body>
    <div class="containerL">
        <div class="logintext">Welcome Back!</div>
        <div class="forms">
        <form id="login-form" method="post">
            <div class="username" >
                <label for="username">Username: </label>
                <input type="text" name="username" id="usern" required>
            </div>
            <div class="password">
                <label for="password">Password: </label>
                <input type="password" name="password" id="passw" required>
            </div>
            <div class="submitbtn">
            <a href="homepage.php">
            <button type="submit"  name="submit" value="submit">Login</button>
            </a>
            </div>
            <div class="noaccount">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </form>
    </div>
    </div>
</body>
</html>

