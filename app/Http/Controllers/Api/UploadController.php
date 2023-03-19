<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Car;
use App\Models\Maintenance;
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



        if (($request->type == "car") && isset($request->id)) {

            $object = Car::find($request->id);
        } elseif (($request->type == "maintenance") && isset($request->id)) {

            $object = Maintenance::find($request->id);
        } else {
            return response()->json(["status" => "Error type document or id"]);
        }

        $file = $request->file('file');
        $name = $request->type . "_" . $request->id . "_" . $file->hashName();

        $upload = Storage::put("documents/" . $request->type . "/" . $name, file_get_contents($file));



        $document = Document::create(
            attributes: [
                'name' => "{$name}",
                'file_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'path' => "documents/{$request->type}",
                'disk' => config('app.uploads.disk'),
                'file_hash' => "hash_temporal" /*hash_file(
                    config('app.uploads.hash'),
                    storage_path('documents\'.$request->type.'\'.$name),
                )*/,
                'collection' => $request->type,
                'size' => $file->getSize(),
            ]
        );

        $object->documents()->attach($document);

        return response()->json(["file" => $file, "status" => "ok"]);
    }
}
