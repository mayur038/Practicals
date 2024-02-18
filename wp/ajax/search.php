<?php
// Database connection parameters
$host = "localhost"; // Change this if your MySQL host is different
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "test"; // Change this to your MySQL database name

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data based on search query
if(isset($_POST['query'])){
    $search = $_POST['query'];
    $sql = "SELECT * FROM users WHERE username LIKE '%$search%'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<div>";
            echo "<p>Name: " . $row['username'] . "</p>";
         
            echo "</div>";
        }
    } else {
        echo "No matching users found.";
    }
}

// Close database connection
$conn->close();
?>
