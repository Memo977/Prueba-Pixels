<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TranslateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $jobListing;

    public function __construct($jobListing)
    {
        $this->jobListing = $jobListing;
    }

    public function handle()
    {
        // Lógica para traducir el listado de trabajos
        logger('Translating job listing: ' . $this->jobListing->title);
        // Aquí iría la lógica real de traducción (por ejemplo, usando una API)
    }
}