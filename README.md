# SITC Project

A PHP web application with user authentication and contact functionality.

## Project Structure

```
├── assets/
│   ├── scripts.js
│   ├── styles.css
│   └── actions/
│       ├── get-profile.php
│       ├── login-handler.php
│       ├── register.php
│       └── submit-contact.php
├── config/
│   └── database.php
├── include/
│   ├── footer.php
│   ├── header.php
│   └── navbar.php
├── vendor/
├── .gitattributes
├── .gitignore
├── .htaccess
├── composer.json
├── composer.lock
├── index.php
├── login.php
├── logout.php
├── profile.php
└── register.php
```

## Features

- User Registration and Authentication
- User Profile Management
- Contact Form
- Font Awesome Integration

## Requirements

- PHP 7.4 or higher
- MySQL/MariaDB
- Composer
- XAMPP/Apache Server

## Installation

1. Clone the repository to your XAMPP's htdocs directory:

```bash
git clone [repository-url] sitc-assignment
```

2. Install dependencies using Composer:

```bash
composer install
```

3. Configure your database connection in `config/database.php`

4. Set up your web server (Apache) to point to the project directory

## Pages

- `index.php` - Home page
- `login.php` - User login
- `register.php` - New user registration
- `profile.php` - User profile management
- `contact.php` - Contact form
- `logout.php` - User logout

## Dependencies

- Font Awesome - Icon library
- PSR Container - PHP standard interface
- Symfony HTTP Client - HTTP client interface

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request
