// Theme management
function toggleTheme() {
  const currentTheme =
    document.documentElement.getAttribute("data-theme") || "light";
  const newTheme = currentTheme === "dark" ? "light" : "dark";

  document.documentElement.setAttribute("data-theme", newTheme);
  localStorage.setItem("theme", newTheme); // Save preference

  // Update toggle button icons and text
  const sunIcon = document.querySelector(".theme-icon.sun");
  const moonIcon = document.querySelector(".theme-icon.moon");
  const themeText = document.querySelector(".theme-text");

  if (newTheme === "dark") {
    sunIcon.style.display = "none";
    moonIcon.style.display = "inline";
    themeText.textContent = "Dark";
  } else {
    sunIcon.style.display = "inline";
    moonIcon.style.display = "none";
    themeText.textContent = "Light";
  }
}

// Initialize theme on page load
function initializeTheme() {
  // Check if user has a theme preference, otherwise default to light
  const theme = "light"; // Default to light mode
  document.documentElement.setAttribute("data-theme", theme);

  const sunIcon = document.querySelector(".theme-icon.sun");
  const moonIcon = document.querySelector(".theme-icon.moon");
  const themeText = document.querySelector(".theme-text");

  if (theme === "dark") {
    sunIcon.style.display = "none";
    moonIcon.style.display = "inline";
    themeText.textContent = "Dark";
  } else {
    sunIcon.style.display = "inline";
    moonIcon.style.display = "none";
    themeText.textContent = "Light";
  }
}

// Password toggle functionality
function togglePassword(inputId) {
  const input = document.getElementById(inputId);
  const button = input.nextElementSibling;

  if (input.type === "password") {
    input.type = "text";
    button.textContent = "🙈";
  } else {
    input.type = "password";
    button.textContent = "👁";
  }
}

function CreateAccount() {
  const fullName = document.getElementById("fullName").value.trim();
  const email = document.getElementById("email").value.trim();
  const studentId = document.getElementById("studentId").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;

  // Validate passwords match
  if (password !== confirmPassword) {
    alert("Passwords do not match!");
    return;
  }

  const formData = new FormData();
  formData.append("fullName", fullName);
  formData.append("email", email);
  formData.append("studentId", studentId);
  formData.append("password", password);

  // Send via AJAX to register.php
  fetch("./assets/actions/register.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        alert("Registration successful!");
        // Optionally redirect or clear form
        document.getElementById("registerForm").reset();
      } else {
        alert("Error: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Something went wrong. Please try again.");
    });
}

function CreateContact() {
  const name = document.getElementById("contactName").value.trim();
  const email = document.getElementById("contactEmail").value.trim();
  const subject = document.getElementById("subject").value.trim();
  const message = document.getElementById("message").value.trim();

  if (!name || !email || !subject || !message) {
    alert("All fields are required.");
    return;
  }

  const formData = new FormData();
  formData.append("name", name);
  formData.append("email", email);
  formData.append("subject", subject);
  formData.append("message", message);

  // Send via AJAX to submit-contact.php
  fetch("./assets/actions/submit-contact.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        alert("Message sent successfully!");
        document.getElementById("contactForm").reset();
      } else {
        alert("Error: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Something went wrong. Please try again.");
    });
}
// Initialize theme when page loads
document.addEventListener("DOMContentLoaded", initializeTheme);
