<?php

namespace App\Http\Livewire\Quiz;

use Livewire\Component;


use App\Models\QuizQuestion;

class CreateQuestionForm extends Component

{

    public $question;
    public $options = [];
    public $mid; 
    public $saved = FALSE;

    protected $rules = [
        'question' => 'required',

        'options' => ['required', 'array'],
        'options.*.option_text' => 'required:max:255',
        'options.*.is_correct' => 'numeric',

    ];

    protected $messages = [
        'options.*.option_text.required' => 'Question Options cannot be empty.',
    ];

    public function addEmptyRow()
    {
        $this->options[] = '';
    }

    public function removeQuestionOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function updated()
    {
        $this->saved = FALSE;
    }

    public function save()
    {

        $validatedData = $this->validate();
        
        $q = QuizQuestion::create([
            'question' => $validatedData['question'],
            'media_id' => $this->mid,
        ]);
        
        foreach ($this->options as $answerOption) {
            $q->options()->create($answerOption);
        }

        $this->reset('question');
        $this->reset('options');
        $this->emit('closeModal');
        $this->saved = TRUE;
    }

}
