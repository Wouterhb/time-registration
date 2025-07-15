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

-   Backend: Laravel 12 
-   Frontend: Blade templates
-   Database: PostgreSQL
-   Authorisatie: Laravel Policies
-   Validatie: Form Requests
-   Structuur: PSR-12, SRP, Actions & Services

## Installatie

1. Clone de repository

```bash
git clone https://github.com/<jouw-gebruikersnaam>/<repo-naam>.git
cd <repo-naam>
```

2. Installeer depedencies

```bash
composer install
```

3. Kopieer en configureer de `.env` file

```bash
cp .env.example .env
php artisan key:generate
```

4. Draai de migraties

```bash
php artisan migrate
```

5. Start de server

```bash
php artisan serve
```

## (Optioneel) Testen

```bash
php artisan test
```
