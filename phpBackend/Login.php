<?php

require 'ConnectionSetting.php';

$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

$sql = "SELECT password FROM users WHERE username = '" . $loginUser . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["password"] == $loginPass) {
            echo "login Success.<br>";
        } else {
            echo "Wrong Credentials.";
        }
    }
} else {
    echo "Username doesn't exist.";
}
$conn->close();

?>