# Laravel Vue Form

A CRUD application to save customer information. The application consists of a Laravel API, using Eloquent ORM and Sanctum middleware for security. The Front-end utilises VueJS and Vue Router, ensuring a fast and seamless user experience. It includes a home page to render a list of existing customers, a form to create a new customer and a login page. For security only the login page is accessible to a guest user.

## Technology choices

The following technologies were used in this project:

- Laravel for the Back-end API. This was chosen as per the brief and for it's strong security with Sanctum middleware, built-in data validation methods and Eloquent ORM for interacting with the database.
- Vue.js was used in the Front-end. Benefits include ease of integration with the Laravel framework, a virtual DOM to prevent unnecessary rerenders and reactivity to update the UI automatically.
- Vue Router was used for Front-end routing. As the official router for Vue.js, it integrates well and includes all the required functionality.
- Bootstrap was used for styling for ease of use and form UX/UI.
- An SQLite database was used as the small size of the project did not necessitate a more complex database.


## Prerequisites

To run this project on your local machine please ensure you have the following installed:

- A server such as Apache ([install](https://httpd.apache.org/docs/current/install.html))
- PHP - configured for your server ([install](https://www.php.net/manual/en/install.php))
- Composer ([install](https://getcomposer.org/download/))
- Node.js ([install](https://nodejs.org/en/download/package-manager))

Note: php-xml and php-sqlite3 extensions may need to be seperately installed.


## Instructions

Run the following commands to clone and set up this project:

```
# clone repository
git clone https://github.com/AkivaKn/laravel-vue-form.git

# open project
cd laravel-vue-form
code .

# install dependencies
composer install
npm install
```
Create a database.sqlite file in /database. To view the file install in VSCode install an extension such as SQLite3 Editor.

Run the following commands to set up the database and run the project:

```
# set up database
php artisan migrate
php artisan db:seed

# run project
php artisan serve
npm run dev (in a new terminal)
```

The project should be up and running. Access it at http://localhost:8000. You will automatically be redirected to login. Login using the following credentials:

Email: example1@gmail.com

Password: example1

## API
The API can be tested using a platform such as Postman or Insomnia.

Run the Laravel server:

```
php artisan serve
```
The API can be accessed at http://localhost:8000. Ensure that the content-type is set to application/json. All routes except /api/register and /api/login require an authorization header. To generate a token login or register and the return value will include a generated token. Copy the token into the auth field using auth-type bearer to access other API routes. The following is a list of routes:

- POST /api/login
- POST /api/logout
- POST /api/register
- GET /api/user
- GET /api/customers
- POST /api/customers
- GET /api/customers/{customer}
- PATCH /api/customers/{customer}
- DELETE /api/customers/{customer}







