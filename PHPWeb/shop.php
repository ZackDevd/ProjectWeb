<?php $pageTitle = "Shop - Avenue Hub"; ?>
<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

<section class="shop-container">
  <!-- Sidebar Filters -->
  <aside class="filter-sidebar">
    <h3>Filter Products</h3>
    
    <div class="filter-group">
      <h4>Categories</h4>
      <label><input type="checkbox"> Electronics</label><br>
      <label><input type="checkbox"> Fashion</label><br>
      <label><input type="checkbox"> Home</label><br>
      <label><input type="checkbox"> Sports</label>
    </div>

    <div class="filter-group">
      <h4>Price</h4>
      <input type="range" min="0" max="1000" step="10">
    </div>

    <div class="filter-group">
      <h4>Brands</h4>
      <label><input type="checkbox"> Brand A</label><br>
      <label><input type="checkbox"> Brand B</label><br>
      <label><input type="checkbox"> Brand C</label>
    </div>
  </aside>

  <!-- Products Grid -->
  <div class="products-grid">
    <?php
      // Product array
      $products = [
        ["name"=>"Product 1","price"=>120,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 2","price"=>80,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 3","price"=>60,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 4","price"=>150,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 5","price"=>99,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 6","price"=>130,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 7","price"=>75,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 8","price"=>200,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 9","price"=>180,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 10","price"=>95,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 11","price"=>110,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 12","price"=>140,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 13","price"=>125,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 14","price"=>85,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 15","price"=>160,"img"=>"https://via.placeholder.com/250x200"],
        ["name"=>"Product 16","price"=>90,"img"=>"https://via.placeholder.com/250x200"]
      ];

      // Loop through products
      foreach($products as $product){
        echo '<div class="product-card">
                <img src="'.$product['img'].'" alt="'.$product['name'].'">
                <h4>'.$product['name'].'</h4>
                <p class="price">$'.$product['price'].'</p>
                <button class="btn">Add to Cart</button>
              </div>';
      }
    ?>
  </div>
</section>

<?php include 'include/footer.php'; ?>
