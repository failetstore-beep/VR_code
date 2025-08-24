# Augmira MVP Specification

This document outlines the Minimum Viable Product for **Augmira**, a Laravel-based AR try-on platform.

## 1. Widget (Public)
- **On Model (على النموذج):** Overlay product images onto predefined base models with size controls.
- **On Me (عليّ):** Users upload or capture photos, manually place/scale/rotate the overlay, and optionally calibrate using wrist width.
- **Beside (بجانِب):** Show product alongside reference objects (e.g., AirPods case) for scale comparison.
- Shareable URLs and embeddable snippets load the widget via iframe/lightbox.

## 2. Tech Choices
- Laravel 10/11 (PHP 8.1+), MySQL 8/5.7
- Blade templates with Bootstrap 5 + jQuery 3.7 via CDN
- Dropzone.js for uploads and `model-viewer` for GLB rendering
- Intervention Image for server-side resizing
- Localization with `lang/en` and `lang/ar` files

## 3. Database Schema (Migrations Summary)
- `users`: auth with roles (owner, admin, merchant)
- `merchants`: tenant info and API keys
- `products`: SKU, dimensions, default mode
- `assets`: overlay/model/reference/base/user background paths
- `embeds`: tokenized embed configs
- `events`: view/open/snap/mode_change logs
- `locales`: localized strings

## 4. Routes Overview
- Public landing and auth routes
- Dashboard routes for products, assets, embeds, stats (auth + locale middleware)
- Widget pages `/w/{slug}`, `/embed/{token}`, and JS loader `/embed/{token}.js`
- API routes: `GET /v1/products/{slug}`, `POST /v1/events`, `POST /v1/upload`

## 5. Blade Views
Key templates include:
- `landing.blade.php`, `auth/login.blade.php`, `auth/signup.blade.php`
- Dashboard: layout, index, products, assets, embeds, stats
- Widget: `widget/shell.blade.php` and `widget/embed.blade.php`
- Partials: `partials/topnav.blade.php`, `partials/lang-switcher.blade.php`

CDN includes for Bootstrap, jQuery, model-viewer, and RTL styles.

## 6. Widget Front-end Logic
- jQuery-driven tabs for the three modes
- Canvas-based drag/scale/rotate overlay handling
- Snapshot saving via `POST /api/v1/events`

## 7. API Contract
- Product config returned by `GET /api/v1/products/{slug}`
- Event logging via `POST /api/v1/events`
- Authless public endpoints with throttling

## 8. Embed Snippet & Test URL
- Test URL: `https://yourdomain.com/w/{slug}?merchant={merchant}&mode=model&lang=en`
- Embeddable snippet inserts a "Try On" button and iframe via `/embed/{token}.js`

## 9. Dashboard Pages
- Manage products, uploads, embeds, stats, settings, and language toggle

## 10. Minimal Code Snippets
Includes pre-defined web and API routes and optional `.htaccess` for shared hosting.

## 11. Deployment Notes
- Shared hosting friendly: configure MySQL, `.env`, `php artisan key:generate`, migrations, and storage link.

## 12. Future Enhancements
- Auto wrist detection, WebXR, analytics, privacy improvements, and payment plans.

## 13. Master Build Brief for Codex
Build a Laravel 11 app named **augmira** with the above features. Deliver full codebase with controllers, migrations, Blade templates, seeders, example `.env`, and README. Use CDN assets and avoid bundlers.

