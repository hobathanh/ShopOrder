# Just do it
## Make sure that u have already installed composer, or download it here https://getcomposer.org/
## Step1: Open phpmyadmin to create a new database for project: (example: shoporder (utf8mb4_general_ci))
## Step2: Go to htdocs folder then open git Bash here
### - Run command: git clone <this project>
### - Run command: cd "project folder"
### - Run command: composer install
### - Run command: cp .env.example .env
### Open: .env -> edit: DB_DATABASE (exp: DB_DATABASE=shoporder)
### - Run command: php artisan key:generate
### - Run command: php artisan migrate
### - Run command: php artisan storage:link
## Step3: Run command: php artisan serve -> http://127.0.0.1:8000/home

