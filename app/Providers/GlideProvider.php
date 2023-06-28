<?php

namespace App\Providers;


use App\Service\ImagePathGenerator;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\Server;
use League\Glide\ServerFactory;
use League\Glide\Signatures\Signature;
use League\Glide\Signatures\SignatureFactory;

class GlideProvider extends  ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ImagePathGenerator::class, fn() => new ImagePathGenerator('GLIDE_KEY'));
        $this->app->singleton(Signature::class, fn () =>  SignatureFactory::create('GLIDE_KEY'));
        $this->app->singleton(Server::class, function (Application $app) {
            $filesystem = $app->get(Filesystem::class);
            return ServerFactory::create([
                'response' => new LaravelResponseFactory($app->get(Request::class)),
                'source' => $filesystem->getDriver(),
                'cache' => $filesystem->getDriver(),
                'cache_path_prefix' => '.cache/public/property',
                'source_path_prefix' => 'public/property/',
                'base_url' => 'img/property/',
            ]);
        });
    }
}