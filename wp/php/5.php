<?php
session_start();

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

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to authenticate user
function authenticate_user($conn, $username, $password) {
    $username = sanitize_input($username);
    $password = sanitize_input($password);

    // Query to fetch user from database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, set session variable
        $_SESSION['username'] = $username;
        return true;
    } else {
        // User not found or password incorrect
        return false;
    }
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate user
    if (authenticate_user($conn, $username, $password)) {
        // Redirect to dashboard or any other authenticated page
        header("Location: deshboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
</head>
<body>
    <h2>User Authentication</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <?php if(isset($error)) { echo $error; } ?>
</body>
</html>
