<?php

include '..\model\database.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // prepare ng pag execute sa query 
    $stmt = $connection->prepare("SELECT password FROM customer WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if kung password ay match 
        if (password_verify($password, $row['password'])) {
            $_SESSION['customer'] = "yes";
            // Return success response
            echo 'success';
        } else {
            // check kung password is incorrect
            echo 'Incorrect password';
        }
    } else {
        // Return error message if user not found
        echo 'User not found';
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}
?>
