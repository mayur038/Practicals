<?php
// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Dummy data for users
$users = [
    ["id" => 1, "name" => "John Doe", "email" => "john@example.com"],
    ["id" => 2, "name" => "Jane Smith", "email" => "jane@example.com"],
    ["id" => 3, "name" => "Mike Johnson", "email" => "mike@example.com"]
];

// Handle GET requests to retrieve users
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($users);
}

// Handle POST requests to create a new user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Generate a new ID
    $newId = count($users) + 1;

    // Add the new user
    $newUser = [
        "id" => $newId,
        "name" => $data['name'],
        "email" => $data['email']
    ];
    $users[] = $newUser;

    // Return the newly created user
    echo json_encode($newUser);
}

// Handle PUT requests to update an existing user
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Get PUT data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Find the user to update
    $userId = $data['id'];
    foreach ($users as &$user) {
        if ($user['id'] == $userId) {
            $user['name'] = $data['name'];
            $user['email'] = $data['email'];
            echo json_encode($user);
            break;
        }
    }
}

// Handle DELETE requests to delete an existing user
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Get DELETE data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Find the user to delete
    $userId = $data['id'];
    foreach ($users as $key => $user) {
        if ($user['id'] == $userId) {
            unset($users[$key]);
            echo json_encode(["message" => "User deleted"]);
            break;
        }
    }
}
?>
