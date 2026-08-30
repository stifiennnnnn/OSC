# AD-Meals

AD-Meals is a web-based school canteen pre-ordering system designed to make the process of ordering food and drinks faster and more convenient for students.

Students can browse available menu items, place orders before break time, and collect their orders once they are ready. The system is designed to reduce waiting times and improve the overall canteen experience.

## Features

- Student food and drink pre-ordering
- Menu availability display
- Order management
- Order receipt through email
- Responsive web interface
- School canteen focused ordering workflow

## Technologies

This project is built using:

- PHP 8.2
- MySQL
- MySQLi
- HTML5
- CSS3
- JavaScript

The project was developed and tested locally using XAMPP.

## Requirements

Before running the project, make sure you have the following installed:

- XAMPP
- PHP 8.2
- MySQL
- A web browser

XAMPP is recommended because it provides Apache and MySQL in one local development environment.

## Installation

### 1. Copy the Project

Place the project inside the XAMPP `htdocs` directory.

For example:

C:\xampp\htdocs\OSC

The project structure should look similar to:

OSC/
├── assets/
├── includes/
├── views/
├── db.sql
└── index.php

### 2. Start XAMPP

Open the XAMPP Control Panel and start:

- Apache
- MySQL

Make sure both services are running before accessing the application.

### 3. Import the Database

Open phpMyAdmin:

http://localhost/phpmyadmin

Create the database required by the project.

Then import the provided `db.sql` file.

Steps:

1. Open phpMyAdmin.
2. Create or select the project database.
3. Open the Import tab.
4. Select `db.sql`.
5. Click Import or Go.
6. Verify that the required tables have been created successfully.

### 4. Configure the Database

Locate the project's database configuration file and update the database credentials if necessary.

A typical local XAMPP configuration is:

Host: localhost
Username: root
Password:
Database: your_database_name

The default XAMPP MySQL installation commonly uses `root` with an empty password, but this may vary depending on your local configuration.

Make sure the database name matches the database where you imported `db.sql`.

### 5. Run the Project

Once Apache and MySQL are running and the database has been imported, open the project in your browser.

Example:

http://localhost/OSC/

If your project is located in a different folder, replace `OSC` with the appropriate directory name.

## Project Structure

A simplified structure of the project is:

OSC/
├── assets/
│   ├── css/
│   ├── js/
│   └── logo/
│
├── includes/
│   ├── head.php
│   ├── header.php
│   └── footer.php
│
├── views/
│   ├── home/
│   ├── login/
│   └── ...
│
├── db.sql
└── index.php

## Database

The project uses MySQL through PHP's MySQLi extension.

The database schema is provided in:

db.sql

Always import `db.sql` into your local MySQL database before running the application.

## Development Environment

The project was developed and tested using:

Operating System: Windows
Web Server: Apache
Environment: XAMPP
PHP: 8.2
Database: MySQL
Database Driver: MySQLi

## Troubleshooting

### Apache Does Not Start

Make sure another application is not using Apache's required ports, particularly port 80 or 443.

You can change the Apache port through the XAMPP configuration if necessary.

### MySQL Does Not Start

Make sure another MySQL or MariaDB service is not already using the configured MySQL port.

### Database Connection Error

Check the following:

- MySQL is running in XAMPP.
- The database exists.
- `db.sql` has been imported.
- The database name is correct.
- The MySQL username and password are correct.
- The database host is correct.

For a typical local XAMPP setup, the host is:

localhost

## Important Notes

- This project is intended to run in a local XAMPP environment.
- PHP 8.2 is the target PHP version.
- MySQLi is used for database communication.
- `db.sql` must be imported before using the application.
- Make sure Apache and MySQL are running before accessing the application.

## License

This project is intended for educational and development purposes.