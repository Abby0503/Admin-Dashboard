<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 20px 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar h2 {
            color: #f8f9fa;
            font-size: 1.5rem;
            text-align: center;
            width: 100%;
            padding: 0 20px;
        }

        .sidebar a {
            text-decoration: none;
            color: #adb5bd;
            width: 100%;
            padding: 15px 20px;
            font-size: 1rem;
            font-weight: bold;
            display: block;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #495057; /* Darker Gray on Hover */
            color: #ffffff;
            border-left: 3px solid #007bff; /* Blue highlight */
            cursor: pointer;
        }
        .sidebar a.active {
            background-color: #495057;
            color: #ffffff;
            border-left: 3px solid #007bff;
        }

        .logout-btn {
            margin-top: auto;
            width: calc(100% - 40px);
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: center;
            margin: 20px;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        /* Main Content Styling */
        main {
            margin-left: 270px;
            padding: 20px;
            background-color: #f4f6f9;
            min-height: 100vh;
        }

        /* Header Styling */
        header {
            background-color: #3A8BCD;
            color: #fff;
            text-align: center;
            padding: 40px 20px;
        }

        .header-content .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .header-content h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .header-content p {
            font-size: 1.1rem;
            margin-bottom: 15px;
        }
        /* Contact Information Section */
.profile-section {
    padding: 20px;
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column; /* Stack items vertically */
    gap: 20px; /* Add space between each contact info item */
}

.profile-section h2 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 15px;
    border-bottom: 2px solid #3A8BCD;
    padding-bottom: 5px;
}

.profile-section p {
    font-size: 1rem;
    color: #555;
    display: flex;
    justify-content: space-between; /* Aligns the label and value */
    padding: 10px 0;
    border-bottom: 1px solid #ddd; /* Add a border to separate each line */
}

.profile-section p span:first-child {
    font-weight: bold; /* Make the labels bold */
    width: 120px; /* Set a fixed width for labels */
    text-align: right; /* Align the label text to the right */
}

.profile-section p span:last-child {
    font-weight: normal; /* Keep the contact information normal weight */
    text-align: left; /* Align the value text to the left */
}
/* Profile Icon */
.profile-icon i {
    font-size: 80px; /* Increased size from the previous size */
    color: #3A8BCD; /* Optional: Add color if needed */
    margin-bottom: 15px;
}
/* Edit Account Button */
.edit-button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.edit-btn {
    padding: 12px 30px;
    font-size: 1rem;
    color: white;
    background-color: #3A8BCD;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
}

.edit-btn:hover {
    background-color: #2b6f94;
}


    </style>
</head>
<body>
<div class="sidebar">
        <h2>Seller Dashboard</h2>
        <a href="seller_dashboard.php" class="nav-link" c>Dashboard</a>
        <a href="totaluser_seller.php" class="nav-link">Total Users</a>
        <a href="orderlist_seller.php" class="nav-link">Order List</a>
        <a href="inventory_seller.php" class="nav-link">Inventory</a>
        <a href="accountlist_seller.php" class="nav-link"class="active">Account Settings</a>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

    <!-- Main Content -->
    <main>
        <header>
            <div class="header-content">
                <h1>Welcome, John Doe</h1>
                <p>Manage your profile and account settings.</p>
            </div>
        </header>

       <!-- Profile Section -->
<section class="profile-section">
    <div class="profile-icon">
        <i class="fas fa-user"></i>
    </div>
    <div class="profile-details">
        <h2>John Doe</h2>
        <p>Email: johndoe@example.com</p>
        <p>Member since: January 2020</p>
    </div>
</section>

<!-- Contact Information Section -->
<section class="profile-section">
    <h2>Contact Information</h2>
    <p><span>Email:</span> <span id="displayEmail">johndoe@example.com</span></p>
    <p><span>Phone:</span> <span id="displayPhone">+123 456 7890</span></p>
    <p><span>Location:</span> <span id="displayLocation">New York, USA</span></p>
    
    <!-- New fields for Role and Birthday -->
    <p><span>Role:</span> <span id="displayRole">Seller</span></p>
    <p><span>Birthday:</span> <span id="displayBirthday">January 1, 1990</span></p>
</section>


            <!-- Edit Account Button -->
            <div class="edit-button-container">
            <a href="updateaccount_seller.php">
            <button class="edit-btn">Edit Account</button>
            </a>
        </div>
        </section>

    </main>
</body>
</html>

    <script>
        // This function will be triggered when the page loads to display the profile info
        function loadUserProfile() {
    // Dynamically load user information, including role and birthday
    document.getElementById("displayName").innerText = "John Doe";
    document.getElementById("displayEmail").innerText = "johndoe@example.com";
    document.getElementById("displayPhone").innerText = "+123 456 7890";
    document.getElementById("displayLocation").innerText = "New York, USA";
    document.getElementById("displayRole").innerText = "Administrator";
    document.getElementById("displayBirthday").innerText = "January 1, 1990";
    }

    window.onload = loadUserProfile;

    </script>
</body>
</html>
