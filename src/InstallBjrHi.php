<?php

namespace Mlatjac\BjrHi;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallBjrHi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjrhi:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs required languages resources for bilingual (en/fr) projects';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Installing BjrHi resources');
        // Move vendor/caouecs/laravel-lang/json/fr.json to resources/lang/fr.json
        File::copy(
            base_path('vendor/caouecs/laravel-lang/json/fr.json'),
            resource_path('lang/fr.json')
        );

        // Move vendor/caouecs/laravel-lang/fr/ * to resources/lang/fr
        File::copyDirectory(
            base_path('vendor/caouecs/laravel-lang/src/fr'),
            resource_path('lang/fr/')
        );

        // Move the controller
        File::copyDirectory(
            __DIR__.'/stubs/Controllers',
            base_path('app/Http/Controllers')
        );

        // Move a basic routes file
        File::copy(
            __DIR__.'/stubs/web.php',
            base_path('routes/web.php')
        );

        // Move all the views
        File::copyDirectory(
            __DIR__.'/stubs/views',
            resource_path('views')
        );

        // Move the migrations
        File::copyDirectory(
            __DIR__.'/stubs/migrations',
            base_path('database/migrations')
        );

        // Move the User model
        File::copy(
            __DIR__.'/stubs/User.php',
            app_path('User.php')
        );

        // Copy the front end configs

        // package.json
        File::copy(
            __DIR__.'/stubs/package.json',
            base_path('package.json')
        );

        // app.js
        File::copy(
            __DIR__.'/stubs/app.js',
            resource_path('js/app.js')
        );

        // bootstrap
        File::copy(
            __DIR__.'/stubs/bootstrap.js',
            resource_path('js/bootstrap.js')
        );

        // sass
        File::copyDirectory(
            __DIR__.'/stubs/sass',
            resource_path('sass')
        );
    }
}
