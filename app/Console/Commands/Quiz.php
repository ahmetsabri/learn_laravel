<?php

namespace App\Console\Commands;

use App\Models\Question;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;
use function Laravel\Prompts\select;

class Quiz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:quiz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'do a quiz';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $alreadyUsedQuestion = [];
        $question = $this->pickQuestion($alreadyUsedQuestion);
        $alreadyUsedQuestion[] = $question->id;

        $score = 0;

        while ($question) {

            $isCorrect = $this->selectAnswer($question);
            if ($isCorrect) {
                $score++;
            }

            $question = $this->pickQuestion($alreadyUsedQuestion);
            if (! $question) {
                break;
            }
            $alreadyUsedQuestion[] = $question->id;
        }

        info("score is : $score out of ".count($alreadyUsedQuestion));
    }

    public function pickQuestion(array $exculdedQuestions): ?Question
    {
        return Question::whereNotIn('id', $exculdedQuestions)->inRandomOrder()->first()?->load('answers');
    }

    public function selectAnswer(Question $question)
    {
        $answers = $question->answers;

        $selectedAnswer = select($question->question, $answers->pluck('answer', 'id'));

        return $answers->filter(fn ($answer) => $answer->id == $selectedAnswer)->first()->is_correct;

    }
}
