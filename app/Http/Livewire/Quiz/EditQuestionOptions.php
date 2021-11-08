<?php

namespace App\Http\Livewire\Quiz;

use App\Models\QuizOption;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Throwable;

class EditQuestionOptions extends Component

{

    public $editedIndex = null; // index of row to be edited
    public $editedField = null; // field to be edited
    public $addOption = false;
    public $qid; // question id pass when component is called
    public $option = []; // for adding new options
    public $options = []; // empty array, set on mount

    public $option_text = null; // outside of the $rules validation won't work with nested arrays
    public $is_correct = 0; // outside of the $rules validation won't work with nested arrays

    protected $rules = [
        'options.*.option_text' => ['required'],
    ];

    public function mount()
    {
        $this->options = QuizOption::where('question_id', $this->qid)->get()->toArray();
    }

    public function edit($someIndex)
    {
        $this->editedIndex = $someIndex;
    }


    public function save($someIndex)
    {
        $this->validate();

        $questionOption = $this->options[$someIndex] ?? NULL;

        if (!is_null($questionOption)) {
            optional(QuizOption::find($questionOption['id']))->update($questionOption);
        }

        $this->editedIndex = null;
        $this->editedField = null;
    }

    public function addOption()
    {
        $this->addOption = true;
    }


    /**
     * I had heaps of trouble getting validation to work correctly here,
     * so i have done what I can to make it work!
     * 
     * NK::BUG there is a bug where you cannot edit a newly created question
     * and it has something to do with the $editedIndex and edit function
     * 
     */
    public function saveOption()
    {
        $validatedData = $this->validate(
            [
                'option_text' => 'required',
                'is_correct' => 'sometimes:numeric',
            ],
            [
                'option_text.required' => 'The question option cannot be empty.',
                'is_correct.numeric' => 'Must be numeric'
            ]
        );

        $validatedData['question_id'] = $this->qid;
   
        QuizOption::create($validatedData);

        $this->option_text = null;
        $this->is_correct = null;
        $this->addOption = false;
        $this->options = QuizOption::where('question_id', $this->qid)->get()->toArray();
    }

    public function delete($questionOptionId)
    {
        $question = QuizOption::find($questionOptionId);

        if ($question) {
            $question->delete();
        }

        $this->options = QuizOption::where('question_id', $this->qid)->get()->toArray();
    }

    public function resetValues()
    {
        $this->qid = null;
    }
}
