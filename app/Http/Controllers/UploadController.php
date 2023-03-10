<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
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
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UploadRequest $request): JsonResponse
    {
        Gate::authorize('upload-files');

        $file = $request->file('file');
        $name = $file->hashName(); // <----- Asignar yo el nombre para evitar problemas. Necesitaré ID coche.

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

        return response()->json("ok");

    }
}
