<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Api\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class VideoModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_video_creation()
    {
        $video = Video::create([
            'title' => 'Test Video',
            'description' => 'Test Description',
            'path' => 'videos/test.mp4',
            'url' => 'http://localhost/storage/videos/test.mp4',
        ]);

        $this->assertDatabaseHas('videos', [
            'title' => 'Test Video',
            'description' => 'Test Description',
            'path' => 'videos/test.mp4',
            'url' => 'http://localhost/storage/videos/test.mp4',
        ]);
    }

    public function test_video_update()
    {
        $video = Video::create([
            'title' => 'Test Video',
            'description' => 'Test Description',
            'path' => 'videos/test.mp4',
            'url' => 'http://localhost/storage/videos/test.mp4',
        ]);

        $video->update([
            'title' => 'Updated Test Video',
        ]);

        $this->assertDatabaseHas('videos', [
            'title' => 'Updated Test Video',
            'description' => 'Test Description',
            'path' => 'videos/test.mp4',
            'url' => 'http://localhost/storage/videos/test.mp4',
        ]);
    }

    public function test_video_deletion()
    {
        $video = Video::create([
            'title' => 'Test Video',
            'description' => 'Test Description',
            'path' => 'videos/test.mp4',
            'url' => 'http://localhost/storage/videos/test.mp4',
        ]);

        $video->delete();

        $this->assertDatabaseMissing('videos', [
            'title' => 'Test Video',
            'description' => 'Test Description',
            'path' => 'videos/test.mp4',
            'url' => 'http://localhost/storage/videos/test.mp4',
        ]);
    }

    public function test_video_file_storage()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('video.mp4', 20000, 'video/mp4');
        $path = $file->store('videos', 'public');
        $url = url(Storage::url($path));

        $video = Video::create([
            'title' => 'Test Video',
            'description' => 'Test Description',
            'path' => $path,
            'url' => $url,
        ]);

        // Verificar que el archivo fue almacenado
        Storage::disk('public')->assertExists($path);

        $this->assertEquals($video->url, $url);
    }
}

