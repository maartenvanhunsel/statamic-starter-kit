<p align="center"><img src="https://statamic.com/assets/branding/Statamic-Logo+Wordmark-Rad.svg" width="400" alt="Statamic Logo" /></p>

Statamic is the flat-first, Laravel + Git powered CMS designed for building beautiful, easy to manage websites.

# [PROJECT_NAME] - Statamic

## How to install
1. `git clone [PROJECT_SSH_URL]`
2. Init submodules
```bash
git submodule update --init
```
3. Copy and update `.env` with credentials.
```bash
cp .env.example .env
```
4. Generate `APP_KEY`
```bash
php artisan key:generate
```
5. Install dependencies
```bash
yarn install && yarn build
composer install
```
6. Create a valet link (optional)
```bash
valet link {project_name}
# Navigate to http://{project_name}.test/cp
```
7. Et voilà.

## Important Links

- [Statamic Main Site](https://statamic.com)
- [Statamic Documentation][docs]
- [Statamic Core Package Repo][cms-repo]
- [Statamic Migrator](https://github.com/statamic/migrator)
- [Statamic Discord][discord]

[docs]: https://statamic.dev/
[discord]: https://statamic.com/discord
[contribution]: https://github.com/statamic/cms/blob/master/CONTRIBUTING.md
[cms-repo]: https://github.com/statamic/cms
