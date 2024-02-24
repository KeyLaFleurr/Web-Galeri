<?php

namespace App\Listeners;

use App\Events\PostDeleting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeletePostImage
{
    public function __construct()
    {
        //
    }

    public function handle(PostDeleting $event)
    {
        // Hapus file gambar terkait dengan Post
        if ($event->post->featured_image) {
            \Storage::disk('public')->delete($event->post->featured_image);
        }
    }
}
