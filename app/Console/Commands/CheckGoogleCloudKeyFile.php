<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckGoogleCloudKeyFile extends Command
{
    protected $signature = 'check:google-cloud-key-file';
    protected $description = 'Check if Google Cloud key file exists';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $keyFilePath = env('GOOGLE_CLOUD_KEY_FILE');

        if (!$keyFilePath) {
            $this->error("Environment variable GOOGLE_CLOUD_KEY_FILE is not set");
            return;
        }

        $this->info("Checking file at path: $keyFilePath");

        if (file_exists($keyFilePath)) {
            $this->info("Google Cloud key file exists at: $keyFilePath");
        } else {
            $this->error("Google Cloud key file does not exist at: $keyFilePath");
        }
    }
}
