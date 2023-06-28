<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Glide\Server;
use League\Glide\Signatures\Signature;
use League\Glide\Signatures\SignatureException;
use Symfony\Component\HttpFoundation\StreamedResponse;



class ImageController extends Controller
{
    /**
     * @throws SignatureException
     */
    public function show(Server $server, Request $request, string $path, Signature $signature): StreamedResponse
    {
        $signature->validateRequest($request->path(), $request->all());
        return $server->getImageResponse($path, $request->all());
    }
}
