<?php

namespace App\Listeners;

use App\Events\ImageUploaded;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessImageUpload implements ShouldQueue
{
    public function handle(ImageUploaded $event)
    {
        // Execute your custom Artisan command here
        Artisan::call('images:move-to-public', [
            // Pass any necessary arguments or options here
        ]);
    }
}
