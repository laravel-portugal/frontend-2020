<?php

namespace App\Actions;

use Symfony\Component\Process\Process;

class ApiCommands
{
    public function migrateFreshSeed($output = true)
    {
        $path = config('api.relative_path');
        if (! $path) {
           abort(1, 'Could not find API\'s relative path.');
        }
        $process = new Process(['php', 'artisan', 'migrate:fresh', '--seed'], base_path($path));
        $process->run();
        if ($output) {
            echo $process->getOutput();
        }
    }
}
