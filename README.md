# OctoberCMS Boilerplate

This repository provides a **boilerplate** for building projects with **OctoberCMS**. It is pre-configured with a modern frontend workflow, including **TailwindCSS**, **Alpine.js**, and a basic **JavaScript** and **SASS** folder structure. The goal is to streamline development by offering a ready-to-use setup, saving time on initial configuration.

[October](https://octobercms.com) is a Content Management System (CMS) and web platform whose sole purpose is to make your development workflow simple again. It was born out of frustration with existing systems.

> *Please note*: October is open source but it is not free software. A license with a small fee is required for each website you build with October CMS.

## Features

- **OctoberCMS**: A Laravel-based CMS framework for building modern websites and applications.
- **Basic JavaScript & SASS structure**: Organized folder structure for custom frontend development.
- **TailwindCSS**: A utility-first CSS framework for rapid UI development.
- **Alpine.js**: A minimal, declarative JavaScript framework for adding interactivity.
- **Prettier**: A code formatter to ensure consistent code styling across the project.
- **ESLint**: A linter to help identify and fix potential JavaScript issues and enforce coding standards.
- **Vite**: A fast and optimized build tool for modern web projects.

### Plugins & Custom Features

- **Builder Plugin**: [Builder](https://github.com/rainlab/builder-plugin) is a visual development tool. It shortens plugin development time by automating common development tasks and makes programming fun again. With Builder you can create a fully functional plugin scaffold in a matter of minutes.
- **Custom WebP Plugin**: Automatically converts images uploaded via the Media Finder into WebP format for improved performance and reduced file sizes.
- **Frontend Settings Plugin**: A custom plugin for easily managing common frontend elements e.g. Logo, Favicon, Social media links...
- **Simple Cookies & GDPR Plugin**: A plugin to handle cookie consent and GDPR compliance, offering a customizable cookie banner for your site.

## Installation

Clone the repository:
```bash
git clone https://github.com/myzo-dev/octobercms-boilerplate.git
```
Navigate to the project directory:
```bash
cd octobercms-boilerplate
```
Install dependencies:
```bash
composer install
php artisan october:install
```

## Building assets

To build assets run these commands in `theme/{your-theme-name}` folder

```bash
npm install
npm run dev
```

<br>

To include the _Vite Dev Server_ assets in your dev environment, set the `APP_ENV` variable in your `.env` file to either `local` or `dev`. Once set, the _Vite Dev Server_ will automatically be included.
For more detailed information, refer to the [OctoberCMS Vite Plugin](https://github.com/OFFLINE-GmbH/oc-vite-plugin).

```env
APP_ENV: local # or dev
```

<br>

***Do not forget to set `APP_ENV` to `production` when done with development.***

## License

The October CMS platform is licensed software, see [End User License Agreement](./LICENSE.md) (EULA) for more details.
