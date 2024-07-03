# 📦 MySQL Database to Postman Collection Exporter

## 🎯 Overview

This PHP script connects to a MySQL database, retrieves table and column information, and generates a Postman collection with CRUD (Create, Read, Update, Delete) operations for each table. The collection is then saved as a JSON file and made available for download.

## 🚀 Features

- **🔗 Database Connection**: Connects to a MySQL database using PDO.
- **📊 Table Data Retrieval**: Fetches table names and column details from the specified database.
- **🛠️ Postman Collection Generation**: Creates a Postman collection JSON structure with CRUD operations for each table.
- **💾 File Export**: Saves the Postman collection as a JSON file.
- **⬇️ File Download**: Facilitates the download of the JSON file and removes it after download.

## 📋 Prerequisites

- PHP 7.3 or higher
- MySQL database
- Basic understanding of PHP and SQL

## 🛠️ Installation

1. **Clone the Repository**:
    ```bash
    git clone <repository_url>
    cd <repository_directory>
    ```

2. **Update Database Credentials**:
    Open the PHP script and modify the database connection parameters as needed:
    ```php
    $dsn = 'mysql:host=localhost;port=3306;dbname=ikonic';
    $username = 'root';
    $password = '';
    ```

## 📜 Usage

1. **Run the PHP Script**:
    Execute the PHP script in your web server or PHP CLI environment.
    ```bash
    php script_name.php
    ```

2. **Download the Postman Collection**:
    After running the script, the JSON file will be generated and automatically downloaded. The file is named after the database and has a `.json` extension.

## 🧩 Code Explanation

### 1. Database Connection

```php
$dsn = 'mysql:host=localhost;port=3306;dbname=ikonic';
$username = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}
