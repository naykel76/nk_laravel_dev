<?php

namespace App\Http\Livewire\Quiz;


use App\Models\QuizQuestion;
use Livewire\Component;

class QuestionsTable extends Component

{
    public $editQuestion = false;
    public $showModal = false;
    public $qid;
    public $question;
    public $mid;

    protected $listeners = ['closeModal' => 'close'];

    protected $rules = [
        'question.question' => 'required',
    ];

    public function create()
    {
        $this->showModal = true;
    }

    public function edit($qid)
    {
        $this->showModal = true;
        $this->qid = $qid;
        $this->question = QuizQuestion::find($qid);
    }

    /**
     * This function takes care of both saving and updating the quiz question
     */
    public function save()
    {
        $this->validate();

        if (!is_null($this->qid)) {
            $this->question->save();
        } else {
            dd('you should not be able to see this, please contact nathan');
        }

    }

  

    public function cancel()
    {
        $this->editQuestion = false;
        $this->qid = null;
    }

    public function close()
    {
        $this->showModal = false;
        $this->editQuestion = false;
        $this->qid = null;
    }

    public function delete($qid)
    {
        $question = QuizQuestion::find($qid);
        if ($question) {
            $question->delete();
        }
    }

    public function render()
    {
        return view('livewire.quiz.questions-table', [
            'questions' => QuizQuestion::where('media_id', $this->mid)->get()
        ]);
    }
}
