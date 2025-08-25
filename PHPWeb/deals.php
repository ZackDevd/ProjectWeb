<?php $pageTitle = "Deals & Offers - Avenue Hub"; ?>
<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

<!-- Deals Hero Section -->
<section class="deals-hero">
  <div class="deals-hero-overlay"></div>
  <div class="deals-hero-content">
    <h1>Exclusive Deals & Offers</h1>
    <p>Grab the best products at unbeatable prices. Limited time only!</p>
    <a href="shop.php" class="btn">Shop All Deals</a>
  </div>
</section>

<!-- Featured Deals Section -->
<section class="featured-deals">
  <h2 class="section-title">Featured Deals</h2>
  <div class="deals-grid">
    <!-- Deal Cards -->
    <?php
      $featuredDeals = [
        ["img"=>"https://via.placeholder.com/250x200","name"=>"Product 1","original"=>"150","discounted"=>"99"],
        ["img"=>"https://via.placeholder.com/250x200","name"=>"Product 2","original"=>"120","discounted"=>"85"],
        ["img"=>"https://via.placeholder.com/250x200","name"=>"Product 3","original"=>"200","discounted"=>"150"],
        ["img"=>"https://via.placeholder.com/250x200","name"=>"Product 4","original"=>"180","discounted"=>"130"]
      ];

      foreach($featuredDeals as $deal){
        echo '<div class="deal-card glass-card">
                <img src="'.$deal['img'].'" alt="'.$deal['name'].'">
                <h3>'.$deal['name'].'</h3>
                <p class="price"><span class="original">$'.$deal['original'].'</span> <span class="discounted">$'.$deal['discounted'].'</span></p>
                <a href="shop.php" class="btn">Shop Now</a>
              </div>';
      }
    ?>
  </div>
</section>

<!-- Limited-Time Offers Section -->
<section class="limited-offers">
  <h2 class="section-title">Limited-Time Offers</h2>
  <div class="offers-grid">
    <?php
      $limitedOffers = [
        ["img"=>"https://via.placeholder.com/250x200","name"=>"Offer 1","original"=>"90","discounted"=>"60"],
        ["img"=>"https://via.placeholder.com/250x200","name"=>"Offer 2","original"=>"110","discounted"=>"70"],
        ["img"=>"https://via.placeholder.com/250x200","name"=>"Offer 3","original"=>"200","discounted"=>"160"],
        ["img"=>"https://via.placeholder.com/250x200","name"=>"Offer 4","original"=>"140","discounted"=>"100"]
      ];

      foreach($limitedOffers as $offer){
        echo '<div class="deal-card glass-card">
                <img src="'.$offer['img'].'" alt="'.$offer['name'].'">
                <h3>'.$offer['name'].'</h3>
                <p class="price"><span class="original">$'.$offer['original'].'</span> <span class="discounted">$'.$offer['discounted'].'</span></p>
                <a href="shop.php" class="btn">Grab Now</a>
              </div>';
      }
    ?>
  </div>
</section>

<?php include 'include/footer.php'; ?>
