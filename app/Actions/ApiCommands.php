<?php

namespace App\Actions;

use Illuminate\Support\Arr;
use Symfony\Component\Process\Process;

class ApiCommands
{
    protected $path;

    public function __construct()
    {
        $this->path = config('api.relative_path');
        if (!$this->path) {
            abort(1, 'Could not find API\'s relative path.');
        }
    }

    public function migrateFresh($output = true)
    {
        $this->run('php artisan migrate:fresh --force', $output);
    }

    public function websiteTesting($output = true)
    {
        $this->run(
            [
                'php artisan migrate:fresh --force',
                'php artisan db:seed --class=Domains\\Tags\\Database\\Seeders\\TagsTableSeeder',
                'php artisan db:seed --class=Domains\\Links\\Database\\Seeders\\LinksTableSeeder',
            ],
            $output
        );
    }

    public function run($command, $output = true)
    {
        foreach (Arr::wrap($command) as $command) {
            $process = new Process(
                explode(' ', $command),
                base_path($this->path)
            );
            $process->run();
            if ($output) {
                echo $process->getOutput();
            }
        }
    }
}
