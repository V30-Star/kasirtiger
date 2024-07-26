<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Superbalist\Flysystem\GoogleStorage\GoogleStorageAdapter;
use Google\Cloud\Storage\StorageClient;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('gcs', function ($app, $config) {
            $client = new StorageClient([
                'projectId' => $config['project_id'],
                'keyFilePath' => $config['key_file'],
            ]);

            $bucket = $client->bucket($config['bucket']);

            // Menggunakan path_prefix sebagai default
            $path = $config['path_prefix'] ?? 'default/path';
            if (env('APP_ENV') === 'production' && isset($config['path_prod'])) {
                $path = $config['path_prod'];
            }
            $adapter = new GoogleStorageAdapter($client, $bucket, $path);

            return new \League\Flysystem\Filesystem($adapter);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
