<?php
include('PARTIALS/admin-header.php');

// Check if the add product button is clicked
if (isset($_POST['add_product'])) {
    $new_product_name = filter_input(INPUT_POST, 'new_product_name', FILTER_SANITIZE_STRING);
    $new_product_category = filter_input(INPUT_POST, 'new_product_category', FILTER_SANITIZE_STRING);
    $new_price = filter_input(INPUT_POST, 'new_price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $new_quantity = filter_input(INPUT_POST, 'new_quantity', FILTER_SANITIZE_NUMBER_INT);
    $new_description = filter_input(INPUT_POST, 'new_description', FILTER_SANITIZE_STRING);
    $new_image_filename = filter_input(INPUT_POST, 'new_image_filename', FILTER_SANITIZE_STRING);
    $new_activation_code = filter_input(INPUT_POST, 'new_activation_code', FILTER_SANITIZE_STRING);

    // Insert the new product into the database
    $insertResult = $collection->insertOne([
        'product_name' => $new_product_name,
        'product_category' => $new_product_category,
        'price' => $new_price,
        'quantity' => $new_quantity,
        'description' => $new_description,
        'image_filename' => $new_image_filename,
        'activation_code' => $new_activation_code
    ]);

    // Check if the insertion was successful
    if ($insertResult->getInsertedCount() > 0) {
        // Product added successfully, redirect to manage products page
        header('Location: admin-home.php?message=Product added successfully!');
        exit();
    } else {
        // Failed to add product
        $error = "Failed to add product. Please try again.";
    }
}
?>

<section class="crud-section">
    <form id="add_new_product_form" action="" method="post">
        <h3 class="opr-name">Add New Product</h3><br>
        <div class="form-row">
            <label for="new_product_name">Product Name:</label>
            <input type="text" name="new_product_name" id="new_product_name" required>
        </div>
        <div class="form-row">
            <label for="new_product_category">Product Category:</label>
            <select name="new_product_category" id="new_product_category" required>
                <option value="" disabled selected>Select Category</option>
                <option value="Office Products">Office Products</option>
                <option value="Operating System">Operating System</option>
                <option value="Design Software">Design Software</option>
            </select>
        </div>
        <div class="form-row">
            <label for="new_price">Price:</label>
            <input type="number" name="new_price" id="new_price" min="0" required>
        </div>
        <div class="form-row">
            <label for="new_quantity">Quantity:</label>
            <input type="number" name="new_quantity" id="new_quantity" min="0" required>
        </div>
        <div class="form-row">
            <label for="new_description">Description:</label>
            <textarea name="new_description" id="new_description" required></textarea>
        </div>
        <div class="form-row">
            <label for="new_image_filename">Image Filename:</label>
            <input type="text" name="new_image_filename" id="new_image_filename" required>
        </div>
        <div class="form-row">
            <label for="new_activation_code">Activation Code:</label>
            <input type="text" name="new_activation_code" id="new_activation_code" required>
        </div>
        <button type="submit" name="add_product" form="add_new_product_form">Add Product</button>
    </form>


    <!-- Display success or error message -->
    <?php if (isset($error)): ?>
        <script>
            alert("<?php echo $error; ?>");
        </script>
    <?php endif; ?>
</section>

<?php include('PARTIALS/footer.php'); ?>
