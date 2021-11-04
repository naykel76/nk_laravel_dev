<?php

namespace App\Http\Livewire\Quiz;

use App\Models\QuizOption;
use App\Models\QuizQuestion;
use Livewire\Component;

class TakeQuiz extends Component
{
    public $questions; // quiz questions from DB
    public $answers = []; // ['questionId => optionId']
    public $score = null;
    public $canSubmit = true;
    public $mid;

    public function mount()
    {
        $this->questions = QuizQuestion::where('media_id', $this->mid)->with('options')->get();
    }

    public function addAnswer($qid, $optionId)
    {
        $this->answers[$qid] = $optionId;

        // check if all questions are answers are the same to enable submit
        if (count($this->answers) == $this->questions->count()) {
            $this->canSubmit = true;
        }
    }

    public function submitQuiz()
    {
        if ($this->canSubmit) {

            $selectedOptions = $this->answers; // [ qid => selectedOptionId ]
            
            // array of [correctOptionId]
            $correctOptionIds = QuizOption::where('is_correct', true)
                ->whereIn('question_id', $this->questions->pluck('id'))
                ->pluck('id')
                ->toArray();

            $this->score = count(array_intersect($correctOptionIds, $selectedOptions));

            // check if the 'answers' are in the 'correct answers'
            $incorrect = array_diff($selectedOptions, $correctOptionIds); // structure [qid => selectedOptionId]

            foreach ($this->questions as $question) {

                if (key_exists($question->id, $incorrect)) {
                    $question['isCorrect'] = true;
                }

                foreach ($question->options as $o) {
                    if (in_array($o->id, $selectedOptions)) {
                        $o['checked'] = true;
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.quiz.take-quiz');
    }
}
