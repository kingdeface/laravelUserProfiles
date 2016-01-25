# Laravel 5.2 User Profile System

This demo is an exercise in user registration and authentication.

Every user has the ability to register to the system, login and update their profile information. The profile system utilizes the Laravel restfull resource controllers.

A preset admin user has rights to view all created profiles with pagination and a simple
name search field.




## Setup

Clone the project
```
git clone git@github.com:paulmaclean/laravelUserProfiles.git
```

cd into \laravelUserProfiles and install the project
```
composer install
```

Rename .env.example in the root to .env , change the database settings to match yours and regenerate the key
```
php artisan key:generate
```

Initialize the database run the migration
```
php artisan migrate
```
Seed the Database (will seed the admin user and create 30 users with profiles)
```
php artisan db:seed
```

Serve it up and visit http://localhost:8000
```
php artisan serve
```

## Usage

The admin user is initialized as

**email/login:** admin@admin.com

**password:** secret
