---
name: octobercms
description: Use when editing OctoberCMS themes, plugins, Twig templates, CMS components, pages, layouts, partials, or any October-specific PHP/HTM code.
---

# OctoberCMS Best Practices

## Project structure

- **Themes**: Live under `themes/{themeName}/` with `theme.yaml`, `pages/`, `layouts/`, `partials/`, and optionally `assets/`, `content/`, `templates/`.
- **Plugins**: Live under `plugins/{author}/{plugin}/` with `Plugin.php`, `components/`, `models/`, `controllers/`, `views/`, and `lang/`.
- **Naming**: Use lowercase with hyphens for directory/file names where the CMS expects it (e.g. component partials). Follow PSR-4 for PHP classes and October’s naming for tables (e.g. `author_plugin_tablename`).

## Themes

- **theme.yaml**: Define `name`, `description`, `author`, `homepage`. The directory name is the theme ID.
- **Pages/Layouts/Partials**: Use `.htm` with Twig. Keep logic in components or backend; templates should stay presentational.
- **Asset paths**: Reference theme assets via `{{ 'assets/css/app.css'|theme }}` or the configured Vite base (e.g. `/themes/{themeName}/assets/build/`). Keep built assets in a dedicated folder (e.g. `assets/build/`) and source in `src/` if using Vite.
- **Theme name**: When renaming the theme, update the theme folder name, `vite.config.ts` (`themeName`), `theme.yaml`, and `.vscode/settings.json` (`octoberCode.prettierrcPath`).

## Plugins

- **Plugin.php**: Register components, models, back-end menus, permissions, and markup (Twig filters/functions) in the registration class. Use `registerComponents`, `registerMarkupTags`, `registerPermissions`, etc.
- **Components**: One PHP class per component under `components/`, with optional `default.htm` and partials in a subfolder named like the component (lowercase). Expose only the data and methods the view needs; avoid heavy logic in the component.
- **Component usage in Twig**: `{% component 'componentName' %}` with optional props. Prefer passing data from the page/layout or from the component’s `onRun` / `defineProperties` rather than hardcoding in the partial.
- **Database**: Use migrations and Eloquent models. Table names: `author_plugin_tablename`. Prefer model attributes and accessors over raw SQL in components.

## Twig (templates)

- **Escaping**: Output is auto-escaped. Use `|raw` only when necessary and only with trusted/sanitized content.
- **Logic**: Prefer filters and simple conditionals in Twig; move complex logic to components or PHP.
- **Reuse**: Use `{% partial 'partialName' %}` and `{% component %}`; avoid duplicating large blocks. Use `{% placeholder %}` and `{% default %}`, `{% put %}` / `{% placeholder %}` for layout slots.
- **Assets**: Use `|theme` for theme assets. For Vite-built assets, use the manifest or the same base path as in `vite.config.ts`.

## Security & quality

- **Input**: Validate and sanitize in the backend (request validation, model rules). Don’t rely on Twig for security.
- **Permissions**: Use `BackendAuth` and plugin permissions for admin features; check permissions in controllers and components.
- **Updates**: Keep October, plugins, and PHP dependencies up to date; test after upgrades.

## Conventions in this project

- Frontend build: Vite in the theme folder; `npm run dev` / `npm run build` from `themes/theme` (or the active theme). `APP_ENV=local` or `dev` enables the Vite dev server.
- Theme name must match in: theme folder name, `vite.config.ts` `themeName`, `theme.yaml`, and `.vscode/settings.json` Prettier path.
