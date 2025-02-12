<?php
include '..\model\database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $contactnum = $_POST['contactnum'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $connection->prepare("SELECT password FROM customer WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username already registered!";
    }

    else {
        $sql = "INSERT INTO customer (firstname, middlename, lastname, contactnum, username, email, password) 
        VALUES ('$firstname', '$middlename', '$lastname', '$contactnum', '$username', '$email', '$password')";
            if ($connection->query($sql) === TRUE) {
                echo "Registration Sucessfully!";
            } else {
                echo "Error: " . $connection->error;
            }
    }
    $connection->close();
}
 ?>