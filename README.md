# tiny

## About
This project is a simple implementation of URL shortner website using laravel 6.

## Installation

To get this app up and running follow the next steps:

- First clone this repo on you machine then cd in the project directory.
```bash
cd tiny
```
- Run the following command to get the dependencies installed.
```bash
composer update
```
- Create the environment file.
```bash
cp .env.example .env
```

- Create a mysql database and add its name and credentials to the `.env` file you just created in the app root directory.
- After you have created a new database and added its credentials to the app config run the app migrations.
```bash
php artisan migrate
```
- Then run the following command to generate the app key.
```bash
php artisan key:generate
```
- Once its done go ahead and start the server.
```bash
php artisan serve
```
Then you can access the app in your browser.

## Usage

By default it can be accessed using this url [http://127.0.0.1:8000](http://127.0.0.1:8000).
