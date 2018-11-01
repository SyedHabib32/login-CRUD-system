<?php 
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE eplanet";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
// sql to create table
$db= "eplanet";
$conn1 = mysqli_connect($servername, $username, $password,$db);
$sql1 = "CREATE TABLE visitors_info (
    ID INT(6) AUTO_INCREMENT PRIMARY KEY, 
    fname VARCHAR(30) NOT NULL ,
    cnic int(13) NOT NULL UNIQUE,
    phone int(11) NOT NULL UNIQUE,
    addr VARCHAR(50)
    )"; 

if (mysqli_query($conn1, $sql1)) {
    echo "<br> Table visitors_info created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
 
mysqli_close($conn);
?>