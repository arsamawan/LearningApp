# PHP CRUD API for Student Management

This repository contains a PHP script that implements a basic API for managing student data using a MySQL database. The script supports creating, reading, updating, and deleting (CRUD) student records, with JSON responses for each API request.

## Features

- **GET Requests**: Fetch all student records or a specific student record by ID.
- **JSON Responses**: All API responses are returned in JSON format for easy integration with client-side applications.
- **Basic MySQL Integration**: Uses `mysqli` for database operations.

> Note: POST, PUT, and DELETE methods are commented out in the provided code and can be enabled as needed.

## Requirements

- PHP 7.4+
- MySQL 5.7+
- A web server like Apache or Nginx

## Setup Instructions

1. **Clone the Repository**  
   ```bash
   git clone https://github.com/your-username/student-management-api.git
   cd student-management-api
   ```

2. **Set Up the Database**  
   Create a MySQL database named `sob` and a table named `studentss` with the following structure:  
   ```sql
   CREATE TABLE studentss (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100),
       address VARCHAR(255),
       phone VARCHAR(15)
   );
   ```

3. **Configure the Database Connection**  
   Update the database connection details in the PHP script if necessary:  
   ```php
   $conn = new mysqli('localhost', 'root', '', 'sob');
   ```

4. **Run the Script**  
   Deploy the PHP script on a local or live server and access it via the endpoint (e.g., `http://localhost/your-script.php`).

## API Endpoints

### 1. **Fetch All Students**  
   **GET** `/your-script.php`  
   Response:  
   ```json
   [
       {
           "id": 1,
           "name": "John Doe",
           "address": "123 Main St",
           "phone": "1234567890"
       },
       ...
   ]
   ```

### 2. **Fetch Student by ID**  
   **GET** `/your-script.php?id={id}`  
   Response:  
   ```json
   {
       "id": 1,
       "name": "John Doe",
       "address": "123 Main St",
       "phone": "1234567890"
   }
   ```

### Additional (Commented-Out) Features:  
   - **POST**: Add a new student.  
   - **PUT**: Update an existing student record by ID.  
   - **DELETE**: Remove a student record by ID.  

   Uncomment the relevant sections in the script to enable these features.

## Notes

- Ensure `headers.php` is properly configured for setting response headers like `Content-Type: application/json` and handling CORS.
- This script is for educational purposes and lacks advanced security measures (e.g., input validation, authentication).
