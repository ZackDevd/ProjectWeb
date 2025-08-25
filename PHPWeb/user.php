<?php $pageTitle = "User Account - Avenue Hub"; ?>
<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

<section class="user-section">
  <div class="user-container">

    <!-- Login / Register Tabs -->
    <div class="user-tabs">
      <button class="tab-btn" onclick="showTab('login')">Login</button>
      <button class="tab-btn" onclick="showTab('register')">Register</button>
    </div>

    <!-- Login Form -->
    <div id="login" class="tab-content">
      <?php
        $loginMsg = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $remember = isset($_POST['remember']); // Remember Me checkbox

            // Simple demo login validation (replace with DB check later)
            if ($email == "user@avenuehub.com" && $password == "password123") {
                $loginMsg = "<p class='success-msg'>Login successful!</p>";

                if ($remember) {
                    setcookie("remember_email", $email, time() + (86400 * 30), "/"); // 30 days
                } else {
                    setcookie("remember_email", "", time() - 3600, "/"); // Clear cookie
                }
            } else {
                $loginMsg = "<p class='error-msg'>Invalid email or password.</p>";
            }
        }

        $rememberedEmail = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : '';
      ?>
      <?php echo $loginMsg; ?>

      <form action="" method="POST">
        <h2>Login</h2>
        <div class="form-group">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" placeholder="Email" value="<?php echo $rememberedEmail; ?>" required>
        </div>
        <div class="form-group">
          <i class="fa fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-extra">
          <label><input type="checkbox" name="remember" <?php echo $rememberedEmail ? 'checked' : ''; ?>> Remember Me</label>
          <a href="forgetpass.php" class="forgot-pass">Forgot Password?</a>
        </div>

        <button type="submit" name="login" class="btn">Login</button>
      </form>
    </div>

    <!-- Register Form -->
    <div id="register" class="tab-content" style="display:none;">
      <?php
        $regMsg = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // Simple demo registration (replace with DB insert later)
            $regMsg = "<p class='success-msg'>Thank you, $name! Your account has been registered.</p>";
        }
      ?>
      <?php echo $regMsg; ?>

      <form action="" method="POST">
        <h2>Register</h2>
        <div class="form-group">
          <i class="fa fa-user"></i>
          <input type="text" name="name" placeholder="Full Name" required>
        </div>
        <div class="form-group">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <i class="fa fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="register" class="btn">Register</button>
      </form>
    </div>

  </div>
</section>

<script>
  function showTab(tabName) {
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.style.display = 'none');
    document.getElementById(tabName).style.display = 'block';
  }
</script>

<?php include 'include/footer.php'; ?>
