# Project: Yana Kavaliova-Logvin - Personal Portfolio

**Project Description:** A personal portfolio website for Yana Kavaliova-Logvin to showcase her manicure and pedicure certificates. The site will display original and translated versions of certificates (PDFs/images). Each certificate will have its own dedicated page, shareable via a unique URL. The MVP will focus on the landing page and certificate display. The website will be in Polish.

**Tech Stack:**
*   Backend: Laravel
*   Frontend: Blade Templates, Tailwind CSS
*   Database: None for MVP (hardcoded data)
*   Deployment: Docker (already initiated for dev)

**AI Implementation Notes:** This plan is designed for an AI (@cline) to implement. Steps should be clear, atomic, and verifiable.

---

## Phase 1: Project Setup & Initial Configuration

*   [ ] **1.1. Verify Laravel Installation & Docker Setup:**
    *   [ ] Ensure `docker-compose up -d` brings up the Laravel application and database (though DB not used for MVP data).
    *   [ ] Confirm the Laravel welcome page is accessible in the browser.
*   [x] **1.2. Install and Configure Tailwind CSS:**
    *   [x] Install Tailwind CSS, PostCSS, and Autoprefixer via npm: `npm install -D tailwindcss postcss autoprefixer`
    *   [x] Initialize Tailwind CSS: `npx tailwindcss init -p` (creates `tailwind.config.js` and `postcss.config.js`).
    *   [x] Configure `tailwind.config.js` to include paths to Blade templates:
        ```javascript
        // tailwind.config.js
        /** @type {import('tailwindcss').Config} */
        export default {
          content: [
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            // "./resources/**/*.vue", // If Vue is ever considered
          ],
          theme: {
            extend: {},
          },
          plugins: [],
        }
        ```
    *   [ ] Add Tailwind directives to `resources/css/app.css`:
        ```css
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
        ```
    *   [ ] Update `vite.config.js` to process `app.css` with PostCSS. Ensure `laravel-vite-plugin` is correctly configured.
        ```javascript
        // vite.config.js
        import { defineConfig } from 'vite';
        import laravel from 'laravel-vite-plugin';

        export default defineConfig({
            plugins: [
                laravel({
                    input: ['resources/css/app.css', 'resources/js/app.js'],
                    refresh: true,
                }),
            ],
            // Add postcss configuration if not automatically handled by laravel-vite-plugin
            // css: {
            //  postcss: {
            //    plugins: [
            //      require('tailwindcss'),
            //      require('autoprefixer'),
            //    ],
            //  },
            // },
        });
        ```
    *   [ ] Ensure `postcss.config.js` is correctly set up:
        ```javascript
        // postcss.config.js
        export default {
          plugins: {
            tailwindcss: {},
            autoprefixer: {},
          },
        }
        ```
    *   [ ] Run `npm run dev` (or `npm run build`) to compile assets and verify Tailwind is working.
    *   [ ] Include compiled CSS in the main layout file (e.g., `resources/views/layouts/app.blade.php`).

## Phase 2: Data Structure for Certificates (Hardcoded)

*   [ ] **2.1. Define Certificate Data Structure:**
    *   [ ] Create a configuration file `config/certificates.php` to store certificate data.
    *   [ ] Each certificate entry should include:
        *   `id` (unique identifier, e.g., a slug for URL: `certyfikat-manicure-hybrydowy-2023`)
        *   `title_pl` (Polish title: "Certyfikat Manicure Hybrydowy 2023")
        *   `description_pl` (Polish description, optional: "Zaawansowany kurs manicure hybrydowego.")
        *   `original_file_path` (path to original PDF/image in `public/assets/certificates/originals/`)
        *   `original_file_type` (`pdf` or `image`)
        *   `translated_file_path` (path to translated PDF/image in `public/assets/certificates/translations/`)
        *   `translated_file_type` (`pdf` or `image`)
        *   `thumbnail_image_path` (path to a thumbnail for the landing page, in `public/assets/certificates/thumbnails/`)
*   [ ] **2.2. Prepare Placeholder Certificate Assets:**
    *   [ ] Create directories:
        *   `public/assets/certificates/originals/`
        *   `public/assets/certificates/translations/`
        *   `public/assets/certificates/thumbnails/`
    *   [ ] Add a few sample PDF and image files (e.g., `sample1_orig.pdf`, `sample1_trans_pl.pdf`, `sample1_thumb.jpg`) to these directories for testing.
*   [ ] **2.3. Populate `config/certificates.php`:**
    *   [ ] Add 2-3 sample certificate entries using the defined structure and placeholder assets.
        Example for `config/certificates.php`:
        ```php
        <?php
        return [
            'certificates' => [
                [
                    'id' => 'certyfikat-manicure-hybrydowy-2023',
                    'title_pl' => 'Certyfikat Manicure Hybrydowy 2023',
                    'description_pl' => 'Zaawansowany kurs manicure hybrydowego.',
                    'original_file_path' => 'assets/certificates/originals/manicure_hybrid_2023_orig.pdf',
                    'original_file_type' => 'pdf',
                    'translated_file_path' => 'assets/certificates/translations/manicure_hybrid_2023_trans_pl.pdf',
                    'translated_file_type' => 'pdf',
                    'thumbnail_image_path' => 'assets/certificates/thumbnails/manicure_hybrid_2023_thumb.jpg',
                ],
                [
                    'id' => 'certyfikat-pedicure-klasyczny-2024',
                    'title_pl' => 'Certyfikat Pedicure Klasyczny 2024',
                    'description_pl' => 'Podstawowy kurs pedicure klasycznego.',
                    'original_file_path' => 'assets/certificates/originals/pedicure_classic_2024_orig.avif',
                    'original_file_type' => 'image', // Assuming avif is treated as image
                    'translated_file_path' => 'assets/certificates/translations/pedicure_classic_2024_trans_pl.pdf',
                    'translated_file_type' => 'pdf',
                    'thumbnail_image_path' => 'assets/certificates/thumbnails/pedicure_classic_2024_thumb.jpg',
                ],
                // Add more certificates
            ]
        ];
        ```

## Phase 3: Core Layout and Navigation

*   [ ] **3.1. Create Main Blade Layout (`resources/views/layouts/app.blade.php`):**
    *   [ ] Basic HTML structure (doctype, head, body).
    *   [ ] Include Vite assets (`@vite(['resources/css/app.css', 'resources/js/app.js'])`).
    *   [ ] Define sections for content (`@yield('content')`) and title (`@yield('title', 'Yana Kavaliova-Logvin')`).
    *   [ ] Basic header with site title/name: "Yana Kavaliova-Logvin - Certyfikaty Manicure i Pedicure".
    *   [ ] Basic footer.
    *   [ ] Ensure Polish language is set (`<html lang="pl">`).
*   [ ] **3.2. Basic Styling for Layout:**
    *   [ ] Apply simple Tailwind CSS classes for overall page structure, fonts, and colors.

## Phase 4: Landing Page Development

*   [ ] **4.1. Create Landing Page Blade View (`resources/views/pages/landing.blade.php`):**
    *   [ ] Extend the main layout (`@extends('layouts.app')`).
    *   [ ] Set page title: `@section('title', 'Strona Główna - Yana Kavaliova-Logvin')`.
    *   [ ] Brief introduction about Yana Kavaliova-Logvin.
    *   [ ] Grid or list to display certificate thumbnails and titles.
    *   [ ] Each certificate thumbnail/title should link to its individual certificate page using `route('certificate.show', ['id' => $certificate['id']])`.
*   [ ] **4.2. Create `CertificateController` and Landing Page Method:**
    *   [ ] Create `app/Http/Controllers/CertificateController.php`: `php artisan make:controller CertificateController`
    *   [ ] In `CertificateController.php`, add a method `index()`.
    *   [ ] This method should load certificate data: `$certificates = config('certificates.certificates');`.
    *   [ ] Pass the certificate data to the `pages.landing` view: `return view('pages.landing', compact('certificates'));`.
*   [ ] **4.3. Define Route for Landing Page:**
    *   [ ] In `routes/web.php`, map the root URL (`/`) to `CertificateController@index`.
        ```php
        use App\Http\Controllers\CertificateController;

        Route::get('/', [CertificateController::class, 'index'])->name('landing');
        ```
*   [ ] **4.4. Style Landing Page with Tailwind CSS:**
    *   [ ] Style the introduction section.
    *   [ ] Style the certificate grid/list (e.g., using Tailwind's grid or flexbox utilities).
    *   [ ] Ensure responsiveness.

## Phase 5: Certificate Detail Page Development

*   [ ] **5.1. Create Certificate Detail Page Blade View (`resources/views/pages/certificate_detail.blade.php`):**
    *   [ ] Extend the main layout.
    *   [ ] Set page title dynamically: `@section('title', $certificate['title_pl'] . ' - Yana Kavaliova-Logvin')`.
    *   [ ] Display certificate title (`$certificate['title_pl']`).
    *   [ ] Display certificate description (`$certificate['description_pl']`, if available).
    *   [ ] Section for "Oryginalny Dokument":
        *   If image: display using `<img src="{{ asset($certificate['original_file_path']) }}" alt="Oryginał - {{ $certificate['title_pl'] }}">`.
        *   If PDF: provide a link `<a href="{{ asset($certificate['original_file_path']) }}" target="_blank">Zobacz oryginał (PDF)</a>`.
    *   [ ] Section for "Dokument Przetłumaczony (PL)":
        *   If image: display using `<img src="{{ asset($certificate['translated_file_path']) }}" alt="Tłumaczenie PL - {{ $certificate['title_pl'] }}">`.
        *   If PDF: provide a link `<a href="{{ asset($certificate['translated_file_path']) }}" target="_blank">Zobacz tłumaczenie (PDF)</a>`.
    *   [ ] Add a "Powrót do strony głównej" link: `<a href="{{ route('landing') }}">...</a>`.
*   [ ] **5.2. Create Certificate Detail Controller Method:**
    *   [ ] In `CertificateController.php`, add a method `show($id)`.
    *   [ ] This method should:
        *   Load all certificate data: `$allCertificates = config('certificates.certificates');`.
        *   Find the specific certificate by its `id`.
            ```php
            $certificate = collect($allCertificates)->firstWhere('id', $id);
            if (!$certificate) {
                abort(404);
            }
            ```
        *   Pass the found certificate data to the `pages.certificate_detail` view: `return view('pages.certificate_detail', compact('certificate'));`.
*   [ ] **5.3. Define Route for Certificate Detail Pages:**
    *   [ ] In `routes/web.php`, map a URL like `/certyfikat/{id}` to `CertificateController@show`.
        ```php
        Route::get('/certyfikat/{id}', [CertificateController::class, 'show'])->name('certificate.show');
        ```
*   [ ] **5.4. Style Certificate Detail Page with Tailwind CSS:**
    *   [ ] Style the display of titles, descriptions.
    *   [ ] Style the sections for original and translated documents.
    *   [ ] Ensure images are responsive and PDFs are clearly linked/displayed.

## Phase 6: Asset Handling and URLs

*   [ ] **6.1. Confirm Asset Paths and URL Generation:**
    *   [ ] Ensure paths used in `config/certificates.php` correctly point to files in `public/assets/certificates/...`.
    *   [ ] Consistently use Laravel's `asset()` helper function in Blade templates for public assets.
    *   [ ] Consistently use Laravel's `route()` helper function for named routes.

## Phase 7: Content Population (Actual Data)

*   [ ] **7.1. Gather All Certificate Files:**
    *   [ ] Collect all original PDF/image (.avif accepted) files.
    *   [ ] Collect all translated (Polish) PDF/image files.
    *   [ ] Create/source thumbnails for each certificate.
*   [ ] **7.2. Organize Files:**
    *   [ ] Place original files in `public/assets/certificates/originals/`.
    *   [ ] Place translated files in `public/assets/certificates/translations/`.
    *   [ ] Place thumbnail files in `public/assets/certificates/thumbnails/`.
    *   [ ] Use consistent and descriptive naming for files (e.g., `nazwa-certyfikatu-rok_orig.pdf`, `nazwa-certyfikatu-rok_trans_pl.pdf`, `nazwa-certyfikatu-rok_thumb.jpg`). Slugs in `id` should ideally match part of the filename for clarity.
*   [ ] **7.3. Update `config/certificates.php`:**
    *   [ ] Replace placeholder data with actual certificate information and correct file paths.
    *   [ ] Ensure all `id` slugs are unique and URL-friendly.

## Phase 8: Basic Testing & Refinements

*   [ ] **8.1. Manual Testing:**
    *   [ ] Open landing page:
        *   Verify all certificate thumbnails and titles are displayed.
        *   Verify links to certificate detail pages are correct and use the defined slugs.
    *   [ ] Open each certificate detail page via its URL:
        *   Verify correct title and description are shown.
        *   Verify original document (image/PDF link) works.
        *   Verify translated document (image/PDF link) works.
        *   Verify "Back to Home" link works.
    *   [ ] Check for broken links or missing images/PDFs (404 errors).
    *   [ ] Test responsiveness on different screen sizes (basic check using browser dev tools).
*   [ ] **8.2. Code Review (Self-Review for AI):**
    *   [ ] Check for clarity and consistency in Blade templates.
    *   [ ] Ensure Tailwind CSS is applied effectively and consistently.
    *   [ ] Verify controller logic is simple and correct for fetching hardcoded data and handling 404s.

## Phase 9: SEO & Accessibility Basics (MVP Level)

*   [ ] **9.1. Page Titles:**
    *   [ ] Ensure each page has a unique and descriptive `<title>` tag using Blade sections.
*   [ ] **9.2. Image Alt Text:**
    *   [ ] Add descriptive `alt` text in Polish for all images (thumbnails, certificate images).
*   [ ] **9.3. Semantic HTML:**
    *   [ ] Use appropriate HTML5 tags (`<header>`, `<nav>`, `<main>`, `<article>`, `<footer>`, etc.) where applicable.
*   [ ] **9.4. `robots.txt` and `sitemap.xml` (Basic):**
    *   [ ] Ensure `public/robots.txt` is reasonable (e.g., `User-agent: * Allow: /`).
    *   [ ] Consider generating a simple `sitemap.xml` for certificate pages if many. (Manual for MVP is fine).

## Phase 10: Build & Pre-Deployment Checks (Local)

*   [ ] **10.1. Production Asset Build:**
    *   [ ] Run `npm run build` to compile and minify assets for production.
    *   [ ] Test the site with production-built assets locally by temporarily setting `APP_DEBUG=false` in `.env`.
*   [ ] **10.2. Environment Configuration:**
    *   [ ] Review `.env.example`. Ensure `APP_URL` is set correctly for the target domain.
    *   [ ] For production: `APP_ENV=production`, `APP_DEBUG=false`.
*   [ ] **10.3. Favicon:**
    *   [ ] Ensure `public/favicon.ico` is present and appropriate.

## Phase 11: Future Considerations (Post-MVP)

*   [ ] **11.1. Database Integration:**
    *   [ ] Migrate certificate data from `config/certificates.php` to a database table.
    *   [ ] Create Eloquent models and update controllers.
    *   [ ] Implement an admin panel for managing certificates.
*   [ ] **11.2. Multilingual Support.**
*   [ ] **11.3. Advanced PDF/Image Display (e.g., lightboxes, embedded viewers).**
*   [ ] **11.4. Contact Form.**
*   [ ] **11.5. Proper Deployment Strategy (beyond local Docker).**
*   [ ] **11.6. Automated Testing (Unit/Feature tests).**
*   [ ] **11.7. Cookie Consent Banner (if analytics or other tracking is added).**

---
**End of `todo.md`**
