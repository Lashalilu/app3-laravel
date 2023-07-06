## App3Null

_____

### About

This is a simple web application.

### How to run

1. Clone the repository:
2. Run:
    ```bash
    composer install
    ```
Run in Terminal on Project Directory: cp .env.example .env 

php artisan key:generate

3. Create Mysql database and fill database environments in .env.
4. Run:
    ```bash
    php artisan migrate
    ```
5. Run:
    ```bash
    php artisan db:seed
    ```
6. Create https://mailtrap.io/ account and fill the environments variables in .env
7. Run
    ```bash
    php artisan queue:work
    ```
    ```bash
    php artisan serve
    ```
8. The application must be started on http://localhost:8000/

### About React JS project.

1. Clone the repository
2. Run:
    ```bash
    npm install
    ```

3. Run:
    ```bash
    npm start
    ```
4. On the / directory you will see the form. When you will enter validate information it will redirect you to /list directory and you will be able to see User Data Table. Your record will not be displayed. You would need to activate your account via email.
5. Again, you would need to activate the account. Open https://mailtrap.io/ log in and click Verify Email Address.
6. After that you will see the record. 
