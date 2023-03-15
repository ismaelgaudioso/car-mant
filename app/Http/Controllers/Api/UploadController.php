<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use App\Models\Document;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {  
      
        //Gate::authorize('upload-files');
        dd($request["file"]);
        die("");

        $file = $request->file('file');
        $name = $file->hashName(); // <----- Asignar yo el nombre para evitar problemas. Necesitaré ID coche.

        return response()->json(["file"=>$file,"status" => "ok"]);

        $upload = Storage::put("documents/{$name}", $file);

        Document::query()->create(
            attributes: [
                'name' => "{$name}",
                'file_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'path' => "documents/{$name}",
                'disk' => config('app.uploads.disk'),
                'file_hash' => hash_file(
                    config('app.uploads.hash'),
                    storage_path(
                        path: "documents/{$name}",
                        ),                
                    ),
                'collection'=> $request->get('collection'),
                'size' => $file->getSize(),
            ]
        );

        return response()->json(["file"=>$file,"status" => "ok"]);

    }

  
}
