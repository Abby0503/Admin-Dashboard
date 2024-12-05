<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Item</title>
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
    // JavaScript function to handle form submission
    function addNewItem(event) {
      event.preventDefault(); // Prevents the default form submission behavior

      // Capture input values from the form
      const itemName = document.getElementById('itemName').value;
      const category = document.getElementById('category').value;
      const quantity = document.getElementById('quantity').value;
      const price = document.getElementById('price').value;

      // Basic validation
      if (!itemName || !category || !quantity || !price) {
        alert('Please fill in all fields.');
        return;
      }

      // Display captured data in the console (this can be replaced with API integration)
      console.log('New Item Added:', {
        itemName,
        category,
        quantity,
        price
      });

      // Simulate success message
      alert('Item added successfully!');

      // Clear the form after submission
      document.getElementById('addItemForm').reset();
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Add New Item</h1>
    <!-- Form with an onsubmit event handler to trigger the function -->
    <form id="addItemForm" onsubmit="addNewItem(event)">
      <label for="itemName">Item Name:</label>
      <input type="text" id="itemName" name="itemName" required>
      
      <label for="category">Category:</label>
      <input type="text" id="category" name="category" required>
      
      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" required>
      
      <label for="price">Price (USD):</label>
      <input type="text" id="price" name="price" required>
      
      <button type="submit" class="btn-submit">Add Item</button>
    </form>
    <a href="inventory.php" class="btn-back">Back to Inventory</a>
  </div>
</body>
</html>
