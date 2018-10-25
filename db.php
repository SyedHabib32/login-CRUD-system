<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eplanet";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql1 = "CREATE TABLE visitors_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    fname VARCHAR(30) NOT NULL ,
    cnic int(13) NOT NULL UNIQUE,
    phone int(11) NOT NULL UNIQUE,
    addr VARCHAR(50)
    )";

if (mysqli_query($conn, $sql1)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>