<?php
// Mock data for simplicity (replace with database queries in production)
$totalUsers = 1200;
$totalOrders = 500;
$inventoryStatus = 1200;
$feedbackReceived = 500;
$reportsGenerated = 45;

// Monthly and yearly reports
$monthlyStats = [
    'Users' => 100,
    'Orders' => 50,
    'Feedbacks' => 40,
    'Reports' => 10,
];
$yearlyStats = [
    'Users' => 1200,
    'Orders' => 500,
    'Feedbacks' => 500,
    'Reports' => 45,
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Reports</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

/* Sidebar Styling */
.sidebar {
    width: 250px; /* Sidebar width */
    background-color: #343a40; /* Dark Gray */
    color: white;
    height: 100vh; /* Full-height sidebar */
    position: fixed; /* Fixed position */
    left: 0; /* Sidebar starts at the left edge */
    top: 0; /* Starts at the top of the screen */
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 20px 0;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    overflow-y: auto; /* Scrollbar for smaller screens */
}

.sidebar h2 {
    color: #f8f9fa; /* Light Gray */
    margin-bottom: 20px;
    font-size: 1.5rem;
    text-align: center;
    width: 100%;
    padding: 0 20px;
    box-sizing: border-box;
}

.sidebar a {
    text-decoration: none;
    width: 100%;
    color: #adb5bd; /* Muted Gray */
    padding: 15px 20px;
    text-align: left;
    display: block;
    font-size: 1rem;
    font-weight: bold;
    border-left: 3px solid transparent;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.sidebar a:hover {
    background-color: #495057; /* Darker Gray on Hover */
    color: #ffffff;
    border-left: 3px solid #007bff; /* Blue highlight */
    cursor: pointer;
}

.sidebar a.active {
    background-color: #007bff; /* Blue for Active Link */
    color: #ffffff;
    border-left: 3px solid #007bff;
}

.logout-btn {
    margin-top: auto; /* Push button to the bottom */
    width: calc(100% - 40px);
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: bold;
    color: white;
    background-color: #dc3545; /* Danger Red */
    border: none;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
    align-self: center;
    margin: 20px;
}

.logout-btn:hover {
    background-color: #c82333; /* Darker Red */
}

/* Header Styling */
.header {
    background-color: #007bff;
    color: white;
    padding: 15px;
    text-align: center;
    margin-left: 250px; /* Push header to the right of the sidebar */
}

/* Container Styling */
.container {
    padding: 30px;
    margin-left: 250px; /* Push content to the right of the sidebar */
    margin-top: 0;
    background-color: #ffffff; /* White background */
    box-sizing: border-box;
}

/* Stats and Table Design */
.stats-container {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
}

.stat-box {
    background-color: white;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    text-align: center;
    width: 150px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.stat-box h2 {
    margin: 10px 0;
}

.report-section {
    display: flex;
    align-items: flex-start;
    margin-bottom: 40px;
}

.report-section .graph {
    width: 50%;
    margin-right: 20px;
}

.report-section .table-container {
    width: 50%;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

table th,
table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

table th {
    background-color: #007bff;
    color: white;
}

canvas {
    width: 100%;
    height: 300px;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.back-button {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
}

.back-button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
<body>< <<!-- Sidebar -->
<div class="sidebar">
        <a href="home.php"onclick="handleNavigation('user')"><h2>Admin Dashboard</h2></a>
        <a href="user_list.php" onclick="handleNavigation('user')">User/Customer/Seller</a>
        <a href="order_list.php" onclick="handleNavigation('order')">Order</a>
        <a href="inventory.php" onclick="handleNavigation('inventory')">Inventory</a>
        <a href="report_admin.php" onclick="handleNavigation('report')"class="active">Report</a>
        <a href="feedback_admin.php" onclick="handleNavigation('feedback')">Feedback</a>
        <a href="account_list.php" onclick="handleNavigation('account')">Account Settings</a>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>
<div class="header">
    <h1>Welcome to Admin Dashboard - Reports</h1>
    <p>Here's an overview of the platform's activity</p>
</div>
<a href="home.php" class="back-button">Back to Dashboard</a>
<div class="container">
    <h2>Dashboard Statistics</h2>
    <div class="stats-container">
        <div class="stat-box">
            <h2><?= $totalUsers ?></h2>
            <p>Total Users</p>
        </div>
        <div class="stat-box">
            <h2><?= $totalOrders ?></h2>
            <p>Total Orders</p>
        </div>
        <div class="stat-box">
            <h2><?= $inventoryStatus ?></h2>
            <p>Inventory Status</p>
        </div>
        <div class="stat-box">
            <h2><?= $feedbackReceived ?></h2>
            <p>Feedback Received</p>
        </div>
        <div class="stat-box">
            <h2><?= $reportsGenerated ?></h2>
            <p>Reports Generated</p>
        </div>
    </div>

    <h2>Monthly Statistics</h2>
    <div class="report-section">
        <div class="graph">
            <canvas id="monthlyChart"></canvas>
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Category</th>
                    <th>Value</th>
                </tr>
                <?php foreach ($monthlyStats as $category => $value): ?>
                    <tr>
                        <td><?= $category ?></td>
                        <td><?= $value ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <h2>Yearly Statistics</h2>
    <div class="report-section">
        <div class="graph">
            <canvas id="yearlyChart"></canvas>
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Category</th>
                    <th>Value</th>
                </tr>
                <?php foreach ($yearlyStats as $category => $value): ?>
                    <tr>
                        <td><?= $category ?></td>
                        <td><?= $value ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    
</div>

<script>
    // Monthly Stats Data
    const monthlyData = {
        labels: Object.keys(<?= json_encode($monthlyStats) ?>),
        datasets: [{
            label: 'Monthly Statistics',
            data: Object.values(<?= json_encode($monthlyStats) ?>),
            backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
            borderColor: ['#0056b3', '#1e7e34', '#d39e00', '#bd2130'],
            borderWidth: 1
        }]
    };

    // Yearly Stats Data
    const yearlyData = {
        labels: Object.keys(<?= json_encode($yearlyStats) ?>),
        datasets: [{
            label: 'Yearly Statistics',
            data: Object.values(<?= json_encode($yearlyStats) ?>),
            backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
            borderColor: ['#0056b3', '#1e7e34', '#d39e00', '#bd2130'],
            borderWidth: 1
        }]
    };

    // Chart Configurations
    const monthlyConfig = {
        type: 'bar',
        data: monthlyData,
        options: {
            plugins: {
                legend: { display: true }
            },
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const yearlyConfig = {
        type: 'bar',
        data: yearlyData,
        options: {
            plugins: {
                legend: { display: true }
            },
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Render Charts
    new Chart(document.getElementById('monthlyChart'), monthlyConfig);
    new Chart(document.getElementById('yearlyChart'), yearlyConfig);
</script>

</body>
</html>
