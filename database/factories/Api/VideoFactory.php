<?php

namespace Database\Factories\Api;

use App\Models\Api\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'path' => 'videos/' . $this->faker->uuid . '.mp4',
            'url' => 'http://localhost/storage/videos/' . $this->faker->uuid . '.mp4',
        ];
    }
}
