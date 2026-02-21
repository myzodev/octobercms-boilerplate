---
name: laravel
description: Use when editing Laravel or Laravel-based code: Eloquent models, migrations, controllers, requests, services, config, artisan commands, or general PHP backend logic. OctoberCMS is built on Laravel.
---

# Laravel Best Practices

## General

- **PHP**: Target the project’s required PHP version. Use type hints, return types, and strict types where appropriate. Follow PSR-12 for style.
- **Namespacing**: Respect PSR-4. In October plugins, use `Author\Plugin\Models`, `Author\Plugin\Controllers`, etc. In Laravel apps, use `App\Models`, `App\Http\Controllers`, etc.

## Eloquent & database

- **Models**: Place in `Models/` (or plugin equivalent). Use fillable or guarded; prefer `$fillable` for clarity. Use casts for dates, JSON, booleans, and enums.
- **Relations**: Define `hasMany`, `belongsTo`, `belongsToMany`, etc., and use meaningful names. Eager load with `with()` to avoid N+1; use `withCount()` when you only need counts.
- **Queries**: Prefer Eloquent/query builder over raw SQL. Use scopes for reusable conditions. Keep complex queries in the model or a dedicated repository/service.
- **Migrations**: One logical change per migration. Use descriptive names. Prefer `$table->foreignId()->constrained()->cascadeOnDelete()` and indexes for foreign keys and frequently filtered columns.
- **Soft deletes**: Use `SoftDeletes` trait and `deleted_at` when deletes should be reversible.

## Controllers & HTTP

- **Single responsibility**: Keep controllers thin. Delegate business logic to Form Requests, actions, or services. Return consistent response shapes (JSON/resources or redirects with messages).
- **Validation**: Use Form Request classes for non-trivial input. Validate in the request’s `rules()` and authorize in `authorize()` when applicable.
- **Dependency injection**: Type-hint repositories, services, and Laravel facades in constructors or method signatures; avoid `new` for injectable dependencies.
- **October backend**: Backend controllers often use `ListController`, `FormController`, or custom behaviors. Register routes and menus in the plugin registration.

## Services & architecture

- **Services**: Put reusable business logic in service classes (e.g. `Author\Plugin\Services\SomethingService`). Inject them into controllers or components.
- **Events & listeners**: Use events for decoupled side effects; keep listeners small and focused.
- **Config**: Use `config()` and env in config files; avoid reading `env()` outside config. Cache config in production.

## Security

- **Mass assignment**: Only allow safe attributes in `$fillable` (or use `$guarded` carefully). Never pass user input directly into `create()` or `update()` without validation and allow-list.
- **CSRF**: Laravel/October handle CSRF for web forms; ensure tokens are present in forms and API exemptions are minimal and intentional.
- **Authorization**: Use policies or `authorize()` in controllers; check permissions in October backend with `BackendAuth` and plugin permissions.

## Performance & ops

- **Caching**: Use Cache facade or Redis for expensive computations or repeated queries. Set sensible TTLs and keys.
- **Queues**: Offload slow or external tasks to queues; use jobs and appropriate drivers (database, Redis, etc.).
- **Logging**: Use the Log facade; avoid dumping sensitive data. Use appropriate log levels.

## Conventions in this project

- OctoberCMS sits on Laravel; follow both October plugin structure and Laravel patterns (Eloquent, validation, services). Use `php artisan` for migrations and October-specific commands (e.g. `october:install`).
