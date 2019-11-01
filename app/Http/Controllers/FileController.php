<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('file');
    }

    public function upload(Request $request)
    {
        $server   = new \TusPhp\Tus\Server('redis'); // Leave empty for file based cache
        $response = $server->serve();

        $response->send();

        return redirect('/file');
    }
}