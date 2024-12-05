<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
            display: flex;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh; /* Full-height sidebar */
            position: fixed; /* Fixed position */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
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
            cursor: pointer;
        }

        .sidebar a.active {
            background-color: #007bff;
            color: #ffffff;
            border-left: 3px solid #007bff;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 250px; /* Offset by the sidebar width */
            padding: 20px;
            flex: 1;
        }

        /* Stats Section Styling */
        .stats-container {
            max-width: 900px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .login-button {
            position: absolute;
            top: 10%;
            right: 70px; /* Adjust this value for distance from the corner */
            transform: translateY(-50%);
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
    
        .stat-card {
    text-decoration: none; /* Remove underline from links */
    color: inherit; /* Inherit text color */
}
.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}


        .stat-title {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 2.5rem;
            color: #343a40;
            font-weight: bold;
        }

        .stat-icon {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <a href="home.php" class="active" onclick="handleNavigation('dashboard')">Dashboard</a>
        <a href="userr_list.php" onclick="handleNavigation('user')">User/Customer/Seller</a>
        <a href="orderr_list.php" onclick="handleNavigation('order')">Order</a>
        <a href="inventoryy.php" onclick="handleNavigation('inventory')">Inventory</a>
        <a href="reportt_admin.php" onclick="handleNavigation('report')">Report</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div id="content">
            <h1>Welcome to Admin Dashboard</h1> 
            <a href="login_admin.php" class="login-button">Log In</a>
            <p>Here's an overview of the platform's activity:</p>
            </div>

            <h1 class="text-center mb-4">Dashboard Statistics</h1>
            <div class="stats-container">
    <a href="userr_list.php" class="stat-card">
        <div class="stat-icon">👥</div>
        <div class="stat-title">Total Users</div>
        <div class="stat-value" id="totalUsers">1200</div>
    </a>
    <a href="orderr_list.php" class="stat-card">
    <div class="stat-icon">📦</div>
    <div class="stat-title">Total Orders</div>
    <div class="stat-value" id="totalOrders">500</div>
</a>
<a href="inventoryy.php" class="stat-card">
    <div class="stat-icon">📋</div>
    <div class="stat-title">Inventory Status</div>
    <div class="stat-value" id="totalInventory">1200</div>
</a>
    </a>
    <a href="reportt_admin.php" class="stat-card">
        <div class="stat-icon">📊</div>
        <div class="stat-title">Reports Generated</div>
        <div class="stat-value" id="totalReports">45</div>
    </a>
</div>

            </div>
        </div>
    </div>

    <script>
        // Mock Data for Statistics
        const mockData = {
            totalUsers: 1200,
            totalAdmins: 15,
            totalSellers: 250,
            totalFeedbacks: 500,
            totalReports: 45,
        };

        // Function to update statistics dynamically
        function updateStatistics(data) {
            document.getElementById("totalUsers").textContent = data.totalUsers;
            document.getElementById("totalAdmins").textContent = data.totalAdmins;
            document.getElementById("totalSellers").textContent = data.totalSellers;
            document.getElementById("totalReports").textContent = data.totalReports;
        }

        // Simulate data fetching
        window.onload = () => {
            setTimeout(() => {
                updateStatistics(mockData);
            }, 1000); // Simulate API delay
        };

        // Navigation Handler
        function handleNavigation(section) {
            const content = document.getElementById("content");
            const links = document.querySelectorAll(".sidebar a");

            // Update active link
            links.forEach(link => link.classList.remove("active"));
            event.target.classList.add("active");

            // Update content based on the section
            if (section === "dashboard") {
                content.innerHTML = `
                    <h1>Welcome to Admin Dashboard</h1>
                    <p>Here's an overview of the platform's activity:</p>
                `;
            } else {
                content.innerHTML = `<h1>${section.charAt(0).toUpperCase() + section.slice(1)}</h1>`;
            }
        }
    </script>
</body>
</html>
