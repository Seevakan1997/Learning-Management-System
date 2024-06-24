# Laravel Academic Portal

## Introduction

This project is a Laravel-based web application for managing academic courses and modules. It includes user authentication, role-based access control, and various CRUD functionalities for courses and modules.

## Requirements

- PHP >= 8.0
- Composer
- Node.js & NPM
- MySQL (or any other database supported by Laravel)

## Installation

### Step 1: Clone the Repository
### Step 2: Install Dependencies
    -composer install
    -npm install
### Step 3: Set Up Environment
    -php artisan key:generate
    -Update the .env file with your database credentials and other necessary settings
### Step 4: Run Migrations and Seeders
    -php artisan migrate
    -php artisan db:seed --class=RolesAndPermissionsSeeder
### Step 5: Install and Compile Frontend Assets
    -npm run dev
### Step 6: Serve the Application
    -php artisan serve
### Authentication and Roles Setup
    -composer require laravel/ui
    -php artisan ui vue --auth
    -npm install && npm run dev
  #### Install Spatie Laravel Permissions
    -composer require spatie/laravel-permission
    -php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    -php artisan migrate
  #### Seed Roles and Permissions
    -php artisan db:seed --class=RolesAndPermissionsSeeder


This version includes the essential steps and configurations needed to get the project up and running, while also briefly explaining the authentication and roles setup, middleware configuration, and testing.




