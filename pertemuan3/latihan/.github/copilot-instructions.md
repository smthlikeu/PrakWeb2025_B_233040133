<!-- Copilot instructions for contributors and AI coding agents -->

# Copilot / AI Agent Instructions

This Laravel 12 skeleton is used for a small blog sample app. The goal of this file is to give an AI coding agent immediate, actionable knowledge to be productive in this repository.

**Project Overview**

-   **Framework**: Laravel (PHP 8.2+, Laravel 12). See `composer.json`.
-   **Frontend**: Vite + Tailwind (see `package.json` and `vite.config.js`).
-   **Database**: Eloquent models, migrations in `database/migrations`.
-   **Templates**: Blade views in `resources/views` (e.g. `posts.blade.php`, `post.blade.php`).

**Big-picture architecture & patterns**

-   **Routing & Controllers**: Routes are in `routes/web.php`. Controllers live under `app/Http/Controllers`. Routes use middleware (`auth`, `guest`) and Route Model Binding (example: `Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')`).
-   **Eloquent patterns**: Models use guarded properties and often eager-load relations. Example: `app/Models/Post.php` uses `protected $with = ['author','category']` and a `scopeFilter` method for search/category/author filters.
-   **Relationships**: `Post` belongs to `User` (alias `author`) and `Category`. `Category` hasMany `Post`.
-   **Avoid N+1**: Controllers use `with()` and `$model->load()` to eager-load (`PostController@index` uses `Post::with(['author','category'])->get()`). Respect and preserve those patterns when modifying queries.
-   **File structure to reference**: `routes/web.php`, `app/Http/Controllers/PostController.php`, `app/Models/Post.php`, `app/Models/Category.php`, `resources/views/*.blade.php`.

**Developer workflows / useful commands**

-   Install and prepare environment (composer script):
    -   `composer install`
    -   create `.env` from `.env.example` and run: `php artisan key:generate` and `php artisan migrate` (composer has a `setup` script that automates these steps).
-   Run development environment (runs server, queue listener and vite watcher):
    -   `composer run dev` (this uses `concurrently` to start `php artisan serve`, queue listener and `npm run dev`).
-   Build frontend assets: `npm run build` or `npm run dev` for development.
-   Run tests: `composer run test` or `php artisan test`. Tests use an in-memory SQLite database by default (see `phpunit.xml`).

**Project-specific conventions**

-   Route model binding by slug for posts: `'/posts/{post:slug}'`. When implementing similar controllers, prefer `Post $post` model binding and use `$post->load()` for additional relations.
-   Query filtering uses a `scopeFilter(Builder $query, array $filters)` on `Post` — keep this convention for new list endpoints.
-   Models commonly set `protected $guarded = ['id'];` and may define `protected $with` to always eager-load relations.
-   Views: templates are simple Blade files in `resources/views`. Use the existing view names (e.g., `posts`, `post`, `categories`) to keep route-to-view mappings consistent.

**Testing & CI notes**

-   `phpunit.xml` config runs tests with `DB_CONNECTION=sqlite` and `DB_DATABASE=:memory:`. Tests expect synchronous queue processing and array-based cache/session drivers.
-   Use `composer run test` to run the test suite locally. If adding tests that require a real DB, update the test environment or explain the need in a PR description.

**When editing code, prefer these patterns**

-   Preserve eager-loading and `scopeFilter` style for list endpoints to avoid performance regressions.
-   Use route names (see `->name('posts.index')`) when referring to routes in links/forms.
-   Preserve middleware usage (`auth`, `guest`) on auth-sensitive routes.

**Integration & external deps**

-   Key packages are in `composer.json` and `package.json`. Notable ones: `laravel/framework`, `vite`, `tailwindcss`, `laravel-vite-plugin`.
-   Background jobs: queue connection defaults to `sync` in tests; production config may differ in `config/queue.php`.

**Examples to cite in PRs or patches**

-   Eager load in controller: `Post::with(['author','category'])->get()` (see `PostController@index`).
-   Route model binding: `Route::get('/posts/{post:slug}', [PostController::class, 'show'])` (see `routes/web.php`).
-   Query scope: `Post::query()->filter(['search' => 'foo'])->get()` (see `app/Models/Post.php`).

If something is unclear or you need more context (e.g., expected auth roles, intended editorial flows, or sample data), ask a short question in the PR body and reference the files above.

---

If you'd like, I can refine this further (shorter, add examples for PR text, or include a checklist of automated checks to run before PRs). What would you like me to change?
