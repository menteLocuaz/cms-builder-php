# CMS Builder PHP — Agent Guide

## Project overview

Plain PHP CMS (early stage, install wizard only). No framework — minimal custom MVC. PostgreSQL via PDO. Tailwind CSS v4. Frontend vendor assets in `public/plugins/` (jQuery, Alpine.js, Font Awesome, etc.).

## Entrypoint & routing

- `public/index.php` — loads dotenv, defines `BASE_URL`, `ASSETS`, `APP` constants, includes routes.
- `public/.htaccess` — Apache rewrite all non-file requests → `index.php`.
- `app/Routes/routes.php` — session-based router. If `$_SESSION['admin']` is set, routes to `DashboardController`; otherwise serves `TemplateController::Index()` (install/login pages).
- `app/Core/View.php` — `View::render($view, $data)` uses `extract()` + `require`; `$data` keys become template variables.

## Key commands

| Command | What it does |
|---|---|
| `composer serve` | `php -S localhost:6060 -t public` + `npx tailwindcss --watch` (via `serve.sh`) |
| `composer tailwind:dev` | `npx tailwindcss -i ./public/css/input.css -o ./public/css/style.css --watch` |
| `composer tailwind:build` | Same but with `--minify` |

CSS source is `public/css/input.css` (currently just `@import "tailwindcss"`). Output is `public/css/style.css`.

## Database

- PostgreSQL only (PDO driver `pgsql`). Config from `.env`: `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
- Connection via `Arancamon\CmsBuilderPhp\Database\Connection::connect()`.
- Migrations are PHP classes in `app/Database/Migrations/` with an `up()` method. Run inline from `InstallController::install()` inside a transaction, not via a CLI command.
- Tables: `admins`, `pages`, `settings`, `columns`, `modules`.

## Code conventions

- Namespace root: `Arancamon\CmsBuilderPhp\` → `app/` (PSR-4).
- `strict_types=1` on most files (except routes and TemplateController).
- Views use `require` + `extract` pattern. View data passed as an associative array to `View::render()`.
- Layout parts: `header.php`, `footer.php`, `scripts.php` are `require`d by `master.php`. Conditional JS plugins gated by view data flags (`$useFormsJs`, `$useChartJs`, `$useQuill`, etc.).
- Component files in `app/Views/Components/` are `include`d with local variables set before each include.
- Controllers and migrations must call `Connection::connect()` to get a PDO instance.

## Empty directories (do not expect content)

`app/Ajax/`, `bootstrap/`, `config/`, `storage/`, `tests/`, `docs/` — all empty placeholders.

`app/Models/` contains Repositories (`AdminRepository`, `ColumnRepository`, `ModuleRepository`, `PageRepository`, `Repository.php`). `app/Services/` contains service classes (`AdminService`, `ColumnService`, `ModuleService`, `PageService`, `CurlController.php`).

## Testing

No test framework configured. `tests/` directory is empty. `package.json` `"test"` is a placeholder.

## Notable

- `.env` may contain live credentials — avoid committing changes to it.
- No CI/CD, lint, or typecheck config exists.
- The router is a stub — any new routes must be added to `app/Routes/routes.php`.
- Frontend plugins referenced in `scripts.php` must exist under `public/plugins/` (currently absent from repo — only listed as dependencies in view).
