# PKI Research Enhancement Module

## Description
This project is a research module (not a complete system) demonstrating how the PKI Rwanda platform can be enhanced to improve the registration and certificate application process.

## Requirements
- **XAMPP** (or a standalone installation of PHP 8.2+ and MySQL/MariaDB)
- **Composer** (Dependency Manager for PHP)
- **Git** (Version Control)
- **Visual Studio Code** (Preferred Editor)

## Installation & Setup (XAMPP - Windows & Linux)

### 1. Clone the Project & Open in VS Code
Open your terminal (Linux) or Command Prompt/PowerShell (Windows) and run:
```bash
git clone <repository-url>
cd pki-research
code . # Opens the project in Visual Studio Code
```

### 2. XAMPP Steps
1. Start the **XAMPP Control Panel**.
2. Click **Start** next to **Apache** and **MySQL**.
3. Go to `http://localhost/phpmyadmin` in your browser.
4. Create a new database named `pki_research`.

### 3. Application Setup
Run the following commands in the project root directory:

**Install Composer dependencies:**
```bash
composer install
```

**Environment File Setup:**
- Copy the example environment file:
  - **Linux**: `cp .env.example .env`
  - **Windows**: `copy .env.example .env`
- Open the `.env` file in a text editor and ensure these lines match your XAMPP settings:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pki_research
DB_USERNAME=root
DB_PASSWORD=
```

**Generate Application Key:**
```bash
php artisan key:generate
```

### 4. Database Migration & Seeding
This step creates the necessary tables and populates them with default data.

**Run all migrations and seeders at once:**
```bash
php artisan migrate --seed
```

**Or run specific seeders if needed:**
- **Admin User**: `php artisan db:seed --class=UserSeeder`
- **Certificate Durations**: `php artisan db:seed --class=CertificateExpirationSeeder`

### 5. Start the Application
```bash
php artisan serve
```
Visit `http://127.0.0.1:8000` in your web browser.

---

## Access & Testing

### Authorized Personnel Login
To access the dashboard and manage applications, click the **Authorized Personnel Login** button (top right under 'Application Status') or go to `/login`.

**Credentials:**
- **Email**: `m.jeanpiere@gmail.com`
- **Password**: `Password123`

### Key Research Features
- **Smart Registration**: The module detects if an entity (NID or TIN) is already registered. If so, it updates the information and shows a warning message instead of creating a duplicate.
- **Application Safeguards**: The module prevents applying for a new certificate if the current one is still valid, showing clear error feedback to the user.
