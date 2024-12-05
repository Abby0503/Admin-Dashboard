<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | Job Website</title>
    <link rel="stylesheet" href="style.css">
    <style>
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
        }

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

        .edit-profile-button {
            background-color: #FF4081;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .edit-profile-button:hover {
            background-color: #e23670;
        }

        .profile-section {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-section h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 2px solid #3A8BCD;
            padding-bottom: 5px;
        }

        #edit-form input, #edit-form textarea {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        #edit-form button {
            padding: 10px 20px;
            margin: 10px 5px;
            cursor: pointer;
            font-weight: bold;
        }

        #edit-form button:nth-child(1) {
            background-color: #3A8BCD;
            color: #fff;
            border: none;
        }

        #edit-form button:nth-child(2) {
            background-color: #ccc;
            color: #333;
            border: none;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Edit Profile</h1>
        </div>
    </header>

    <div id="edit-form">
        <section class="profile-section">
            <h2>Edit Your Information</h2>
            <form id="profileForm">
                <label for="name">Name:</label>
                <input type="text" id="name" value="John Doe">

                <label for="position">Position:</label>
                <input type="text" id="position" value="Graphic Designer at XYZ Corp.">

                <label for="email">Email:</label>
                <input type="email" id="email" value="johndoe@example.com">

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" value="+123 456 7890">

                <label for="location">Location:</label>
                <input type="text" id="location" value="New York, USA">

                <button type="button" onclick="saveProfile()">Save</button>
                <button type="button" onclick="cancelEdit()">Cancel</button>
            </form>
        </section>
    </div>

    <script>
        // Function to save the profile changes
        function saveProfile() {
            // Get values from the input fields
            const name = document.getElementById("name").value;
            const position = document.getElementById("position").value;
            const about = document.getElementById("about").value;
            const email = document.getElementById("email").value;
            const phone = document.getElementById("phone").value;
            const location = document.getElementById("location").value;

            // Normally, you would save these details to a database here

            // If you want to reflect the changes immediately in the profile (for example, in localStorage or a server)
            // For this example, we just log the updated values:
            console.log({
                name: name,
                position: position,
                about: about,
                email: email,
                phone: phone,
                location: location
            });

            // Redirect back to the profile page or update the data on the main page
            alert("Profile updated successfully!");
            window.location.href = "account_list.php";
        }

        // Function to cancel editing and go back to the profile page
        function cancelEdit() {
            // Simply redirect back to the user profile page
            window.location.href = "account_list.php";
        }
    </script>
</body>
</html>
