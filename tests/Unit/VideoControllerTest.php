<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Api\Video;

class VideoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_videos()
    {
        // Crear videos de prueba
        Video::factory()->count(5)->create();

        // Realizar una solicitud GET a la ruta index
        $response = $this->getJson('/api/videos');

        // Verificar que la respuesta sea exitosa y tenga los videos paginados
        $response->assertStatus(200)
            ->assertJsonStructure([
                'current_page',
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'description',
                        'path',
                        'url',
                        'created_at',
                        'updated_at'
                    ]
                ],
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active'
                    ]
                ],
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total'
            ]);
    }

    public function test_can_create_video()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('video.mp4', 20000, 'video/mp4');

        $response = $this->postJson('/api/videos', [
            'title' => 'Test Video',
            'description' => 'Test Description',
            'video' => $file,
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'title',
                'description',
                'path',
                'url',
                'created_at',
                'updated_at'
            ]);

        // Verificar que el archivo fue almacenado
        Storage::disk('public')->assertExists('videos/' . $file->hashName());
    }

    public function test_can_show_video()
    {
        $video = Video::factory()->create();

        $response = $this->getJson('/api/videos/' . $video->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $video->id,
                'title' => $video->title,
                'description' => $video->description,
                'path' => $video->path,
                'url' => $video->url,
            ]);
    }

    public function test_can_update_video()
    {
        Storage::fake('public');

        $video = Video::factory()->create();

        $file = UploadedFile::fake()->create('video.mp4', 20000, 'video/mp4');

        $response = $this->putJson('/api/videos/' . $video->id, [
            'title' => 'Updated Title',
            'video' => $file,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $video->id,
                'title' => 'Updated Title',
            ]);

        // Verificar que el archivo anterior fue eliminado y el nuevo fue almacenado
        Storage::disk('public')->assertMissing($video->path);
        Storage::disk('public')->assertExists('videos/' . $file->hashName());
    }

    public function test_can_delete_video()
    {
        Storage::fake('public');

        $video = Video::factory()->create();

        // Almacenar el archivo de video
        Storage::disk('public')->put($video->path, 'Contenido del video');

        $response = $this->deleteJson('/api/videos/' . $video->id);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Video deleted successfully',
            ]);

        // Verificar que el archivo fue eliminado
        Storage::disk('public')->assertMissing($video->path);
    }
}
