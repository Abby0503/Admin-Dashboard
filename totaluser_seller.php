<?php
session_start();

// Mock data for total users (replace with a real database query)
$totalUsers = 120; // Replace with database query to fetch total users

// Check if the user is logged in as a seller
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'seller') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Users - Seller Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .sidebar h2 {
            color: #f8f9fa;
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
            width: 100%;
        }

        .sidebar a {
            text-decoration: none;
            color: #adb5bd;
            padding: 15px;
            text-align: left;
            display: block;
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .sidebar a:hover, 
        .sidebar a.active {
            background-color: #007bff;
            color: white;
            border-left: 3px solid #007bff;
        }

        .sidebar .logout-btn {
            margin-top: auto;
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sidebar .logout-btn:hover {
            background-color: #c82333;
        }

        /* Main Content */
        .main-content {
            margin-left: 300px; /* Ensure space for the sidebar */
            padding: 20px;
            width: 100%; /* Take the full remaining width */
            background-color: #f4f4f4;
            min-height: 100vh; /* Ensure the content takes up the full height */
            overflow-y: auto; /* Prevent overflow of content */
        }

        section {
            margin-bottom: 30px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 15px;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead th {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        table td, table th {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                box-shadow: none;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 10px;
            }

            .sidebar a {
                text-align: center;
                padding: 12px;
            }

            table td, table th {
                padding: 8px;
            }

            section {
                margin-bottom: 20px;
                padding: 15px;
            }
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Seller Dashboard</h2>
        <a href="seller_dashboard.php" class="nav-link">Dashboard</a>
        <a href="totaluser_seller.php" class="nav-link" class="active">Total Users</a>
        <a href="orderlist_seller.php" class="nav-link">Order List</a>
        <a href="inventory_seller.php" class="nav-link">Inventory</a>
        <a href="accountlist_seller.php" class="nav-link">Account Settings</a>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <section id="total-users">
            <h2>Total Users</h2>
            <p>Total registered users: <strong><?php echo $totalUsers; ?></strong></p>
        </section>
    </div>

    <script>
        function logout() {
            window.location.href = 'homee.php';
        }
    </script>
</body>
</html>
