# Circle Link Health
A simple application for taking patient's blood pressure readings.

# Requirements
```sh
    "php": "^7.3|^8.0"
```
# Setting it up
These are the steps to get the app up and running. Once you're using the app.

1. Clone the repository
2. `composer install`
3. Rename `.env.example` to `.env` and run `php artisan key:generate`
4. Create a MySQL database. Add the database name to your `.env`
6. Run migrations: `php artisan migrate`
7. Install packages: `npm install`
8. Compile assest: `npm run dev`
9. Run `php artisan serve` 
10. Run `php artisan queue:work`
11. Run `php artisan test`
