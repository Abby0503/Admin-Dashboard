<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop - Order List (Non-Admin View)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .status {
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Flower Shop - Order List</h1>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Details</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Jane Doe</td>
                    <td>Roses, Tulips</td>
                    <td><span class="status">Done</span></td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>John Smith</td>
                    <td>Sunflowers, Lilies</td>
                    <td><span class="status">Done</span></td>
                </tr>
                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <button 
            class="btn btn-primary" 
            onclick="window.location.href='homee.php'">
            Back to Dashboard
        </button>
    </div>

</body>
</html>
