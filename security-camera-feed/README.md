# Security Camera Feed Interface

A simple web interface for viewing security camera feeds with basic security features implemented using HTML and CSS.

## Overview

This project provides a clean interface for viewing multiple security camera feeds simultaneously. It includes both public and private feed sections with basic client-side security measures.

## Getting Started

### Prerequisites
- Python 3.x
- A modern web browser
- Security camera GIFs in the `security-feed-gifs/` directory

### Running the Project

1. Clone or download this repository
2. Navigate to the project directory in your terminal
3. Run the Python HTTP server:
```bash
python3 -m http.server 8000
```
4. Open your web browser and visit:
```
http://localhost:8000
```

### Project Structure
```
project/
├── index.html
├── styles.css
└── security-feed-gifs/
    ├── viewcamera.gif
    ├── viewcamera-1.gif
    ├── viewcamera-2.gif
    ├── viewcamera-3.gif
    ├── viewcamera-4.gif
    └── viewcamera-5.gif
```

## Security Features

### HTML Security Headers
- Content Security Policy (CSP) to restrict resource loading
- X-Content-Type-Options to prevent MIME-type sniffing
- X-Frame-Options to prevent clickjacking attacks
- No-referrer policy to prevent information leakage

### CSS Security Measures
- Disabled text selection on sensitive content
- Prevented image dragging and downloading
- Added "PROTECTED" watermark to all camera feeds
- Visual security pattern for private section
- Pointer-events disabled on images
- User-select disabled on camera feeds

### Additional Security Notes
This implementation includes basic client-side security measures. For a production environment, you should also implement:
- User authentication
- HTTPS
- Server-side validation
- Access control
- Rate limiting
- Secure video streaming

## Browser Compatibility
- Chrome (recommended)
- Firefox
- Safari
- Edge