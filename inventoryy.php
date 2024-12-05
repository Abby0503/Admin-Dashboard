<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory - User View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .inventory-container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            text-align: center;
            color: #4CAF50;
        }
        header p {
            text-align: center;
            color: #555;
        }
        .inventory-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .inventory-table th, .inventory-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .inventory-table th {
            background-color: #4CAF50;
            color: white;
        }
        .inventory-table tr:hover {
            background-color: #f1f1f1;
        }
        .btn-primary {
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="inventory-container">
        <header>
            <h1>Inventory</h1>
            <p>View the available items in our inventory.</p>
        </header>

        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price (USD)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Wireless Keyboard</td>
                    <td>Electronics</td>
                    <td>50</td>
                    <td>29.99</td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Coffee Mug</td>
                    <td>Home & Kitchen</td>
                    <td>120</td>
                    <td>9.99</td>
                </tr>
                <!-- Additional rows can be added here -->
            </tbody>
        </table>

        <div style="text-align: center; margin-top: 20px;">
            <button 
                class="btn-primary" 
                onclick="window.location.href='homee.php'">
                Back to Dashboard
            </button>
        </div>
    </div>
</body>
</html>
