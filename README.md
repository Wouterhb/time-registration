# Tijdregistratie-app

Een eenvoudige tijdregistratie-app gebouwd met Laravel 12.

## Functionaliteiten

-   Gebruikersregistratie en login (Laravel Breeze)
-   Projecten aanmaken en beheren
-   Uren loggen per project (datum, van/tot, beschrijving)
-   Alleen de eigenaar kan eigen projecten en uren beheren
-   Admin-gebruiker heeft volledige toegang
-   Beveiligd via Laravel Policies

## Technische details

-   Backend: Laravel 12, PHP 8.2+, Composer, npm
-   Frontend: Blade templates, Tailwind
-   Database: [Zolang Laravel het maar ondersteund](https://laravel.com/docs/12.x/database#introduction) (zelf PostgreSQL gebruikt)
-   Authorisatie: Laravel Policies
-   Validatie: Form Requests
-   Structuur: PSR-12, SRP, Actions

## Installatie

1. Clone de repository

```bash
git clone https://github.com/Wouterhb/time-registration.git
cd time-registration
```

2. Installeer depedencies

```bash
composer install
npm install
npm run build
```

3. Kopieer en configureer de `.env` file

```bash
cp .env.example .env
php artisan key:generate
```

Pas de volgende values aan:

```bash
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

4. Run de migraties

```bash
php artisan migrate
```

5. Run de seeder (Optioneel)

```bash
php artisan db:seed
```

Voegt het volgende toe:

```javascript
- Admin User => email: 'admin@example.com', password: 'password';
- Normal User => email: 'user@example.com', password: 'password'
- 5 projects
- Tussen 5 en 10 time entries per project
```

5. Start de server

```bash
composer run dev
```

## Testen (Optioneel) 

(Momenteel alleen unit tests voor de `Actions`)

```bash
php artisan test
```
