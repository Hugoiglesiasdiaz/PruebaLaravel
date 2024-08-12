<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OptimizeProjectImage implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProjectSaved $event): void
    {
        //Optimiza la imagen con el paquete intervention/image
    }
}
