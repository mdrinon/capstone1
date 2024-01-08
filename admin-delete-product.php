<?php 
    include('PARTIALS/admin-header.php');

    // Check whether id is set or not
    if (isset($_GET['id'])) {
        // Sanitize and validate the product id
        $product_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

        if (filter_var($product_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-f\d]{24}$/i")))) {
            // The product id is valid

            // Check if the product exists in the database
            $product = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($product_id)]);

            if ($product) {
                // The product exists

                // Check if the delete button is clicked and if the entered ID matches the product ID
                if (isset($_POST['delete_product'])) {
                    $entered_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING);

                    if ($entered_id === $product_id) {
                        // Delete the product from the database
                        $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($product_id)]);

                        // Check if deletion was successful
                        if ($deleteResult->getDeletedCount() > 0) {
                            // Product deleted successfully
                            echo '<script>';
                            echo 'alert("Product deleted successfully.");';
                            echo 'window.location.href = "admin-home.php";'; // Redirect to admin-home.php
                            echo '</script>';
                            exit();
                        } else {
                            // Failed to delete product
                            header('Location: admin-home.php?error=Failed to delete product.');
                            exit();
                        }
                    } else {
                        // Display an error message as entered ID does not match product ID
                        echo '<script>';
                        echo 'alert("Entered product ID does not match. Please try again.");';
                        echo '</script>';
                    }
                }
            } else {
                // The product does not exist
                // Display an error message or redirect to another page
                echo "Product not found. Please check the URL and try again.";
            }
        } else {
            // The product id is invalid
            // Display an error message or redirect to another page
            echo "Invalid product id. Please check the URL and try again. Selected ID: " . $product_id;
        }
    } else {
        // The id parameter is not set
        // Display an error message or redirect to another page
        echo "No product id found. Please select a product to delete.";
    }
?>

<section class="crud-section">
    <!-- Delete Product Form -->
    <form id="delete_product_form" action="" method="post">
        <h3 class="opr-name">Delete Product</h3><br>
        <div class="form-row">
            <label for="product_id">Product ID:</label>
            <input type="text" name="product_id" id="product_id" required>
        </div>
        <button type="submit" name="delete_product" form="delete_product_form">Delete Product</button>
    </form>
</section>

<?php include('PARTIALS/footer.php'); ?>
