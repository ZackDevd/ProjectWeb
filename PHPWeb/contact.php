<?php $pageTitle = "Contact Us - Avenue Hub"; ?>
<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

<section class="contact-section">
  <div class="contact-container">
    <!-- Contact Info -->
    <div class="contact-info">
      <h2>Contact Us</h2>
      <p>Have questions, feedback, or need support? Reach out to us and we’ll respond promptly.</p>
      <div class="info-item">
        <i class="fa-solid fa-phone"></i>
        <span>+91 123 456 7890</span>
      </div>
      <div class="info-item">
        <i class="fa-solid fa-envelope"></i>
        <span>support@avenuehub.com</span>
      </div>
      <div class="info-item">
        <i class="fa-solid fa-location-dot"></i>
        <span>123 Avenue Street, City, Country</span>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
      <?php
        $msg = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Simple email send (for demo, update with proper email)
            $to = "support@avenuehub.com";
            $subject = "New Contact Message from $name";
            $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
            $headers = "From: $email";

            if (mail($to, $subject, $body, $headers)) {
                $msg = "<p class='success-msg'>Message sent successfully!</p>";
            } else {
                $msg = "<p class='error-msg'>Failed to send message. Try again later.</p>";
            }
        }
      ?>

      <?php echo $msg; ?>

      <form action="" method="POST">
        <h2>Send a Message</h2>
        <div class="form-group">
          <i class="fa fa-user"></i>
          <input type="text" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
          <i class="fa fa-pencil-alt"></i>
          <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit" class="btn">Send Message</button>
      </form>
    </div>
  </div>
</section>

<?php include 'include/footer.php'; ?>
