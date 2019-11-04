<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use TusPhp\Tus\Server;

class FileController extends Controller
{
    public function files()
    {
        $server = new \TusPhp\Tus\Server(); // Leave empty for file based cache
        $server->setUploadDir('http://localhost:8080/uploaded/');
        $response = $server->serve();
        $response->send();
        exit(0);
    }
}