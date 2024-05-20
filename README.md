<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Assessment Backend API

This project is a simple API interface built using Laravel 8+ and PHP 8. It demonstrates user authentication, and CRUD operations for managing books and stores with a many-to-many relationship. The API supports JSON responses and uses Laravel Sanctum for token-based authentication.

## Features

- **Authentication**: User login and logout with token-based authentication.
- **CRUD Operations**:
  - **Books**: Create, read, update, and delete books.
  - **Stores**: Create, read, update, and delete stores.
  - **Book-Store Relationship**: Manage the many-to-many relationship between books and stores.

## Requirements

- PHP 8+
- Laravel 8+
- MySQL/SQLite
- Composer

## Installation and Setup

Follow these steps to set up and run the project on your local machine.

### Step 1: Clone the Repository

`
git clone https://github.com/yourusername/assessment-backend.git
cd assessment-backend`  

### Step 2: Install Dependencies
Ensure you have Composer installed. Then, run:
`
composer install
`
### Step 3: Set Up Environment Variables
1. Copy the example environment file to create a new .env file:
`
cp .env.example .env
`
2. Open the .env file and update the database configuration to match your setup:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### Step 4:Generate Application Key
Generate a new application key:
`php artisan key:generate`
### Step 5: Run Migrations
Run the database migrations to create the necessary tables:
`php artisan migrate`
### Step 6: Seed the Database (Optional)
If you want to create a default user for testing, you can use a database seeder. Create a seeder if you haven't already:
`php artisan make:seeder UserSeeder`

Update the database/seeders/UserSeeder.php file:
```
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
```


Run the seeder:
`php artisan db:seed --class=UserSeeder`

### Step 7: Start the Development Server
Start the Laravel development server:

`php artisan serve`
The server will start at `http://localhost:8000`.

API Endpoints
Authentication
Login: POST `/api/login`

Request Body:
```
{
  "email": "user@example.com",
  "password": "password"
}
```


Response:
```
{
  "access_token": "your_generated_token",
  "token_type": "Bearer"
}
```

Logout: POST `/api/logout` (Requires authentication)

Header:
Authorization: `Bearer your_generated_token`

#### CRUD Operations
Books
Get All Books: GET `/api/books` (Requires authentication)
Create Book: POST `/api/books` (Requires authentication)
Request Body:
```
{
  "name": "Book Title",
  "isbn": "1234567890123",
  "value": 19.99
}
```

- Get Book by ID: GET `/api/books/{id}` (Requires authentication)
- Update Book: PUT `/api/books/{id}` (Requires authentication)
- Request Body:

```{
  "name": "Updated Book Title",
  "isbn": "1234567890123",
  "value": 29.99
}
```

- Delete Book: DELETE `/api/books/{id}` (Requires authentication)
### Stores
- Get All Stores: GET `/api/stores` (Requires authentication)
- Create Store: POST `/api/stores` (Requires authentication)
- Request Body:

```{
  "name": "Store Name",
  "address": "123 Store Address",
  "active": true
}
```


- Get Store by ID: GET `/api/stores/{id}` (Requires authentication)
- Update Store: PUT `/api/stores/{id}` (Requires authentication)
- Request Body:

```{
  "name": "Updated Store Name",
  "address": "123 Updated Address",
  "active": false
}
```



- Delete Store: `DELETE /api/stores/{id}` (Requires authentication)
### Testing with Postman
#### To test the API using Postman:

Login to Get Token:

1. Method: POST
- URL: http://localhost:8000/api/login
- Body:

```{
  "email": "user@example.com",
  "password": "password"
}
```



2. Use the Token in Subsequent Requests:
Add a header: `Authorization: Bearer your_generated_token`
3. CRUD Operations:
Perform CRUD operations on /api/books and /api/stores endpoints using the token for authentication.
4. Logout:
- Method: POST
- URL: http://localhost:8000/api/logout
- Add the Authorization header with the token.
## Conclusion
This project provides a simple API interface with user authentication and CRUD operations for managing books and stores. By following the steps outlined above, you can set up and run the project on your local machine and test the API endpoints using Postman. This implementation showcases the use of Laravel Sanctum for token-based authentication, ensuring secure and authenticated access to the API.
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
