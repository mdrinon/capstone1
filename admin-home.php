<?php 
include('PARTIALS/admin-header.php');
?>

<div class="space-between"></div>

<div id="adpage-label">
    <h3 id="mng-pro-label">Manage Products</h3>
    <button id="add-product-button" onclick="window.location.href='admin-add-product.php'">Add Product</button>
</div>


<?php
    // Check if there is a message query parameter
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        // Display the success message
        echo '<div id="success-message">' . htmlspecialchars($message) . '</div>';
    }
?>


<div id="search-bar">
    <!-- Search Bar -->
    <form id="search-form" class="search-bar" action="" method="post" onsubmit="event.preventDefault(); searchProducts();">
        <input type="text" id="search-query" name="search_query" placeholder="Search products...">
        <button type="submit" name="search_product" class="search-icon-button custom-width">
            <img class="search-icon-button custom-width" src="PARTIALS/images/search.jpg">
        </button>
    </form>
</div>

<div class="space-between"></div>

<table id="product-list">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Product Key</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <tbody id="product-list-body">
        <!-- Table rows will be dynamically populated here using JavaScript -->
    </tbody>
</table>

<script>
// Function to fetch and display products
function fetchProducts() {
    // Fetch products from the server using AJAX
    $.ajax({
        url: 'get_products.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Populate the table with the fetched products
            populateTable(data);
        },
        error: function (error) {
            console.log('Error fetching products:', error);
        }
    });
}

// Function to populate the table with products
function populateTable(products) {
    // Clear existing rows
    $('#product-list-body').empty();

    // Iterate through the products and append rows to the table
    products.forEach(function (product) {
        // Ensure that product._id is a valid string
        var productId = product._id.$oid || product._id;
        
        $('#product-list-body').append(`
            <tr>
                <td><img id="img100px" src="PARTIALS/images/${product.image_filename}" alt="Product Image"></td>
                <td>${product.product_name}</td>
                <td>${product.description}</td>
                <td>${product.activation_code}</td>
                <td>${product.price}</td>
                <td>${product.quantity}</td>
                <td>${product.product_category}</td>
                <td>
                    <button onclick="showProductId('${productId}')">Update</button>
                    <button onclick="confirmDelete('${productId}')">Delete</button>
                </td>
                <td style="display: none;">${productId}</td>
            </tr>
        `);
    });
}

    // showProductId function to directly pass the product ID as a string
    function showProductId(productId) {
        alert("Product ID: " + productId);
        window.location.href = 'admin-update-product.php?id=' + encodeURIComponent(productId.toString());
    }

    // Function to handle product search
    function searchProducts() {
        var searchQuery = $('#search-query').val();

        // Perform search on the server using AJAX
        $.ajax({
            url: 'search_products.php',
            type: 'POST',
            dataType: 'json',
            data: {search_query: searchQuery},
            success: function (data) {
                // Populate the table with the search results
                populateTable(data);
            },
            error: function (error) {
                console.log('Error searching products:', error);
            }
        });
    }


    // Function to confirm product deletion
    function confirmDelete(productId) {
        var result = confirm("Are you sure you want to delete product with ID: " + productId + "?");
        if (result) {
            window.location.href = 'admin-delete-product.php?id=' + productId;
        }
    }

    // Call fetchProducts() when the page is ready
    $(document).ready(function() {
        fetchProducts();
    });


</script>
