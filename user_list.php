<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
    width: 250px;
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

/* Responsive Sidebar for Smaller Screens */
@media (max-width: 768px) {
    .sidebar {
        width: 200px; /* Reduce sidebar width for smaller screens */
    }

    .sidebar h2 {
        font-size: 1.2rem; /* Reduce heading size */
    }

    .sidebar a {
        font-size: 0.9rem; /* Reduce font size for links */
    }

    .logout-btn {
        width: 80%; /* Adjust button width */
    }
}


        /* Main Container Styles */
        .main-container {
            margin-left: 250px; /* Matches the sidebar width */
            padding: 20px;
            flex: 1;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: space-between;
        }

        form input, form select, form button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex: 1;
        }

        form button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            max-width: 100px;
        }

        form button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #ffc107;
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #007bff; /* Primary Blue */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker Blue */
        }

        .btn-primary:active {
            background-color: #004085; /* Even Darker Blue */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
<div class="sidebar">
        <a href="home.php"onclick="handleNavigation('user')"><h2>Admin Dashboard</h2></a>
        <a href="user_list.php" onclick="handleNavigation('user')"class="active">User/Customer/Seller</a>
        <a href="order_list.php" onclick="handleNavigation('order')">Order</a>
        <a href="inventory.php" onclick="handleNavigation('inventory')">Inventory</a>
        <a href="report_admin.php" onclick="handleNavigation('report')">Report</a>
        <a href="feedback_admin.php" onclick="handleNavigation('feedback')">Feedback</a>
        <a href="account_list.php" onclick="handleNavigation('account')">Account Settings</a>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>


    <!-- Main Container -->
    <div class="main-container">
        <div class="container">
            <h1>User Management</h1>
            <form id="userForm">
                <input type="text" id="name" placeholder="Name" required>
                <input type="email" id="email" placeholder="Email" required>
                <select id="role">
                    <option value="User">User</option>
                    <option value="Seller">Seller</option>
                    <option value="Admin">Admin</option>
                </select>
                <button type="submit">Add</button>
            </form>

            <table id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamic rows will be added here -->
                </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
</html>
