<?php 
    include('PARTIALS/admin-header.php');

    // Debug: Display the entire $_GET array
    // var_dump($_GET);

    // Check whether id is set or not
    if (isset($_GET['id'])) {
        // Sanitize and validate the product id
        $product_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
        // echo "Debug: Product ID from URL: " . $product_id;

        if (filter_var($product_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-f\d]{24}$/i")))) {
            // The product id is valid
            // Note: No need to convert to MongoDB ObjectID here

            // Check if the product exists in the database
            $product = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($product_id)]);

            if ($product) {
                // The product exists
                // Execute the operation update
                // Update Product
                if(isset($_POST['update_product'])) {
                    // Get the values of the new price and new quantity from the form
                    $new_price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $new_quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
                    // Get the values of the product name, description, product key, category, and image filename from the form
                    $product_name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING);
                    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
                    $activation_code = filter_input(INPUT_POST, 'activation_code', FILTER_SANITIZE_STRING);
                    $product_category = filter_input(INPUT_POST, 'product_category', FILTER_SANITIZE_STRING);
                    $image_filename = filter_input(INPUT_POST, 'image_filename', FILTER_SANITIZE_STRING);

                    // Validate the values of the new price and new quantity
                    if (filter_var($new_price, FILTER_VALIDATE_FLOAT) && filter_var($new_quantity, FILTER_VALIDATE_INT)) {
                        // The values are valid
                        // Validate the values of the product name, description, product key, category, and image filename
                        if ($product_name && $description && $activation_code && $product_category && $image_filename) {
                            // The values are valid
                            // Update the product in the database
                            $collection->updateOne(
                                ['_id' => new MongoDB\BSON\ObjectID($product_id)],
                                ['$set' => [
                                    'price' => $new_price, 
                                    'quantity' => $new_quantity,
                                    'product_name' => $product_name,
                                    'description' => $description,
                                    'activation_code' => $activation_code,
                                    'product_category' => $product_category,
                                    'image_filename' => $image_filename
                                ]]
                            );
                            // Redirect to the shop page
                            header('Location: admin-home.php');
                            exit();
                        } else {
                            // The values are invalid
                            // Display an error message or redirect to another page
                            echo "Invalid input. Please enter valid values for all the fields.";
                        }
                    } else {
                        // The values are invalid
                        // Display an error message or redirect to another page
                        echo "Invalid input. Please enter valid numbers for price and quantity.";
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
        echo "No product id found. Please select a product to update.";
    }
?>


<section class="crud-section">
    <!-- Update Product Form -->
    <form id="update_product_form" action="" method="post">
        <h3 class="opr-name">Update Product</h3><br>
        <!-- Use $_GET['id'] to display the product ID -->
        <div class="form-row">
            <label for="product_id">Product ID:</label>
            <input type="text" name="product_id" id="product_id" value="<?php echo $_GET['id']; ?>" readonly>
        </div>
        <div class="form-row">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" value="<?php echo $product['product_name']; ?>" required>
        </div>
        <div class="form-row">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="<?php echo $product['description']; ?>" required>
        </div>
        <div class="form-row">
            <label for="activation_code">Product Key:</label>
            <input type="text" name="activation_code" id="activation_code" value="<?php echo $product['activation_code']; ?>" required>
        </div>
        <div class="form-row">
            <label for="product_category">Product Category:</label>
            <select name="product_category" id="product_category" required>
                <option value="" disabled <?php echo ($product['product_category'] == '') ? 'selected' : ''; ?>>Select Category</option>
                <option value="Office Products" <?php echo ($product['product_category'] == 'Office Products') ? 'selected' : ''; ?>>Office Products</option>
                <option value="Operating System" <?php echo ($product['product_category'] == 'Operating System') ? 'selected' : ''; ?>>Operating System</option>
                <option value="Design Software" <?php echo ($product['product_category'] == 'Design Software') ? 'selected' : ''; ?>>Design Software</option>
            </select>
        </div>
        <div class="form-row">
            <label for="image_filename">Image Filename:</label>
            <input type="text" name="image_filename" id="image_filename" value="<?php echo $product['image_filename']; ?>" required>
        </div>
        <div class="form-row">
            <label for="price">New Price:</label>
            <input type="number" step="0.01" name="price" id="price" min="0" value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="form-row">
            <label for="quantity">New Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="0" value="<?php echo $product['quantity']; ?>" required>
        </div>
        <button type="submit" name="update_product" form="update_product_form">Update Product</button>
    </form>
</section>

<?php include('PARTIALS/footer.php'); ?>