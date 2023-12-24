# Laravel Banking Application
The Laravel Banking Application is a small-scale web application developed using the Laravel PHP framework. The primary objective of this application is to provide users with basic banking functionalities in a secure and user-friendly environment.

## Contents Of This Readme

1. [Key Features](https://github.com/fawwash/abc_banking#key-features)
2. [Technologies Used](https://github.com/fawwash/abc_banking#technologies-used)
3. [How to Run](https://github.com/fawwash/abc_banking#how-to-run)
4. [Access the Application](https://github.com/fawwash/abc_banking#access-the-application)

## Key Features:

## Registration:
Users can create new accounts by providing a unique email address and password.

## Login:
Registered users can securely log in to their accounts.

## Inbox/Home:
Users can view their account information upon logging in.

## Cash Deposit:
Users can deposit funds into their accounts, updating the account balance accordingly.

## Cash Withdrawal:
Users can withdraw funds from their accounts, with appropriate balance verification.

## Cash Transfer:
Users can transfer funds from their accounts to another user's account using the recipient's email address.

## Account Statement:
Users can view a statement of their recent transactions, including details such as date, amount, transaction type, and account balance.

## Logout:
Users can securely log out of their accounts.

## Technologies Used:

## Laravel Framework:
Utilized for rapid development, following MVC architecture.
## PHP:
Server-side scripting language for the backend logic.
## MySQL:
Database management system for storing user data and transaction records.

## How to Run:
1. **Create Database in phpMyAdmin:**
   - Open phpMyAdmin in your web browser.
   - Create a new database called 'abc_banking'
   - run migration command 'php artisan migrate'
  
2. **Install Dependencies:**
    - composer install
  
3. **Configure Environment:**
    - Copy the .env.example file to .env and configure the database connection:
    <pre>
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=abc_banking
        DB_USERNAME=your_database_username
        DB_PASSWORD=your_database_password
    </pre>
    - Replace your_database_username and your_database_password with your actual MySQL credentials.
  
4. **Generate Application Key:**
<pre>
    php artisan key:generate
</pre>

5. **Run Migrations:**
<pre>
    php artisan migrate
</pre>

## Access the Application:
Open your web browser and go to "http://localhost/abc_banking/public" to access the application.
