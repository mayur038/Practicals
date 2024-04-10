    <?php
    // Set headers to allow cross-origin requests
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $sql = "SELECT id, username, password  FROM users";
        $result = $conn->query($sql);

        if ($result === false) {
            // Handle query execution failure
            echo json_encode(["error" => $conn->error]);
        } else {
            $users = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
            }
            echo json_encode($users);
        }
    }
    // Handle POST requests to create a new user
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get POST data
        $data = json_decode(file_get_contents('php://input'), true);

        // Prepare and bind parameters
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['username'], $data['password']);

        // Execute the statement
        $stmt->execute();

        // Return the newly created user
        $newUser = [
            "id" => $stmt->insert_id,
            "username" => $data['username'],
            "password" => $data['password']
        ];
        echo json_encode($newUser);

        $stmt->close();
    }

    // Handle PUT requests to update an existing user
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Get PUT data
        $data = json_decode(file_get_contents('php://input'), true);

        // Prepare and bind parameters
        $stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $data['username'], $data['password'], $data['id']);

        // Execute the statement
        $stmt->execute();

        // Return the updated user
        echo json_encode($data);

        $stmt->close();
    }

    // Handle DELETE requests to delete an existing user
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // Get DELETE data
        $data = json_decode(file_get_contents('php://input'), true);

        // Prepare and bind parameters
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $data['id']);

        // Execute the statement
        $stmt->execute();

        // Return message
        echo json_encode(["message" => "User deleted"]);

        $stmt->close();
    }

    // Close connection
    $conn->close();
    ?>
