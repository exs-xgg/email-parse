# Installation

## Requirements

-   PHP
-   Composer
-   MySQL
-   PHP <= 8.2
-   Laravel 11

## Run Locally

1. Clone repo to server

```
git clone https://github.com/exs-xgg/email-parse
cd email-parse
```

2. Install dependencies

```
composer install
```

3. Setup .env

```
cp .env.example .env
```

4. Run migration (assuming you already had the initial CREATE TABLE statement executed)

```
php artisan migrate
```

5. Run the API

```
php artisan serve
```

## Run custom command to parse emails via CLI

```
php artisan app:parse-email
```

## Add to crontab (automatically setup in Kernel to run hourly)

```
-   -   -   -   -   cd /path-to-your-laravel-project && php artisan schedule:run >> /dev/null 2>&1
```

## Authentication

### Add to .env

`API_KEY=your_random_key`

### Add to REST API Header

`x-api-key = your_random_key`
