# Statamic - Starter kit

The Statamic cms template makes it super easy to start a new project with a bunge of pre-defined settings. These settings are quite various and consist of fieldsets & blueprints, statamic settings, addons and many more.

## How to install

1. `statamic new {project_name} maartenvanhunsel/statamic-starter-kit`
2. `cp .env.example .env`
3. `php artisan key:generate`
4. `yarn install && yarn build`
5. `herd link {project_name}`
6. Navigate to `http://{project_name}/cp`
7. Update `README.md` and update placeholders with correct values.
```bash
cp README-template.md README.md
# Replace [PROJECT_NAME] and [PROJECT_SSH_URL] with the correct values.
rm README-template.md
```
10. Et voilà.

## What's inside?
See [statamic docs](https://nobears.atlassian.net/l/cp/PR0rD2YP) for more information.
