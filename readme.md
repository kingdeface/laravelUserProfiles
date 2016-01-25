# Laravel 5.2 User Profile System

This demo is an exercise in user registration and authentication.

Every user has the ability to register to the system, login and update their profile information. The profile system utilizes the Laravel restfull resource controllers.

A preset admin user has rights to view all created profiles with pagination and a simple
name search field.




## Setup

1. Install the project
```
composer install
```

2. Rename .env.example in the root to .env and change the database settings to match yours and regenerate the key
```
php artisan key:generate
```

3. Initialize the database run the migration
```
php artisan migrate
```
4. Seed the Database (will seed the admin user and create 30 users with profiles)
```
php artisan db:seed
```

5. Serve it up (alternatively run on homestead) and visit http://localhost:8000
```
php artisan serve
```

## Usage

The admin user is initialized as

**email/login:** admin@admin.com

**password:** secret
