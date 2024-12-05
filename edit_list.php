<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .btn-edit {
            background-color: #ffc107;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-save {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-save:hover {
            background-color: #218838;
        }
        .form-container {
            display: none;
            margin-bottom: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Order List</title>
    <link rel="stylesheet" href="order_list.css">
</head>
<body>
    <div class="order-container">
        <h1 class="order-title">Customer Order List</h1>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
        </table>
</html>
        </table>

        <div class="form-container" id="editForm">
            <h2>Edit User</h2>
            <form id="editFormFields">
                <input type="hidden" id="editUserId">
                <div class="mb-3">
                    <label for="editName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="editName" required>
                </div>
                <div class="mb-3">
                    <label for="editEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="editEmail" required>
                </div>
                <div class="mb-3">
                    <label for="editRole" class="form-label">Role</label>
                    <select class="form-select" id="editRole">
                        <option value="User">User</option>
                        <option value="Seller">Seller</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn-save">Save Changes</button>
            </form>
        </div>

        <button class="btn btn-secondary" onclick="window.location.href='user_list.php'">Back to User List </button>
    </div>

    <script>
        // Handle Edit User Button Click
        function editUser(userId) {
            // Find the user row using userId
            const row = document.querySelector(`tr[data-user-id="${userId}"]`);
            const name = row.cells[1].innerText;
            const email = row.cells[2].innerText;
            const number = row.cells[3].innerText;
            const role = row.cells[4].innerText;

            // Fill the form with current user data
            document.getElementById('editUserId').value = userId;
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editRole').value = role;

            // Show the edit form
            document.getElementById('editForm').style.display = 'block';
        }

        // Handle Save Changes (submit form)
        document.getElementById('editFormFields').addEventListener('submit', function (e) {
            e.preventDefault();

            // Get the values from the form
            const userId = document.getElementById('editUserId').value;
            const name = document.getElementById('editName').value;
            const email = document.getElementById('editEmail').value;
            const role = document.getElementById('editRole').value;

            // Find the row for this user and update it
            const row = document.querySelector(`tr[data-user-id="${userId}"]`);
            row.cells[1].innerText = name;
            row.cells[2].innerText = email;
            row.cells[4].innerText = role;

            // Hide the form and reset it
            document.getElementById('editForm').style.display = 'none';
            document.getElementById('editFormFields').reset();
        });
    </script>
</body>
</html>