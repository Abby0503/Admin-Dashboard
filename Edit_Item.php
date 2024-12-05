<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Item</title>
  <link rel="stylesheet" href="style.css">
  <style>
      body {
  font-family: Arial, sans-serif;
  background-color: #f8f9fa;
  margin: 0;
  padding: 20px;
}

.container {
  max-width: 500px;
  margin: 0 auto;
  background: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 5px;
  font-weight: bold;
}

input {
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-submit {
  background-color: #28a745;
  color: white;
}

.btn-submit:hover {
  background-color: #218838;
}

.btn-delete {
  background-color: #dc3545;
  color: white;
}

.btn-delete:hover {
  background-color: #c82333;
}

.btn-back {
  display: block;
  text-align: center;
  margin-top: 15px;
  text-decoration: none;
  color: #007bff;
}

.btn-back:hover {
  text-decoration: underline;
}
  </style>
  <script>
    // JavaScript function to handle form submission for editing an item
    function editItem(event) {
      event.preventDefault(); // Prevent default form submission

      // Get values from the input fields
      const itemId = document.getElementById('itemId').value;
      const itemName = document.getElementById('itemName').value;
      const category = document.getElementById('category').value;
      const quantity = document.getElementById('quantity').value;
      const price = document.getElementById('price').value;

      // Validate input values
      if (!itemName || !category || !quantity || !price) {
        alert('Please fill in all fields.');
        return;
      }

      // Log the edited item details (this can be replaced with API integration)
      console.log('Item Updated:', {
        itemId,
        itemName,
        category,
        quantity,
        price
      });

      // Simulate success message
      alert('Item updated successfully!');

      // Optionally, you can redirect back to the inventory page
      window.location.href = 'index.html';
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Edit Item</h1>
    <!-- Form with an onsubmit event handler to trigger the function -->
    <form id="editItemForm" onsubmit="editItem(event)">
      <label for="itemId">Item ID (Read-only):</label>
      <input type="text" id="itemId" name="itemId" value="101" readonly>
      
      <label for="itemName">Item Name:</label>
      <input type="text" id="itemName" name="itemName" value="Wireless Keyboard" required>
      
      <label for="category">Category:</label>
      <input type="text" id="category" name="category" value="Electronics" required>
      
      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" value="50" required>
      
      <label for="price">Price (USD):</label>
      <input type="text" id="price" name="price" value="29.99" required>
      
      <button type="submit" class="btn-submit">Update Item</button>
    </form>
    <a href="inventory.php" class="btn-back">Back to Inventory</a>
  </div>
</body>
</html>
