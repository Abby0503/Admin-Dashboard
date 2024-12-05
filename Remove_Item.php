<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remove Item</title>
  <link rel="stylesheet" href="style.css">
  <script>
    // JavaScript function to handle item removal
    function removeItem(event) {
      event.preventDefault(); // Prevent the default form submission

      const itemId = document.getElementById('itemId').value;

      // Validate the input
      if (!itemId) {
        alert('Please enter a valid Item ID.');
        return;
      }

      // Log the item ID being removed (to simulate the action)
      console.log('Item Removed:', itemId);

      // Simulate success message
      alert('Item removed successfully!');

      // Optionally, redirect back to the inventory page
      window.location.href = 'index.html';
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Remove Item</h1>
    <!-- Form to accept Item ID for removal -->
    <form id="removeItemForm" onsubmit="removeItem(event)">
      <label for="itemId">Item ID:</label>
      <input type="text" id="itemId" name="itemId" required>
      
      <button type="submit" class="btn-submit">Remove Item</button>
    </form>
    <a href="inventory.php" class="btn-back">Back to Inventory</a>
  </div>
</body>
</html>
