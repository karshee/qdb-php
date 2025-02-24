# The Consumer Rights Association Website

A simple PHP-based authentication system with session management and basic security features.

## Overview

This project implements a basic website with user registration, login, and profile management functionality. It uses PHP's built-in session management and password hashing for security.

## Features

- User registration with email validation
- Secure password hashing using PHP's `password_hash()`
- Session-based authentication
- Protected profile page
- Responsive design
- Basic XSS protection
- Warning/error message system
- Logout functionality

## Quick Start

1. Clone the repository
2. Navigate to the project directory
3. Start the PHP development server:
   ```bash
   php -S localhost:8000
   ```
4. Visit `http://localhost:8000` in your browser

## File Structure

- `index.php` - Homepage
- `login.php` - User login
- `register.php` - New user registration
- `profile.php` - Protected user profile
- `contact.php` - Contact form
- `logout.php` - Session termination

## Current Security Features

- Session management for authentication
- Password hashing using PHP's secure `password_hash()` function
- Input sanitization for email addresses
- XSS protection using `htmlspecialchars()`
- Protected routes requiring authentication
- Form validation
- Secure password verification using `password_verify()`

## Security Limitations & Improvements Needed

### Critical Improvements
1. **Database Implementation**
   - Replace session storage with a proper database
   - Implement prepared statements for database queries

2. **Password Security**
   - Add password strength requirements
   - Implement password reset functionality
   - Add password confirmation field

3. **Session Security**
   - Implement session timeout
   - Add session fixation protection
   - Use secure session cookies

### Additional Security Enhancements
1. **HTTPS**
   - Force HTTPS connections
   - Implement HSTS
   - Secure cookie flags

2. **Authentication**
   - Add rate limiting for login attempts
   - Implement 2FA
   - Add CAPTCHA for registration/login

3. **Form Security**
   - Add CSRF tokens
   - Implement input validation on server side
   - Add request method validation

4. **Headers**
   - Add security headers (X-Frame-Options, CSP, etc.)
   - Configure proper CORS policies

5. **Error Handling**
   - Implement proper error logging
   - Hide detailed error messages from users
   - Add custom error pages


## Testing

To test the application:
1. Register a new account
2. Try logging in with correct/incorrect credentials
3. Access protected routes
4. Test form validations
5. Verify session management

## Requirements

- PHP 7.4 or higher
- Modern web browser
- JavaScript enabled (for some features)