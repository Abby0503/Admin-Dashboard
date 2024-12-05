<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
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
            font-family: Arial, sans-serif;
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
            padding: 20px 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar h2 {
            color: #f8f9fa;
            font-size: 1.5rem;
            text-align: center;
            padding: 0 20px;
        }

        .sidebar a {
            text-decoration: none;
            color: #adb5bd;
            padding: 15px 20px;
            font-size: 1rem;
            font-weight: bold;
            display: block;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
            color: #fff;
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

        /* Account Editing Form */
        .edit-profile-section {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .edit-profile-section h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .edit-profile-section label {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
            display: block;
        }

        .edit-profile-section input, .edit-profile-section select {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .edit-profile-section button {
            padding: 12px 30px;
            font-size: 1rem;
            color: white;
            background-color: #3A8BCD;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-profile-section button:hover {
            background-color: #2b6f94;
        }

        /* Update Password Button */
        .update-password-btn {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        .update-password-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .update-password-btn:active {
            background-color: #003d82;
        }

        /* Button Container */
        .button-container {
            text-align: left;
        }

        /* Cancel Button */
        .cancel-btn {
            padding: 12px 30px;
            font-size: 1rem;
            color: white;
            background-color: #6c757d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 10px;
        }

        .cancel-btn:hover {
            background-color: #5a6268;
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
                <h1>Edit Account Settings</h1>
            </div>
        </header>

        <!-- Edit Profile Section -->
        <section class="edit-profile-section">
            <h2>Update Your Information</h2>
            <form action="updateaccount_seller.php" method="POST" onsubmit="handleSaveChanges(event)">
                <label for="editName">Name</label>
                <input type="text" id="editName" name="name" value="John Doe" required>

                <label for="editEmail">Email</label>
                <input type="email" id="editEmail" name="email" value="johndoe@example.com" required>

                <label for="editPhone">Phone</label>
                <input type="text" id="editPhone" name="phone" value="+123 456 7890" required>

                <label for="editLocation">Location</label>
                <input type="text" id="editLocation" name="location" value="New York, USA" required>

                <button type="submit">Save Changes</button>
                
                <div class="button-container">
                    <a href="changepass_seller.php" class="update-password-btn">Update Password</a>
                </div>

                <button type="button" class="cancel-btn" onclick="window.location.href='accountlist_seller.php';">Cancel</button>
            </form>
        </section>
    </main>
</body>
</html>

<script>
    // This function handles the form submission when the Save Changes button is clicked
    function handleSaveChanges(event) {
        event.preventDefault();  // Prevent the default form submission

        // Get form data
        var name = document.getElementById("editName").value;
        var email = document.getElementById("editEmail").value;
        var phone = document.getElementById("editPhone").value;
        var location = document.getElementById("editLocation").value;

        // Perform validation
        if (name.trim() === "" || email.trim() === "" || phone.trim() === "" || location.trim() === "") {
            alert("Please fill out all fields.");
            return;
        }

        // For now, log the data to the console
        console.log("Updated Info: ", { name, email, phone, location });

        // Submit the form (or send data via AJAX if needed)
        event.target.submit();
    }

    function logout() {
        // Log out function (optional)
        alert("Logging out...");
    }
</script>
