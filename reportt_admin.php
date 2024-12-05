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
        .header {
            background-color: #007bff;
            color: white;
            padding: 15pxpx;
            text-align: center;
        }
        .container {
            padding: 15px   px;
        }
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
            width: 40%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        table th, table td {
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

<div class="header">
    <h1>Welcome to Admin Dashboard - Reports</h1>
    <p>Here's an overview of the platform's activity</p>
</div>
<a href="homee.php" class="back-button">Back to Dashboard</a>
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
