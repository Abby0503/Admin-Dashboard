<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="inventory.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding; 0;
            background-color: #f4f4f4;
            color: #333;
            
        }

        /* Sidebar Styling */
        .sidebar {
        width: 250px;
        background-color: #343a40; /* Dark Gray */
        color: white;
        height: 100vh; /* Full-height sidebar */
        position: fixed; /* Fixed position */
        top: 0; /* Ensure it's at the top */
        left: 0; /* Align to the left */
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
        .inventory-container {
    position: relative;
    margin-left: 250px; /* Space to accommodate the sidebar */
    padding: 20px 30px;
    width: calc(100% - 250px); /* Adjust for full width minus the sidebar */
    box-sizing: border-box;
    background-color: #ffffff; /* White background */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    border-radius: 8px; /* Rounded corners */
    margin-top: 0; /* Remove unwanted top margin */
    min-height: 100vh; /* Ensure full height of the page */
}


        header h1 {
            text-align: center;
            color: #4CAF50; /* Green tone */
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        header p {
            text-align: center;
            font-size: 1rem;
            color: #666;
        }

        .inventory-actions {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            gap: 15px;
        }

        .inventory-actions .btn {
            padding: 10px 20px;
            background-color: #007bff; /* Blue button */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .inventory-actions .btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .btn.delete-btn {
            background-color: #dc3545; /* Red button */
        }

        .btn.delete-btn:hover {
            background-color: #c82333; /* Darker red */
        }

        .inventory-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 1rem;
            color: #333; /* Neutral text color */
        }

        .inventory-table th, .inventory-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Subtle row divider */
        }

        .inventory-table th {
            background-color: #4CAF50; /* Green header */
            color: white;
            text-transform: uppercase;
        }

        .inventory-table tr:hover {
            background-color: #f9f9f9; /* Light hover effect */
        }

        .inventory-table .btn {
            padding: 8px 15px;
            font-size: 0.9rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .inventory-table .btn.edit-btn {
            background-color: #007bff; /* Blue for edit */
            color: white;
        }

        .inventory-table .btn.edit-btn:hover {
            background-color: #0056b3;
        }

        .inventory-table .btn.delete-btn {
            background-color: #dc3545; /* Red for delete */
            color: white;
        }

        .inventory-table .btn.delete-btn:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .inventory-container {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .inventory-actions {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
    <script>
        // Function to handle the Edit button action
        function editItem(itemId) {
            window.location.href = `Edit_Item.php?itemId=${itemId}`;
        }

        // Function to handle the Delete button action
        function deleteItem(itemId) {
            const confirmDelete = confirm(`Are you sure you want to delete the item with ID ${itemId}?`);
            if (confirmDelete) {
                // Simulating deletion (this should be replaced with actual backend logic)
                alert(`Item with ID ${itemId} has been deleted.`);
                
                // Redirect to server-side logic if integrated
                // Example: window.location.href = `Delete_Item.php?itemId=${itemId}`;
            }
        }
    </script>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
        <a href="home.php"onclick="handleNavigation('user')"><h2>Admin Dashboard</h2></a>
        <a href="user_list.php" onclick="handleNavigation('user')">User/Customer/Seller</a>
        <a href="order_list.php" onclick="handleNavigation('order')">Order</a>
        <a href="inventory.php" onclick="handleNavigation('inventory')"class="active">Inventory</a>
        <a href="report_admin.php" onclick="handleNavigation('report')">Report</a>
        <a href="feedback_admin.php" onclick="handleNavigation('feedback')">Feedback</a>
        <a href="account_list.php" onclick="handleNavigation('account')">Account Settings</a>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

    <!-- Inventory Management Section -->
    <div class="inventory-container">
        <header>
            <h1>Inventory Management</h1>
            <p>Track and update your product inventory here.</p>
        </header>

        <div class="inventory-actions">
            <a href="Add_Item.php" class="btn add-btn">Add New Item</a>
            <a href="Update_Item.php" class="btn update-btn">Update Stock</a>
            <a href="Remove_Item.php" class="btn delete-btn">Remove Item</a>
        </div>

        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price (USD)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Wireless Keyboard</td>
                    <td>Electronics</td>
                    <td>50</td>
                    <td>29.99</td>
                    <td>
                        <button class="btn edit-btn" onclick="editItem(101)">Edit</button>
                        <button class="btn delete-btn" onclick="deleteItem(101)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Coffee Mug</td>
                    <td>Home & Kitchen</td>
                    <td>120</td>
                    <td>9.99</td>
                    <td>
                        <button class="btn edit-btn" onclick="editItem(102)">Edit</button>
                        <button class="btn delete-btn" onclick="deleteItem(102)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>