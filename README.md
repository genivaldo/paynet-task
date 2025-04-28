# Paynet Task - User Management System

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)

A complete user management system with authentication, address management, and API integration built with Laravel.
## Features

- User registration with extended address fields
- Sanctum API token authentication
- Email verification and password reset
- CEP (Brazilian postal code) lookup via external API
- Responsive user dashboard
- Dockerized development environment

## Prerequisites

- Docker and Docker Compose installed
- Git

## Tech Stack

- Laravel 12
- Laravel Breeze (Blade)
- Laravel Sanctum
- Docker
- MailHog (for email testing)
- ViaCEP API

## Installation

1. **Clone the repository**
   ```bash
   git https://github.com/genivaldo/paynet-task.git
   cd paynet-task
   ```

2. **Setup environment**
   ```bash
   cp .env.example .env


   DB_CONNECTION=sqlite
   DB_DATABASE=/var/www/database/database.sqlite

   SANCTUM_STATEFUL_DOMAINS=localhost,127.0.0.1
    SESSION_DRIVER=database
    SESSION_LIFETIME=120
    SESSION_ENCRYPT=false
    SESSION_PATH=/
    SESSION_DOMAIN=localhost
    SESSION_SECURE_COOKIE=false

    MAIL_MAILER=smtp
    MAIL_SCHEME=null
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
   ```

3. **Start Docker containers**
   ```bash
   docker-compose up -d
   ```

4. **Install dependencies**
   ```bash
   docker exec -it paynet-task composer install
   ```

5. **Generate application key**
   ```bash
   docker exec -it paynet-task php artisan key:generate
   ```

6. **Run migrations**
   ```bash
   docker exec -it paynet-task php artisan migrate
   ```

7. Install frontend dependencies:
    ```bash
    docker exec -it paynet-task npm install
    docker exec -it paynet-task npm run dev
    ```
## Project Structure

```
paynet-task/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/ - API controllers
│   │   │   └── Auth/ - Authentication controllers
│   │   └── Providers/ - Service providers
│   ├── Models/ - Database models
├── config/ - Configuration files
├── database/
│   ├── migrations/ - Database migrations
│   └── seeders/ - Database seeders
├── resources/
│   ├── views/ - Blade templates
│   └── js/ - JavaScript assets
├── routes/ - Application routes
└── tests/ - Automated tests
```  └── dashboard.blade.php
```

## Running the Application

The application will be available at:
- Web interface: http://localhost:8080
- MailHog (email testing): http://localhost:8025

To stop the containers:
    ```bash
    docker-compose down
    ```


## API Endpoints

### CEP Lookup
```
GET /api/cep/{cep}
```
Example: `/api/cep/01001000`

Response:
```json
{
  "street": "Praça da Sé",
  "neighborhood": "Sé",
  "city": "São Paulo",
  "state": "SP"
}
```

### Authentication
```
POST /api/login
```
Body:
```json
{
  "email": "user@example.com",
  "password": "password"
}
```

## Usage

1. Access the application at `http://localhost:8080`
2. Register a new account
3. The dashboard will show all registered users
4. Use the API endpoints with your Sanctum token

## Development

### Running Tests
```bash
docker exec -it paynet-task php artisan test
```

### Debugging Emails
Access MailHog at `http://localhost:8025`

### Clearing Caches
```bash
docker exec -it paynet-task php artisan optimize:clear
```

## Architecture Highlights

1. **Service Provider Pattern**
   - CEP API logic encapsulated in `CepServiceProvider`
   - Injectable service throughout the application

2. **SOLID Principles**
   - Single Responsibility: Controllers only handle HTTP
   - Open/Closed: Services can be extended
   - Dependency Inversion: Services are injectable

3. **Security**
   - CSRF protection for web routes
   - Sanctum tokens for API authentication
   - Rate limiting on sensitive endpoints

## Environment Variables

| Key | Description |
|-----|-------------|
| `APP_URL` | Application base URL |
| `MAIL_MAILER` | Mail driver (smtp/mailhog) |
| `SANCTUM_STATEFUL_DOMAINS` | Domains for Sanctum cookies |

## License

MIT
