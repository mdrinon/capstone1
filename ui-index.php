<?php include('PARTIALS/header.php'); ?>

<section class="carousel-section">
  <div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./partials/images/2.png" alt="Image 1">
        <div class="carousel-caption">
          <a href="ui-about.php" class="btn btn-primary btn-shop">Learn More</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./partials/images/3.png" alt="Image 2">
        <div class="carousel-caption">
          <a href="ui-about.php" class="btn btn-primary btn-shop">Learn More</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./partials/images/1.png" alt="Image 3">
        <div class="carousel-caption">
          <a href="ui-about.php" class="btn btn-primary btn-shop">Learn More</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./partials/images/4.png" alt="Image 4">
        <div class="carousel-caption">
          <a href="ui-about.php" class="btn btn-primary btn-shop">Learn More</a>
        </div>
      </div>
    </div>
  </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <br>

  <div class="row">
    <div class="col-md-4">
      <img src="./partials/images/1.1.png" alt="Image 1">
    </div>
    <div class="col-md-4">
      <img src="./partials/images/1.2.png" alt="Image 2">
    </div>
    <div class="col-md-4">
      <img src="./partials/images/1.3.png" alt="Image 3">
    </div>
  </div>
</section>

    <h4 style="text-align: center;">Featured Products</h4><br><br>

    <section style="margin: 0 200px;">
        <!-- featured products in gallery format consisting of 4 products per row -->
        <div class="row">
          <div class="col-md-3">
            <div class="featured-product">
              <img src="./partials/images/fp1.png" alt="Product 1">
              <div class="product-description text-center">
                <h5 class="fp-name">Product 1</h5>
                <p class="fp-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="fp-price">Price: $19.99</p>
                <div class="product-ratings">
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="featured-product">
              <img src="./partials/images/fp2.png" alt="Product 2">
              <div class="product-description text-center">
                <h5 class="fp-name">Product 2</h5>
                <p class="fp-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="fp-price">Price: $24.99</p>
                <div class="product-ratings">
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="featured-product">
              <img src="./partials/images/fp3.png" alt="Product 3">
              <div class="product-description text-center">
                <h5 class="fp-name">Product 3</h5>
                <p class="fp-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="fp-price">Price: $29.99</p>
                <div class="product-ratings">
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="featured-product">
              <img src="./partials/images/fp4.png" alt="Product 4">
                <div class="product-description text-center">
                <h5 class="fp-name">Product 4</h5>
                <p class="fp-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="fp-price">Price: $34.99</p>
                <div class="product-ratings">
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                  <span class="star"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <br>
          <div>
            <p class="see-more"><a href="ui-shop.php">See more..</a></p>
          </div>
    </section>

    <br><br><br><br><br>


  <?php include('PARTIALS/footer.php'); ?>
