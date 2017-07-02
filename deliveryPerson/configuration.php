<?php
/**
 * Created by PhpStorm.
 * User: Sangeerththan
 * Date: 2/7/2017
 * Time: 12:02 AM
 */
$servername = "localhost";
$username = "root";
$password = "";
$db_host="westartventure";

// Create connection
$conn = new mysqli($servername,$username ,$password,$db_host);

// Check connection
/**if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>**/