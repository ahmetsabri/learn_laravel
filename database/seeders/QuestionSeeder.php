<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $question = Question::create([
            'question' => '1 + 1 = ',
        ]);

        $question->answers()->createMany([
            [
                'answer' => 2,
                'is_correct' => true,
            ],
            [
                'answer' => 1,
                'is_correct' => false,
            ],
            [
                'answer' => 0,
                'is_correct' => false,
            ],
        ]);

        $question = Question::create([
            'question' => '2 x 2 = ',
        ]);

        $question->answers()->createMany([
            [
                'answer' => 4,
                'is_correct' => true,
            ],
            [
                'answer' => 5,
                'is_correct' => false,
            ],
            [
                'answer' => 0,
                'is_correct' => false,
            ],
        ]);

        $question = Question::create([
            'question' => '3 x 1.5 = ',
        ]);

        $question->answers()->createMany([
            [
                'answer' => 4.5,
                'is_correct' => true,
            ],
            [
                'answer' => 3,
                'is_correct' => false,
            ],
            [
                'answer' => 9,
                'is_correct' => false,
            ],
        ]);

    }
}
