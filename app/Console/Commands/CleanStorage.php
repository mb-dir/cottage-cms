<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class CleanStorage extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up storage files and subdirectories';


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clean {directory?}';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $directory = $this->argument('directory') ?? storage_path('app/public');

        if (File::exists($directory)) {
            File::cleanDirectory($directory);
            $this->info("$directory was cleaned up successfully");
        } else {
            $this->error("Directory was not found: $directory");
        }
    }
}
