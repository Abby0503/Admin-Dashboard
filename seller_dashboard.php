<?php
session_start();

// Mock data for dashboard
$totalUsers = 120; // Replace with database query to fetch total users
$orders = [
    ['id' => 1, 'product' => 'Product A', 'quantity' => 2, 'status' => 'Delivered'],
    ['id' => 2, 'product' => 'Product B', 'quantity' => 1, 'status' => 'Processing'],
    ['id' => 3, 'product' => 'Product C', 'quantity' => 5, 'status' => 'Shipped']
];
$inventory = [
    ['id' => 1, 'product' => 'Product A', 'stock' => 10],
    ['id' => 2, 'product' => 'Product B', 'stock' => 20],
    ['id' => 3, 'product' => 'Product C', 'stock' => 5]
];

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
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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

        .sidebar a:hover, .sidebar a.active {
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

        /* Main content */
        .main-content {
            margin-left: 250px; /* Sidebar width */
            padding: 20px;
            width: 100%;
            height: 100vh;
            overflow-y: auto;
            box-sizing: border-box;
            background-color: #fff;
        }

        section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        h2 {
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table thead th {
            background-color: #007bff;
            color: white;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar a {
                text-align: center;
                padding: 12px;
            }

            .sidebar .logout-btn {
                width: 100%;
                margin-top: 10px;
            }
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Seller Dashboard</h2>
        <a href="seller_dashboard.php" class="nav-link" class="active">Dashboard</a>
        <a href="totaluser_seller.php" class="nav-link">Total Users</a>
        <a href="orderlist_seller.php" class="nav-link">Order List</a>
        <a href="inventory_seller.php" class="nav-link">Inventory</a>
        <a href="accountlist_seller.php" class="nav-link">Account Settings</a>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

    <div class="main-content">
        <!-- Total Users -->
        <section id="total-users">
            <h2>Total Users</h2>
            <p>Total registered users: <strong><?php echo $totalUsers; ?></strong></p>
        </section>

        <!-- Order List -->
        <section id="order-list">
            <h2>Order List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['product']; ?></td>
                            <td><?php echo $order['quantity']; ?></td>
                            <td><?php echo $order['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Inventory -->
        <section id="inventory">
            <h2>Inventory</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventory as $item): ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['product']; ?></td>
                            <td><?php echo $item['stock']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </div>

    <script>
        function logout() {
            window.location.href = 'homee.php';
        }
    </script>
</body>
</html>
