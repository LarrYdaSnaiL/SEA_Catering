# SEA Catering Application
Welcome to the SEA Catering web application! This platform allows customers across Indonesia to subscribe to customizable healthy meal plans. It also features a comprehensive dashboard for both users and administrators to manage subscriptions and monitor business performance.

## Features
* User Authentication: Secure registration and login system for customers.
* Interactive Meal Plan Menu: Browse available meal plans with details.
* Dynamic Subscription Form: Users can customize their meal plans with real-time price calculation.
* User Dashboard: View and manage active subscriptions (pause, resume, cancel).
* Admin Dashboard: Monitor key business metrics with a filterable date range and a subscription growth chart.
* Testimonial System: Users can submit reviews and ratings, which are displayed on the homepage.

## Setup and Installation
Follow these steps to set up the project on your local machine. This guide assumes you have Composer and a local server environment like Laragon (with PHP, MySQL, and Node.js) installed.

### 1. Clone the Repository
First, clone this repository to your local machine.

```
git clone https://github.com/LarrYdaSnaiL/SEA_Catering.git
cd SEA_Catering

```

### 2. Install Dependencies
Install the required PHP and JavaScript dependencies.

```
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

```

### 3. Environment Configuration
Create a copy of the .env.example file and name it .env.

```
copy .env.example .env

```

Now, open the .env file and configure your database connection. For a standard Laragon setup, the following values should work:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sea_catering
DB_USERNAME=root
DB_PASSWORD=

```

After configuring the environment, generate a new application key:

```
php artisan key:generate

```

### 4. Database Migration and Seeding
Run the database migrations to create all the necessary tables. The --seed flag will also run the database seeder, which will automatically create the default admin account.

```
php artisan migrate:fresh --seed

```

### 5. Compile Assets
Compile the JavaScript and CSS assets using Vite.

```
npm run dev

```
### 6. Run the Application
Finally, start the local development server.

```
php artisan serve

```

You can now access the application at http://localhost:8000.

## Creating an Admin Account
An admin account is created automatically when you run the database seeder (php artisan migrate:fresh --seed). The credentials are:

Email: ``admin@seacatering.com``

Password: ``admin123``

You can log in with these credentials to access the Admin Dashboard. It is highly recommended to change this password immediately after your first login via the "Profile" page.