<?php

namespace App\Service;



use League\Glide\Urls\UrlBuilder;
use League\Glide\Urls\UrlBuilderFactory;

class ImagePathGenerator
{
    private UrlBuilder $urlBuilter;

    public function __construct(string $signkey)
    {
        $this->urlBuilter = UrlBuilderFactory::create('/img/', $signkey);
    }

    public function generate(string $path, int $width, int $height):string
    {
        return  $this->urlBuilter->getUrl($path, ['w' => $width, 'h' => $height, 'fit' => 'crop']);
    }
}