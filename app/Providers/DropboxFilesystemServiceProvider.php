<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Srmklive\Dropbox\Client\DropboxClient;
use Srmklive\Dropbox\Adapter\DropboxAdapter;

use Illuminate\Filesystem\FilesystemAdapter;

class DropboxFilesystemServiceProvider extends ServiceProvider
{

    //app key, app secret, リフレッシュトークンから短期アクセストークンを取得する関数
    private function get_short_lived_access_token($config)
    {
        $ch = curl_init('https://api.dropbox.com/oauth2/token');
        $options = array(
            CURLOPT_POSTFIELDS => 'grant_type=refresh_token&refresh_token=' . $config['refresh_token'],
            CURLOPT_USERNAME => $config['key'],
            CURLOPT_PASSWORD => $config['secret'],
            CURLOPT_RETURNTRANSFER => true
        );
        
        curl_setopt_array($ch, $options);
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        $short_lived_access_token = $response->access_token;
        return $short_lived_access_token;
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('dropbox', function ($app, $config) {
            $adapter = new DropboxAdapter(new DropboxClient(
                $this->get_short_lived_access_token($config)
            ));

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
