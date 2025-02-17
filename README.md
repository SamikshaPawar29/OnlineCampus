# Online Campus Recruitment System

## 📋 Project Overview
The Online Campus Management System is a web-based platform developed using HTML, CSS, JavaScript, PHP, and MySQL. It facilitates the management of student, faculty, and administrative activities within an educational institution.

## 🛠️ Technologies Used
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL (`campus.sql`)
- **Server:** XAMPP (Apache, MySQL, PHP)

## 🚀 How to Run the Project using XAMPP

### 1️⃣ Install XAMPP
- Download and install XAMPP based on your operating system.
- Open the XAMPP Control Panel and start **Apache** and **MySQL**.

### 2️⃣ Setup the Database
- Open [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/) in your browser.
- Click on **Databases** and create a new database named `campus`.
- Click **Import**, then **Browse** and select `campus.sql`.
- Click **Go** to import the database.

### 3️⃣ Configure Database Connection
- Open the `db_config.php` file in the project.
- Update the database credentials if needed:
  ```php
  <?php
  $host = "localhost";
  $user = "root"; // Default XAMPP user
  $password = ""; // Leave empty for XAMPP
  $database = "campus";

  $conn = new mysqli($host, $user, $password, $database);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  ?>


### 4️⃣ Place the Project in XAMPP
        Move the entire campus/ folder into C:\xampp\htdocs\.

### 5️⃣ Run the Project
        Open a browser and go to:

        http://localhost/campus/
        Use the login or register page to access the system.
        
### 🔑 Default Admin Credentials (if applicable)
        -Username: admin
        -Password: admin123
        
### 🎯 Features
    -✔️ User authentication (Login/Register)
    -✔️ Admin dashboard for managing users
    -✔️ Student profile management
    -✔️ Faculty and course management
    -✔️ Database-driven operations

### 📌 Additional Notes
If XAMPP is using a different port (e.g., 8080), update the URL:

http://localhost:8080/campus/
Make sure Apache and MySQL services are always running in XAMPP before accessing the project.
If any issue occurs, check the error logs in XAMPP or verify the database connection in db_config.php.
