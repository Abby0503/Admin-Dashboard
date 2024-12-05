<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "admindashboard");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedbacks data
$sql = "SELECT name, gender, age, shop_name FROM feedbacks";
$result = $conn->query($sql);

// Initialize data arrays for the chart
$genderCounts = ["Male" => 0, "Female" => 0, "Other" => 0];
$ageGroups = ["Under 18" => 0, "18-25" => 0, "26-40" => 0, "41+" => 0];
$shopCounts = [];

// Parse feedback data
$feedbacks = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;

        // Gender count
        $genderCounts[$row['gender']]++;

        // Age group count
        if ($row['age'] < 18) {
            $ageGroups["Under 18"]++;
        } elseif ($row['age'] <= 25) {
            $ageGroups["18-25"]++;
        } elseif ($row['age'] <= 40) {
            $ageGroups["26-40"]++;
        } else {
            $ageGroups["41+"]++;
        }

        // Shop count
        if (!isset($shopCounts[$row['shop_name']])) {
            $shopCounts[$row['shop_name']] = 0;
        }
        $shopCounts[$row['shop_name']]++;
    }
} else {
    echo "No feedbacks found.";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks Overview</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0; /* Removed padding to prevent unintended offset */
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

/* Main Content Styling */
.container {
    max-width: 1200px;
    margin: 20px auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-left: 270px; /* Leaves space for the sidebar */
    margin-top: 20px; /* Spacing from the top */
    box-sizing: border-box;
}

h1 {
    text-align: center;
    color: #007bff;
}

/* Charts Section */
.charts {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

canvas {
    width: 100%;
    height: 300px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Table Section */
.table-container {
    margin-top: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

table th, 
table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

table th {
    background-color: #007bff;
    color: white;
}

/* Back Button */
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
<body>< <!-- Sidebar -->
<div class="sidebar">
        <a href="home.php"onclick="handleNavigation('user')"><h2>Admin Dashboard</h2></a>
        <a href="user_list.php" onclick="handleNavigation('user')">User/Customer/Seller</a>
        <a href="order_list.php" onclick="handleNavigation('order')">Order</a>
        <a href="inventory.php" onclick="handleNavigation('inventory')">Inventory</a>
        <a href="report_admin.php" onclick="handleNavigation('report')">Report</a>
        <a href="feedback_admin.php" onclick="handleNavigation('feedback')"class="active">Feedback</a>
        <a href="account_list.php" onclick="handleNavigation('account')">Account Settings</a>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>
<div class="container">
    <h1>Feedbacks Overview</h1>
    
    <!-- Charts Section -->
    <div class="charts">
        <!-- Gender Distribution Chart -->
        <div>
            <canvas id="genderChart"></canvas>
        </div>

        <!-- Age Group Distribution Chart -->
        <div>
            <canvas id="ageChart"></canvas>
        </div>
    </div>

    <!-- Feedback Table -->
    <div class="table-container">
        <h2>Feedback Details</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Shop Name</th>
            </tr>
            <?php foreach ($feedbacks as $feedback): ?>
                <tr>
                    <td><?= htmlspecialchars($feedback['name']) ?></td>
                    <td><?= htmlspecialchars($feedback['gender']) ?></td>
                    <td><?= htmlspecialchars($feedback['age']) ?></td>
                    <td><?= htmlspecialchars($feedback['shop_name']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<script>
    // Gender Chart Data
    const genderData = {
        labels: <?= json_encode(array_keys($genderCounts)) ?>,
        datasets: [{
            data: <?= json_encode(array_values($genderCounts)) ?>,
            backgroundColor: ['#007bff', '#28a745', '#ffc107']
        }]
    };

    // Age Group Chart Data
    const ageData = {
        labels: <?= json_encode(array_keys($ageGroups)) ?>,
        datasets: [{
            data: <?= json_encode(array_values($ageGroups)) ?>,
            backgroundColor: ['#007bff', '#17a2b8', '#ffc107', '#dc3545']
        }]
    };

    // Chart Configurations
    const genderConfig = {
        type: 'pie',
        data: genderData,
        options: {
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    };

    const ageConfig = {
        type: 'bar',
        data: ageData,
        options: {
            plugins: {
                legend: { display: false }
            },
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    };

    // Render Charts
    new Chart(document.getElementById('genderChart'), genderConfig);
    new Chart(document.getElementById('ageChart'), ageConfig);
</script>
</body>
</html>
