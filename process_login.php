<?php
session_start();

// Mock database of users
$users = [
    ['username' => 'admin', 'password' => 'admin123', 'role' => 'admin'],
    ['username' => 'seller', 'password' => 'seller123', 'role' => 'seller']
];

// Fetch form data
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Validate user
function authenticate_user($username, $password, $role, $users) {
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password && $user['role'] === $role) {
            return $user['role'];
        }
    }
    return false;
}

// Authentication and redirection
$user_role = authenticate_user($username, $password, $role, $users);
if ($user_role === 'admin') {
    header('Location: home.php');
    exit();
} elseif ($user_role === 'seller') {
    header('Location: seller_dashboard.php');
    exit();
} else {
    echo "<script>alert('Invalid Credentials!'); window.location.href='homee.php';</script>";
    exit();
}
?>
