<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $media = Media::create([
            'title' => 'Sample Quiz',
            'id' => 487
        ]);

        $media->questions()->create(['question' => 'What color is the sun?'])
            ->options()->createMany([
                ['id' => 100 ,'option_text' => 'Blue'],
                ['option_text' => 'Yellow', 'is_correct' => 1],
                ['option_text' => 'Red'],
            ]);

        $media->questions()->create(['question' => 'Capital of France?'])
            ->options()->createMany([
                ['option_text' => 'Toulouse'],
                ['option_text' => 'Paris', 'is_correct' => 1],
                ['option_text' => 'Lyon'],
            ]);

        $media->questions()->create(['question' => 'NBA: A stands for...?'])
            ->options()->createMany([
                ['option_text' => 'Association', 'is_correct' => 1],
                ['option_text' => 'America'],
                ['option_text' => 'Act'],
            ]);


        /**
         * ------------------------------------------------------------------
         * 
         * ------------------------------------------------------------------
         */
        $media = Media::create([
            'title' => 'Another Sample Quiz ',
            'id' => 623
        ]);

        $media->questions()->create(['question' => 'What is the colour of the ocean?'])
            ->options()->createMany([
                ['option_text' => 'Blue', 'is_correct' => 1],
                ['option_text' => 'Yellow'],
                ['option_text' => 'Pink'],
                ['option_text' => 'Green'],
            ]);

        $media->questions()->create(['question' => 'Is fire hot?'])
            ->options()->createMany([
                ['option_text' => 'Yes', 'is_correct' => 1],
                ['option_text' => 'No'],
            ]);

        $media->questions()->create(['question' => 'How many wheels does a car have?'])
            ->options()->createMany([
                ['option_text' => '4', 'is_correct' => 1],
                ['option_text' => '128'],
                ['option_text' => '16'],
                ['option_text' => '2'],
            ]);

        $media->questions()->create(['question' => '247 is greater than 987'])
            ->options()->createMany([
                ['option_text' => 'True'],
                ['option_text' => 'False', 'is_correct' => 1],
            ]);
    }
}
