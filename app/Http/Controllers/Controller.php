<?php

namespace App\Http\Controllers;

use App\Providers\DropboxServiceProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Spatie\Dropbox\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Client $client) {

        $allFiles = collect(Storage::disk('dropbox')->files('arquivo'))->map(function($file) {
            return Storage::disk('dropbox')->url($file);
        });

        return view('upload', [
            'allFiles' => $allFiles,
        ]);
    }

    public function store(Request $request){
        $file = $request->file('arquivo');
        Storage::disk('dropbox')->put('arquivo',$file);

        return back();
    }
}
