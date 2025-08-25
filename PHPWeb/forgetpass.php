<?php $pageTitle = "Forgot Password - Avenue Hub"; ?>
<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

<section class="auth-section">
  <div class="auth-card">
    <h2>Forgot Password?</h2>
    <p style="color: #ddd; margin-bottom: 20px; font-size: 14px;">
      Enter your registered email address, and we’ll send you a link to reset your password.
    </p>

    <form action="#" method="POST" class="form active">
      <div class="form-group">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <button type="submit" class="btn">Send Reset Link</button>
    </form>

    <!-- Back to Login -->
    <div style="margin-top: 20px; font-size: 14px;">
      <a href="user.php" style="color: #3a6ea5; text-decoration: none;">← Back to Login</a>
    </div>
  </div>
</section>

<?php include 'include/footer.php'; ?>
