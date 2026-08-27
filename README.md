# CCL Ke Lal · CCL Ki Laadli Portal

A web application designed as a student registration and portal system for the flagship CSR (Corporate Social Responsibility) initiative **"CCL Ke Lal & CCL Ki Laadli"** by **Central Coalfields Limited (a subsidiary of Coal India Limited)**. 

Since 2012, this scheme has provided free coaching, boarding, lodging, and academic support to meritorious students from Jharkhand preparing for IIT-JEE and other prestigious engineering entrance exams.

---

## 🚀 Features

- **Responsive Landing Page**: Clean, modern landing page with a hero carousel, interactive statistics counters, leadership details (Chairman's Desk), and scheme introduction.
- **Detailed Information Portals**: Dedicated sections describing the Central Coalfields Limited company, details about the scholarship scheme, and the campus/school facilities.
- **Student Registration (`form1.php`)**: A detailed registration form for students to apply for the coaching scheme, capturing personal, family, education, and category details.
- **Student Login & Dashboard (`form2.php` & `dashboard.php`)**: Authentication mechanism allowing registered students to log in to their student portal.
- **Online Quiz Engine (`Quiz1.php` & `Quiz2.php`)**: Built-in test interface enabling students to take assessment tests and submit scores directly to the database.

---

## 🛠️ Tech Stack

- **Frontend**: HTML5, CSS3 (Custom animations, variables, and responsive layout), JavaScript (Carousel, scroll animations, dynamic counters)
- **Backend**: PHP
- **Database**: MySQL

---

## 📂 Project Directory Structure

```text
├── Home/                              # Main application codebase
│   ├── index.html                     # Portal landing page
│   ├── aboutccl.html                  # About Central Coalfields Limited page
│   ├── aboutscheme.html               # Information about the coaching scheme
│   ├── aboutschool.html               # About the school & hostel facilities
│   ├── contact.html                   # Contact information & support
│   ├── form1.php                      # Student registration form page
│   ├── form2.php                      # Student login page
│   ├── dashboard.php                  # Logged-in student dashboard
│   ├── Quiz1.php / Quiz2.php          # Online assessment portals
│   ├── connection1.php                # Database connection helper
│   ├── database_setup.sql             # SQL script to initialize schema
│   ├── style.css                      # Global and component styles
│   └── [assets]                       # Logo images, icons, and site graphics
│
├── internship_report.pdf / .docx      # Comprehensive internship report and project documentation
├── internship_report.big_image.png    # Copy of the Internship Completion Certificate
└── README.md                          # Project documentation
```

---

## ⚙️ Setup & Installation

Follow these steps to run the project locally on a WAMP, MAMP, or XAMPP stack:

### Prerequisite
Ensure you have **XAMPP** or a similar PHP + MySQL local server environment installed.

### 1. Database Setup
1. Start **Apache** and **MySQL** services in your XAMPP Control Panel.
2. Open your web browser and go to `http://localhost/phpmyadmin`.
3. Create a new database named `registrationform`.
4. Select the `registrationform` database, go to the **Import** tab, choose the file [database_setup.sql](file:///c:/Users/HP/OneDrive/Desktop/CCL-Internship-Project-main/Home/database_setup.sql), and click **Go**.
   - This creates the `form1` table (for registrations) and the `result` table (for test logs).

### 2. File Placement
1. Clone or download this project.
2. Copy the entire project directory (`CCL-Internship-Project-main`) into your server's web root directory:
   - For XAMPP: `C:\xampp\htdocs\CCL-Internship-Project-main`

### 3. Connection Verification
Verify the configuration in [connection1.php](file:///c:/Users/HP/OneDrive/Desktop/CCL-Internship-Project-main/Home/connection1.php):
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registrationform";
```

### 4. Running the Web Application
Open your browser and navigate to:
```text
http://localhost/CCL-Internship-Project-main/Home/index.html
```