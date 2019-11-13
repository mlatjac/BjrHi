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
    }
}
