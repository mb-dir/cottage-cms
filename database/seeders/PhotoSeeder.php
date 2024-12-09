<?php

namespace Database\Seeders;


use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;


class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('storage:clean');

        $sourceDir = public_path('photos/seeder');
        $targetDir = public_path('storage/photos');

        if (! File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        $files = File::files($sourceDir);

        foreach ($files as $file) {
            $targetPath = $targetDir . '/' . $file->getFilename();

            File::copy($file->getPathname(), $targetPath);

            $relativePath = 'photos/' . $file->getFilename();

            Photo::create([
                'src' => $relativePath,
            ]);
        }

        $this->command->info('Photos have been seeded successfully.');
    }
}
