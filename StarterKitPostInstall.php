<?php

class StarterKitPostInstall
{
    public function handle($console)
    {
        $this->run($console, '[ -d .git ] || git init');
        $this->run($console, 'git submodule add -f git@gitlab.com:ptchr-projects/statamic-basics.git packages/ptchr/statamic-basics && (cd packages/ptchr/statamic-basics && git checkout v1)');
        // Make sure your main PHP version is set correctly in Herd.
        $this->run($console, 'composer config repositories.ptchr path "./packages/ptchr/*"');
        $this->run($console, 'composer require ptchr/statamic-basics:^1.0');
        $this->run($console, 'php artisan install:api --without-migration-prompt');
    }

    protected function run($console, string $command)
    {
        $console->line("Running `$command`");
        $response = shell_exec($command);
        $console->line("Ran `$command`:\n$response");
    }
}

