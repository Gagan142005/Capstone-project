# GlobenTech - Laboratory Order Management System
**CPSY 301-D School Project Prototype**

This is a Phase 3 prototype for a Laboratory Order Management System designed to streamline the ordering, processing, and delivery of chemical compounds for GMJ Global Energy. This prototype demonstrates the login system, account management, and basic class structure as outlined in the project design document.

**Note:** This is a school project prototype created for educational purposes. It demonstrates core functionality including user authentication, role-based access control, and basic order management features.

## Technologies Used

- **HTML5/CSS3**: Structure and styling
- **JavaScript**: Client-side interactivity
- **PHP**: Server-side processing
- **MySQL**: Database for user accounts and system data

## Features (Prototype)

- User login and authentication system
- Account registration with role assignment
- Role-based access control (Customer, Laboratory Technician, Administrator)
- Basic dashboard layout
- Object-oriented class structure with properties and method signatures

## Installation Instructions

### Step 1: Install PHP

1. Download the latest version of PHP from [https://windows.php.net/download](https://windows.php.net/download).
2. Choose the "Non Thread Safe" `.zip` version for your system (x64 or x86).
3. Extract the contents to a folder, for example: `C:\php`
4. Add `C:\php` to your system's `PATH` environment variable:
   - Open Start menu## Installation

### Step 1: Install XAMPP

1. Download XAMPP from [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html). Download version 8.2.12 or higher
2. Install XAMPP (default location: `C:\xampp`)
3. Open XAMPP Control Panel and start Apache and MySQL
4. Add PHP to your system PATH:
   - Open Start menu and search for "Environment Variables"
   - Edit the `Path` variable and add `C:\xampp\php`
5. Open Command Prompt and run `php -v` to verify PHP is installed

### Step 2: Install Composer

1. Download and install Composer from [https://getcomposer.org/](https://getcomposer.org/)
2. During installation, make sure it detects your `php.exe` from `C:\xampp\php`
3. Restart your computer to finish installing Composer
4. Open Command Prompt and run `composer -V` to verify Composer is installed

### Step 3: Set Up the Project

1. Place the project files directly in XAMPP's `htdocs` directory: `C:\xampp\htdocs\project-phase-3`
   - The folder name will become part of your URL (e.g., folder `project-phase-3` → URL `localhost/project-phase-3`)
   - Avoid spaces in the folder name
2. Open Command Prompt and navigate to that directory:

```bash
cd C:\xampp\htdocs\project-phase-3
```

3. Run the following command to install PHP dependencies:

```bash
composer install
```

This will download all required dependencies into the `vendor/` folder.

### Step 4: Set Up the Database

You need to create a MySQL database and import the schema.

**What is phpMyAdmin?** phpMyAdmin is a web-based tool that comes with XAMPP/WAMP/MAMP that lets you manage MySQL databases through a visual interface.

1. **Open phpMyAdmin**:
   - Open your web browser
   - Go to: `http://localhost/phpmyadmin`
   - You should see the phpMyAdmin interface

2. **Create the Database**:
   - Click on **"New"** in the top Left
   - In the "Create database" section, type: `sales_tracker`
   - Click **"Create"**

3. **Import the Schema**:
   - Click on the **"sales_tracker"** database name in the left sidebar (it should now appear in the list)
   - Click on the **"Import"** tab at the top
   - Click **"Choose File"** button
   - Navigate to your sales-tracker-website folder and select: `mysql_schema.sql`
   - Scroll down and click **"Import"** button at the bottom
   - You should see a success message and 7 tables created

4. **Verify the Import**:
   - Click on the **"Structure"** tab
   - You should see all the tables

## Running Locally

1. Open XAMPP Control Panel and start Apache and MySQL
2. Navigate to `http://localhost/project-phase-3` in your browser (adjust the folder name if different)
3. The website should now be running locally

## Default Credentials

For testing purposes, the following accounts are pre-configured:

**Administrator:**
- Email: `admin@globentech.com`
- Password: `admin123`

**Laboratory Technician:**
- Email: `tech@globentech.com`
- Password: `tech123`

**Customer:**
- Email: `customer@globentech.com`
- Password: `customer123`

## Project Structure

```
GlobenTech/
├── index.php                 # Entry point / Login page
├── register.php              # Account registration
├── dashboard.php             # Role-based dashboard
├── logout.php                # Logout handler
├── config/
│   └── database.php          # Database configuration
├── classes/                  # Object-oriented class files
│   ├── User.php
│   ├── Order.php
│   ├── Sample.php
│   ├── Equipment.php
│   └── Queue.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── functions.php
├── css/
│   └── style.css
├── js/
│   └── main.js
├── database/
│   └── schema.sql            # Database schema
└── vendor/                   # Composer dependencies (gitignored)
```

## Class Structure (Prototype)

This prototype includes the following classes with properties and empty method signatures:

- **User**: Handles user accounts, authentication, and role management
- **Order**: Manages chemical compound orders and status tracking
- **Sample**: Represents individual samples for testing
- **Equipment**: Tracks laboratory equipment specifications and schedules
- **Queue**: Manages order queue and priority processing

## License

This is a school project created for educational purposes. All rights reserved.
