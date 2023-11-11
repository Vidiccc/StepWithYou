<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MoveImagesToPublic extends Command
{
    protected $signature = 'images:move-to-public';
    protected $description = 'Move images from storage to public directory';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sourceDirectory = storage_path('app/public/images');
        $destinationDirectory = public_path('images');

        if (!File::exists($destinationDirectory)) {
            File::makeDirectory($destinationDirectory, 0755, true);
        }

        File::copyDirectory($sourceDirectory, $destinationDirectory);

        $this->info('Images moved to public directory successfully.');
    }
}
