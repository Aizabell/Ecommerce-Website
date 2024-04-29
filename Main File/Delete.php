// Delete.php

<?php

require_once 'Connect.php'; 

// Check if product ID is passed in URL parameters
if(isset($_GET['id'])) {

  // Get product ID
  $id = $_GET['id'];

  // SQL query to delete product
  $sql = "DELETE FROM Product WHERE P_ID = :id";

  // Prepare statement
  $stmt = $pdo->prepare($sql);

  // Bind product ID parameter
  $stmt->bindParam(':id', $id);

  // Execute query
  $stmt->execute();
  
  // Redirect back to product list
  header("Location: AProduct.php");
  exit();

} else {
  // No product ID passed
  // Can add error handling here
}

?>
