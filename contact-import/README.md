# Personbook Contact Importer

A secure web application that allows users to upload and validate phone number CSV files.

## Quick Start

1. Clone the repository
2. Navigate to the project directory
3. Start the PHP development server:
   ```bash
   php -S localhost:8000
   ```
4. Open your browser and navigate to:
   ```
   http://localhost:8000
   ```

## Features

### Contact Import
- Validates phone numbers in CSV format
- Supports format: ###-### (e.g., 123-456)
- Shows count of valid and invalid numbers
- ASCII file support (not UTF-8)
- Maximum file size: 5MB
- Maximum 1000 lines per file

### Security Features

1. **Rate Limiting**
   - 30 uploads per hour per session
   - Rolling window implementation
   - Clear user feedback on remaining uploads

2. **CSRF Protection**
   - Unique token per session
   - Token validation on each request

3. **File Upload Security**
   - Size limit (5MB)
   - MIME type validation (text/csv, text/plain)
   - Secure file handling
   - No file storage (memory processing only)

4. **Input Validation**
   - Strict phone number format validation
   - Empty line handling
   - Input trimming

5. **Security Headers**
   - X-Content-Type-Options: nosniff
   - X-Frame-Options: DENY
   - X-XSS-Protection: 1; mode=block

6. **Error Handling**
   - Disabled error display
   - Full error reporting (logged, not displayed)
   - User-friendly error messages

## Test Cases

The `test-csv` directory contains various test files:

1. `valid_numbers.csv`
   - All valid numbers
   - Expected result: 4 valid, 0 invalid

2. `invalid_numbers.csv`
   - All invalid formats
   - Expected result: 0 valid, 5 invalid

3. `mixed_numbers.csv`
   - Mix of valid and invalid numbers
   - Expected result: 2 valid, 4 invalid

4. `empty_lines.csv`
   - Valid numbers with empty lines
   - Expected result: 3 valid, 0 invalid

5. `malicious.csv`
   - Contains XSS and SQL injection attempts
   - Tests security measures
   - Expected result: 2 valid, 2 invalid

## Project Structure

```
personbook/
├── index.php              # Landing page
├── contact_import.php     # Contact import functionality
├── test-csv/             # Test files
│   ├── valid_numbers.csv
│   ├── invalid_numbers.csv
│   ├── mixed_numbers.csv
│   ├── empty_lines.csv
│   └── malicious.csv
└── README.md             # This file
```