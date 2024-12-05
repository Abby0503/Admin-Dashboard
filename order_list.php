<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop - Order List</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #f4f4f4;
    color: #333;
    display: flex;
}

/* Sidebar Styling */
.sidebar {
    width: 250px; /* Sidebar width */
    background-color: #343a40; /* Dark Gray */
    color: white;
    height: 100vh; /* Full-height sidebar */
    position: fixed; /* Fixed position */
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

/* Container Styling */
.container {
    margin-left: 250px; /* Shift the container to account for the sidebar width */
    width: calc(100% - 250px); /* Take the remaining width after the sidebar */
    margin-top: 30px;
    padding: 30px;
    background-color: #ffffff; /* White background for clean design */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Softer shadow for depth */
    border-radius: 8px; /* Rounded corners for modern look */
    box-sizing: border-box;
}

/* Heading Styling */
h1 {
    text-align: center;
    color: #4CAF50; /* Green tone for consistency */
    font-size: 2rem;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 1rem;
    color: #333; /* Neutral text color for readability */
}

th, td {
    padding: 15px; /* Increased padding for better spacing */
    text-align: left;
    border-bottom: 1px solid #ddd; /* Subtle border for separation */
}

th {
    background-color: #4CAF50; /* Green header for table */
    color: white;
    text-transform: uppercase; /* Uppercase headers for emphasis */
    font-weight: bold;
}

td {
    vertical-align: middle; /* Align content vertically */
}

tr:hover {
    background-color: #f9f9f9; /* Light background on hover for clarity */
}

/* Button Styling */
.btn {
    padding: 10px 20px;
    border: none;
    background-color: #4CAF50; /* Default button color */
    color: white;
    cursor: pointer;
    border-radius: 5px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.btn:hover {
    background-color: #45a049; /* Slightly darker green on hover */
}

.btn.fulfilled {
    background-color: #007bff; /* Blue for Fulfilled */
}

.btn.fulfilled:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

.btn.delete {
    background-color: #dc3545; /* Red for Delete */
}

.btn.delete:hover {
    background-color: #c82333; /* Darker red on hover */
}

/* Status Styling */
.status {
    font-weight: bold;
    font-size: 0.9rem;
}

.fulfilled-status {
    color: #28a745; /* Success green */
}

.pending-status {
    color: #ffc107; /* Warning yellow */
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .sidebar {
        width: 200px; /* Reduce sidebar width for smaller screens */
    }

    .container {
        margin-left: 200px; /* Adjust container margin for smaller sidebar */
        width: calc(100% - 200px); /* Adjust container width */
        padding: 20px;
    }

    h1 {
        font-size: 1.5rem;
    }

    table {
        font-size: 0.9rem;
    }

    th, td {
        padding: 10px;
    }

    .btn {
        padding: 8px 15px;
        font-size: 0.8rem;
    }
}

    </style>
</head>
<body>< <!-- Sidebar -->
<div class="sidebar">
        <a href="home.php"onclick="handleNavigation('user')"><h2>Admin Dashboard</h2></a>
        <a href="user_list.php" onclick="handleNavigation('user')">User/Customer/Seller</a>
        <a href="order_list.php" onclick="handleNavigation('order')"class="active">Order</a>
        <a href="inventory.php" onclick="handleNavigation('inventory')">Inventory</a>
        <a href="report_admin.php" onclick="handleNavigation('report')">Report</a>
        <a href="feedback_admin.php" onclick="handleNavigation('feedback')">Feedback</a>
        <a href="account_list.php" onclick="handleNavigation('account')">Account Settings</a>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

<div class="dashboard-container">  
    <div class="container">
        <h1>Flower Shop - Order List</h1>

        <table id="orderTable">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Details</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Jane Doe</td>
                    <td>Roses, Tulips</td>
                    <td><span class="status pending-status">Pending</span></td>
                    <td><button class="btn fulfilled" onclick="markFulfilled(101)">Mark as Fulfilled</button> 
                        <button class="btn delete" onclick="deleteOrder(101)">Delete</button></td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>John Smith</td>
                    <td>Sunflowers, Lilies</td>
                    <td><span class="status pending-status">Pending</span></td>
                    <td><button class="btn fulfilled" onclick="markFulfilled(102)">Mark as Fulfilled</button> 
                        <button class="btn delete" onclick="deleteOrder(102)">Delete</button></td>
                </tr>
                <!-- More orders can be added here -->
            </tbody>
        </table>
    </div>
    <script>
        function markFulfilled(orderId) {
            let table = document.getElementById('orderTable');
            for (let i = 0; i < table.rows.length; i++) {
                let row = table.rows[i];
                let orderCell = row.cells[0];
                if (orderCell && orderCell.innerText == orderId) {
                    let statusCell = row.cells[3];
                    statusCell.innerHTML = '<span class="status fulfilled-status">Fulfilled</span>';
                }
            }
        }

        function deleteOrder(orderId) {
            let table = document.getElementById('orderTable');
            for (let i = 0; i < table.rows.length; i++) {
                let row = table.rows[i];
                let orderCell = row.cells[0];
                if (orderCell && orderCell.innerText == orderId) {
                    table.deleteRow(i);
                }
            }
        }
    </script>

</body>
</html>
