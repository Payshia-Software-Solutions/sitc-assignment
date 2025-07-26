<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <a href="#" class="nav-logo">
            <i class="fas fa-graduation-cap"></i> StudentHub
        </a>
        <ul class="nav-menu">
            <li><a href="./" class="nav-link <?= ($pageId == 1) ? 'active' : '' ?>" data-page="home">
                    <i class="fas fa-home"></i> Home</a></li>
            <li><a href="./register" class="nav-link <?= ($pageId == 2) ? 'active' : '' ?>" data-page="register">
                    <i class="fas fa-user-plus"></i> Register</a></li>
            <li><a href="./login" class="nav-link <?= ($pageId == 3) ? 'active' : '' ?>" data-page="login">
                    <i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li><a href="./profile" class="nav-link <?= ($pageId == 4) ? 'active' : '' ?>" data-page="profile">
                    <i class="fas fa-user"></i> Profile</a></li>
            <li><a href="./contact" class="nav-link <?= ($pageId == 5) ? 'active' : '' ?>" data-page="contact">
                    <i class="fas fa-envelope"></i> Contact</a></li>
            <li>
                <button class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <span class="theme-text">Light</span>
                    <i class="fas fa-moon theme-icon moon" style="display: none;"></i>
                </button>
            </li>
        </ul>
        <div class="nav-toggle" onclick="document.querySelector('.nav-menu').classList.toggle('active');">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>