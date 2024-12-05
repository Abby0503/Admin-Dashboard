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
        }

        /* Sidebar Styling (Reuse from previous sidebar styles) */
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
            background-color: #495057;
            color: #ffffff;
            border-left: 3px solid #007bff;
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

    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <a href="user_list.php" onclick="handleNavigation('user')">User/Customer/Seller</a>
        <a href="order_list.php" onclick="handleNavigation('order')">Order</a>
        <a href="inventory.php" onclick="handleNavigation('inventory')">Inventory</a>
        <a href="report_admin.php" onclick="handleNavigation('report')">Report</a>
        <a href="feedback_admin.php" onclick="handleNavigation('feedback')">Feedback</a>
        <a href="account_list.php" onclick="handleNavigation('account')"class="active">Account Settings</a>
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
            <form action="update_account.php" method="POST" onsubmit="handleSaveChanges(event)">
    <label for="editName">Name</label>
    <input type="text" id="editName" name="name" value="John Doe" required>

    <label for="editEmail">Email</label>
    <input type="email" id="editEmail" name="email" value="johndoe@example.com" required>

    <label for="editPhone">Phone</label>
    <input type="text" id="editPhone" name="phone" value="+123 456 7890" required>

    <label for="editLocation">Location</label>
    <input type="text" id="editLocation" name="location" value="New York, USA" required>

    <button type="submit">Save Changes</button>
    <button type="button" onclick="window.location.href='account_list.php';">Cancel</button>
</form>

        </section>
    </main>
</body>
</html>
<script>
    // This function handles the form submission when the Save Changes button is clicked
    function handleSaveChanges(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Get form data (values of the input fields)
        var name = document.getElementById("editName").value;
        var email = document.getElementById("editEmail").value;
        var phone = document.getElementById("editPhone").value;
        var location = document.getElementById("editLocation").value;

        // Perform any validation here if needed
        if (name.trim() === "" || email.trim() === "" || phone.trim() === "" || location.trim() === "") {
            alert("Please fill out all fields.");
            return;
        }

        // For now, let's just log the data (You can send this data to the server via AJAX or normal form submission)
        console.log("Updated Info: ", {
            name: name,
            email: email,
            phone: phone,
            location: location
        });

        // If everything is valid, submit the form
        // If using AJAX, you can send the data here instead of using the form's action
        // For example, send the data via AJAX:
        /*
        fetch('update_account.php', {
            method: 'POST',
            body: new URLSearchParams({
                name: name,
                email: email,
                phone: phone,
                location: location
            })
        })
        .then(response => response.json())
        .then(data => {
            // Handle server response here, like showing a success message
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
        */

        // For this example, we'll just submit the form as usual after processing
        event.target.submit(); // This will submit the form to the server as defined in the form's action
    }
</script>
