# Pixel Positions - job portal

A job portal application built with Laravel showcasing modern PHP practices.

**Give it a try:** https://pixel-positions.rborowski.pl

## Features

- Browse and search job listings
- Filter offers by tag, employer, and salary range with multi-currency support (You can mix filters!)
- Register as an employer to add your own job offer

## Architecture Highlights

Built following SOLID principles and Laravel best practices:

- **Filter Pattern**: Extensible filtering system using Strategy pattern with `FilterInterface`
- **Type Safety**: PHP 8.5 enums for `Schedule` and `Currency` with proper casting
- **Eloquent Relationships**: Well-defined model relationships
- **Testing**: Pest test suite with factories
- **Component-Based UI**: Reusable Blade components for forms and filters.

## Tech Stack

- Laravel 12 with Blade
- PHP 8.5
- Pest for testing

## Installation

```bash
composer install
npm install
php artisan migrate
npm run build
```

## Running

```bash
php artisan serve
```
