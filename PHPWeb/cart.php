<?php $pageTitle = "Shopping Cart - Avenue Hub"; ?>
<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

<section class="cart-section">
  <div class="cart-container">

    <!-- Cart Items -->
    <div class="cart-items">
      <h2>Your Shopping Cart</h2>
      <table class="cart-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Example cart items (replace with session or DB data)
          $cartItems = [
            ["img"=>"product1.jpg", "name"=>"Product Name 1", "price"=>29.99, "qty"=>1],
            ["img"=>"product2.jpg", "name"=>"Product Name 2", "price"=>49.99, "qty"=>2],
          ];

          $subtotal = 0;
          foreach($cartItems as $item):
            $total = $item['price'] * $item['qty'];
            $subtotal += $total;
          ?>
          <tr>
            <td class="product-info">
              <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>">
              <span><?php echo $item['name']; ?></span>
            </td>
            <td>$<?php echo number_format($item['price'],2); ?></td>
            <td>
              <input type="number" value="<?php echo $item['qty']; ?>" min="1">
            </td>
            <td>$<?php echo number_format($total,2); ?></td>
            <td><button class="remove-btn"><i class="fa fa-trash"></i></button></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Cart Summary -->
    <div class="cart-summary">
      <h2>Order Summary</h2>
      <div class="summary-item">
        <span>Subtotal:</span>
        <span>$<?php echo number_format($subtotal,2); ?></span>
      </div>
      <?php $tax = $subtotal * 0.08; // 8% tax example ?>
      <div class="summary-item">
        <span>Tax:</span>
        <span>$<?php echo number_format($tax,2); ?></span>
      </div>
      <div class="summary-item total">
        <span>Total:</span>
        <span>$<?php echo number_format($subtotal + $tax,2); ?></span>
      </div>
      <button class="btn checkout-btn">Proceed to Checkout</button>
    </div>

  </div>
</section>

<?php include 'include/footer.php'; ?>
