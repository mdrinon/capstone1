<?php 
    include('PARTIALS/header.php'); 


    // Search Products
    if(isset($_POST['search_product'])) {
        $search_query = $_POST['search_query'];

        // Search for products in the database
        $cursor = $collection->find([
            '$or' => [
                ['product_name' => ['$regex' => $search_query, '$options' => 'i']],
                ['product_category' => ['$regex' => $search_query, '$options' => 'i']],
                ['description' => ['$regex' => $search_query, '$options' => 'i']]
            ]
        ]);
    } else {
        // Fetch all documents from the collection
        $cursor = $collection->find();
    }
?>



<section class="products">

    <!-- Navigation -->
    <nav>
        <?php
        // Fetch all product categories from the database
        $categories = $collection->distinct("product_category");

        // Display each category as a button
        foreach ($categories as $category) {
            // Generate the button ID using the category name
            $buttonId = strtolower(str_replace(' ', '-', $category)) . '-catalog-button';
            ?>
            <button id="<?php echo $buttonId; ?>"><?php echo $category; ?></button>
        <?php } ?>
        <div class="animation start-home"></div>
    </nav>

    
    <!-- Search Bar -->
    <form class="search-bar" action="" method="post">
        <input type="text" name="search_query" placeholder="Search products...">
        <button type="submit" name="search_product" class="search-icon-button custom-width">
        <img class="search-icon-button custom-width" src="PARTIALS/images/search.jpg">
        </button>
    </form>


    <!-- add space -->
    <div class="space-between"><hr></div>


    <!-- Product Catalog -->
    <div class="gallery">

        <?php
        // Check if $cursor is an array or an object
        if (is_array($cursor) || is_object($cursor)) {
            // Iterate over the documents and display them
            foreach ($cursor as $document) {
                // Generate the catalog ID and the details ID using the category name and the product name
                $catalogId = strtolower(str_replace(' ', '-', $document['product_category'])) . '-catalog';
                $detailsId = $catalogId . '-' . strtolower(str_replace(' ', '-', $document['product_name'])) . '-details';
                ?>
                <div class="catalog" id="<?= $catalogId ?>" data-category="<?= htmlspecialchars($document['product_category']) ?>">
                    <!-- Catalog item details -->
                    <img src="PARTIALS/images/<?= $document['image_filename'] ?>" alt="<?= $document['product_name'] ?>">

                    <div class="catalog-info" id="<?= $detailsId ?>" data-category="<?= htmlspecialchars($document['product_category']) ?>">
                        <h5><?= $document['product_name'] ?></h5><br>
                        <!-- <button class="toggle-button">Show Details</button> -->
                        <div class="details">
                            <!-- <form action="" method="post">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" min="0" max="<?= $document['quantity'] ?>" value="" onkeydown="return event.keyCode !== 69 && event.keyCode !== 189 && event.keyCode !== 187;">
                            </form> -->
                            <h6><b>Php<?= $document['price'] ?></b></h6><br>
                            <p><i><?= $document['description'] ?></i></p>
                            <p><a href="#">show more details..</a></p>
                        </div>
                        <div class="button-container">
                            <button class="add-to-cart-button"><i class="ri-heart-add-fill"></i> Add to Favorites</button>
                            <button class="checkout-button"><i class="fas fa-check"></i> Check Out</button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // Handle the case when $cursor is not an array or an object
            echo "Invalid value for foreach loop";
        }
        ?>
    </div>
</section>

<!-- add space -->
<div class="space-between"></div>

<!-- JavaScript code for animations -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listeners to the navigation buttons
        var buttons = document.querySelectorAll('nav button');
        buttons.forEach((button, index) => {
            button.addEventListener('click', function() {
                // Get the button ID
                var buttonId = this.id;
                // Call the showCatalog function with the button ID
                showCatalog(buttonId);
                // Remove the 'selected' class from all buttons
                buttons.forEach(button => button.classList.remove('selected'));
                // Add the 'selected' class to the clicked button
                this.classList.add('selected');
            });
        });
    });

    function showCatalog(buttonId) {

        // Get the catalog ID by removing the '-button' suffix from the button ID
        var catalogId = buttonId.replace('-button', '');

        // Hide all catalog items
        var catalogs = document.getElementsByClassName('catalog');
        for (var i = 0; i < catalogs.length; i++) {
            catalogs[i].style.display = 'none';
        }
        
        // Hide all catalog item details
        var catalogDetails = document.getElementsByClassName('catalog-info');
        for (var i = 0; i < catalogDetails.length; i++) {
            catalogDetails[i].style.display = 'none';
        }
        
        // Show the selected catalog item
        var selectedCatalog = document.getElementById(catalogId);
        if (selectedCatalog) {
            selectedCatalog.style.display = 'block';
            
            // Show the details for the selected catalog item
            var selectedCatalogDetails = document.getElementById(catalogId + '-details');
            if (selectedCatalogDetails) {
                selectedCatalogDetails.style.display = 'block';
            }
        }
    }
</script>


<?php include('PARTIALS/footer.php'); ?>