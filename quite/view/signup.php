
<?php
session_start(); 
include '..\model\database.php';
include '..\config\signupSession.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>
<body>
<div class="containerS">
    <div class="signuptext">Create your Account</div>
    <div class="form" >
        <form method="post" id="signupform">
            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" name="firstname" id="fname" required>
            </div>
            <div class="form-group">
                <label for="middlename">Middlename:</label>
                <input type="text" name="middlename" id="mname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" name="lastname" id="lname" required>
            </div>
            <div class="form-group">
                <label for="contactnum">Contact Number:</label>
                <input type="text" name="contactnum" id="cnum" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="uname" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="passw" required>
            </div>
            <div class="submitbtn">
            <button type="submit" value='submit'>Signup</button>
            </div>
            <div class="Have-account">
                <p>Already have an account? <a href="login.php">Log In</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<script>
    $(document).ready(function() {
   
    $('#signupform').on('submit', function(event) {
        event.preventDefault(); 
   
       
        $.ajax({
            url: '../config/signupSession.php',  
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response == "Registration Sucessfully!") {
                    alert(response); 
                    window.location.href = '../view/login.php';
                } else {
                    alert(response); 
                }
            },
            error: function() {
                alert('An error occurred.');
            }
        });
    });
});
</script>





