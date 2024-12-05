<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar h2 {
            color: #f8f9fa;
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
        }

        .sidebar a {
            text-decoration: none;
            width: 100%;
            color: #adb5bd;
            padding: 15px 20px;
            text-align: left;
            display: block;
            font-size: 1rem;
            font-weight: bold;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #ffffff;
            border-left: 3px solid #007bff;
        }

        .sidebar a.active {
            background-color: #495057;
            color: #ffffff;
            border-left: 3px solid #007bff;
        }
        .logout-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #dc3545; /* Red color */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c82333; /* Darker red on hover */
        }
    </style>
    </head>
<body>
    <div class="dashboard-container">
            <!-- Sidebar Navigation -->
        <div class="sidebar">
            <h2>Seller Dashboard</h2>
            <a href="seller_dashboard.php" class="active">Dashboard</a>
            <a href="totaluser_seller.php" class="nav-link">Total Users</a>
            <a href="orderlist_seller.php" class="nav-link">Order List</a>
            <a href="inventory_seller.php" class="nav-link">Inventory</a>
            <a href="accountlist_seller.php" class="nav-link">Account Settings</a>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
        <body>
            <head>

            <script>
                window.onload = loadUserProfile;

function logout() {
    // Redirect to the logout.php file
    window.location.href = 'homee.php';
}
            </script>