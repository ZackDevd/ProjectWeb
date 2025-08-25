document.addEventListener("DOMContentLoaded", () => {
  // ======= SMOOTH SCROLLING =======
  document.querySelectorAll('a[href^="#"], .nav-links a').forEach(link => {
    link.addEventListener("click", e => {
      e.preventDefault();
      const target = document.querySelector(link.getAttribute("href")) || document.body;
      target.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  // ======= SCROLL-TRIGGERED FADE-IN =======
  const faders = document.querySelectorAll(
    ".hero, .about, .about-section, .deals-hero, .deal-card, .featured-deals, .limited-offers, .product-card, .shop-container, .contact-section, .contact-container"
  );
  const appearOptions = { threshold: 0.2, rootMargin: "0px 0px -50px 0px" };
  const appearOnScroll = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
  if (!entry.isIntersecting) return;
  entry.target.classList.add("appear"); // <-- add "appear" class
  observer.unobserve(entry.target);
});

  }, appearOptions);
  faders.forEach(fader => appearOnScroll.observe(fader));

  // ======= NAVBAR SHADOW ON SCROLL =======
  const navbar = document.querySelector(".navbar");
  window.addEventListener("scroll", () => {
    navbar.classList.toggle("shadow", window.scrollY > 50);
  });

  // ======= HIGHLIGHT ACTIVE NAV LINK =======
  const sections = document.querySelectorAll(
    "section, .about-section, .deals-hero, .featured-deals, .limited-offers, .shop-container, .contact-section"
  );
  const navLinks = document.querySelectorAll(".nav-links a");
  window.addEventListener("scroll", () => {
    let current = "";
    sections.forEach(section => {
      if (pageYOffset >= section.offsetTop - 100) {
        current = section.getAttribute("class").split(" ")[0];
      }
    });
    navLinks.forEach(link => {
      link.classList.toggle("active-link", link.getAttribute("href").includes(current));
    });
  });

  // ======= USER LOGIN / REGISTER TOGGLE =======
  const loginToggle = document.getElementById("login-toggle");
  const registerToggle = document.getElementById("register-toggle");
  const loginForm = document.getElementById("login-form");
  const registerForm = document.getElementById("register-form");

  if (loginToggle && registerToggle) {
    loginToggle.addEventListener("click", () => {
      loginToggle.classList.add("active");
      registerToggle.classList.remove("active");
      loginForm.classList.add("active");
      registerForm.classList.remove("active");
    });
    registerToggle.addEventListener("click", () => {
      registerToggle.classList.add("active");
      loginToggle.classList.remove("active");
      registerForm.classList.add("active");
      loginForm.classList.remove("active");
    });
  }

  // ======= REGISTER =======
  if (registerForm) {
    registerForm.addEventListener("submit", e => {
      e.preventDefault();
      const name = registerForm.querySelector('input[name="name"]').value;
      const email = registerForm.querySelector('input[name="email"]').value;
      const password = registerForm.querySelectorAll('input[name="password"]')[0].value;
      let users = JSON.parse(localStorage.getItem("users")) || [];
      if (users.some(u => u.email === email)) return alert("Email already registered.");
      users.push({ name, email, password });
      localStorage.setItem("users", JSON.stringify(users));
      alert("Registration successful! Please login.");
      registerToggle.classList.remove("active");
      loginToggle.classList.add("active");
      registerForm.classList.remove("active");
      loginForm.classList.add("active");
    });
  }

  // ======= LOGIN =======
  if (loginForm) {
    loginForm.addEventListener("submit", e => {
      e.preventDefault();
      const email = loginForm.querySelector('input[name="email"]').value;
      const password = loginForm.querySelector('input[name="password"]').value;
      const users = JSON.parse(localStorage.getItem("users")) || [];
      const user = users.find(u => u.email === email && u.password === password);
      if (user) {
        alert(`Welcome back, ${user.name}!`);
        loginForm.reset();
      } else {
        alert("Invalid email or password.");
      }
    });
  }

  // ======= FORGOT PASSWORD =======
  const forgotForm = document.querySelector(".auth-section .form");
  if (forgotForm) {
    forgotForm.addEventListener("submit", e => {
      e.preventDefault();
      const emailInput = forgotForm.querySelector('input[name="email"]').value;
      const users = JSON.parse(localStorage.getItem("users")) || [];
      const user = users.find(u => u.email === emailInput);
      if (user) {
        alert(`Password reset link sent to ${emailInput}! (Simulated)`);
        forgotForm.reset();
      } else {
        alert("Email not found. Please register first.");
      }
    });
  }

  // ======= CONTACT FORM =======
  const contactForm = document.querySelector(".contact-form form");
  if (contactForm) {
    contactForm.addEventListener("submit", e => {
      e.preventDefault();
      const name = contactForm.querySelector('input[name="name"]').value;
      const email = contactForm.querySelector('input[name="email"]').value;
      const message = contactForm.querySelector('textarea[name="message"]').value;
      if (name && email && message) {
        alert(`Thank you, ${name}! Your message has been sent successfully.`);
        contactForm.reset();
      } else {
        alert("Please fill in all fields before submitting.");
      }
    });
  }

  // ======= ADD TO CART =======
  const addToCartBtns = document.querySelectorAll(".product-card .btn, .deal-card .btn");
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  addToCartBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      const card = btn.closest(".product-card, .deal-card");
      const name = card.querySelector("h3, h4").innerText;
      const price = card.querySelector(".price").innerText;
      cart.push({ name, price });
      localStorage.setItem("cart", JSON.stringify(cart));
      alert(`${name} added to cart! Total items: ${cart.length}`);
    });
  });

  // ======= CART PAGE FUNCTIONALITY =======
  const cartTable = document.querySelector(".cart-table tbody");
  const subtotalEl = document.querySelector(".cart-summary .summary-item:nth-child(1) span:last-child");
  const taxEl = document.querySelector(".cart-summary .summary-item:nth-child(2) span:last-child");
  const totalEl = document.querySelector(".cart-summary .total span:last-child");

  function updateCartTotals() {
    if (!cartTable) return;
    let subtotal = 0;
    cartTable.querySelectorAll("tr").forEach(row => {
      const price = parseFloat(row.children[1].textContent.replace("$", ""));
      const quantity = parseInt(row.querySelector('input[type="number"]').value);
      const total = price * quantity;
      row.children[3].textContent = "$" + total.toFixed(2);
      subtotal += total;
    });
    subtotalEl.textContent = "$" + subtotal.toFixed(2);
    const tax = subtotal * 0.08;
    taxEl.textContent = "$" + tax.toFixed(2);
    totalEl.textContent = "$" + (subtotal + tax).toFixed(2);
  }

  if (cartTable) {
    updateCartTotals();
    cartTable.querySelectorAll('input[type="number"]').forEach(input => {
      input.addEventListener("change", () => {
        if (input.value < 1) input.value = 1;
        updateCartTotals();
      });
    });
    cartTable.querySelectorAll(".remove-btn").forEach(btn => {
      btn.addEventListener("click", e => {
        e.target.closest("tr").remove();
        updateCartTotals();
      });
    });
  }

});
