# Laravel Banking Application
The Laravel Banking Application is a small-scale web application developed using the Laravel PHP framework. The primary objective of this application is to provide users with basic banking functionalities in a secure and user-friendly environment.

## Key Features:

### Registration:
      Users can create new accounts by providing a unique email address and password.

### Login:
      Registered users can securely log in to their accounts.

### Inbox/Home:
      Users can view their account information upon logging in.

### Cash Deposit:
      Users can deposit funds into their accounts, updating the account balance accordingly.

### Cash Withdrawal:
      Users can withdraw funds from their accounts, with appropriate balance verification.

### Cash Transfer:
      Users can transfer funds from their accounts to another user's account using the recipient's email address.

### Account Statement:
      Users can view a statement of their recent transactions, including details such as date, amount, transaction type, and account balance.

### Logout:
      Users can securely log out of their accounts.

## Technologies Used:

### Laravel Framework:
      Utilized for rapid development, following MVC architecture.
### PHP:
      Server-side scripting language for the backend logic.
### MySQL:
      Database management system for storing user data and transaction records.

1. **Create Database in phpMyAdmin:**
   - Open phpMyAdmin in your web browser.
   - Create a new database called 'abc_banking'
   - run migration command 'php artisan migrate'

2. After migrated the migration files to database, then register new account and then do login.
