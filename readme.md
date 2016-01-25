# Laravel 5.2 User Profile System

This demo is an exercise in user registration and authentication.

Every user has the ability to register to the system, login and update their profile information. The profile system utilizes the Laravel restfull resource controllers.

A preset admin user has rights to view all created profiles with pagination and a simple
name search field.




## Setup 

To initialize the database run the migration
```
php artisan migrate
```
A database seeder will seed the admin user and create 30 users with profiles
```
php artisan db:seed
```
## Usage

The admin user is initialized as

**email/login:** admin@admin.com

**password:** secret
