<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        // Puedes ajustar el número de elementos por página
        $perPage = $request->input('per_page', 10);
        $videos = Video::paginate($perPage);

        return response()->json($videos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,avi,mov|max:20480', // 20 MB máximo
        ]);

        if ($request->hasFile('video')) {
            // Guardar el archivo y obtener el path
            $path = $request->file('video')->store('videos', 'public');

            // Generar la URL pública
            $url = url(Storage::url($path));

            // Crear el registro en la base de datos
            $video = Video::create([
                'title' => $request->title,
                'description' => $request->description,
                'path' => $path,
                'url' => $url,
            ]);

            return response()->json($video, 201);
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }

    public function show(Video $video)
    {
        return response()->json($video);
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'video' => 'sometimes|file|mimes:mp4,avi,mov|max:20480', // 20 MB máximo
        ]);

        // Si hay un nuevo archivo de video, manejar la actualización
        if ($request->hasFile('video')) {
            // Eliminar el archivo anterior
            Storage::disk('public')->delete($video->path);

            // Guardar el nuevo archivo y obtener el path
            $path = $request->file('video')->store('videos', 'public');

            // Generar la nueva URL pública
            $url = url(Storage::url($path));

            // Actualizar el registro en la base de datos
            $video->update([
                'title' => $request->title,
                'description' => $request->description,
                'path' => $path,
                'url' => $url,
            ]);
        } else {
            // Solo actualizar los campos proporcionados
            $video->update($request->only(['title', 'description']));
        }

        return response()->json($video, 200);
    }

    public function destroy(Video $video)
    {
        // Eliminar el archivo de video del almacenamiento
        Storage::disk('public')->delete($video->path);

        // Eliminar el registro de la base de datos
        $video->delete();

        return response()->json(['message' => 'Video deleted successfully'], 200);
    }
}
