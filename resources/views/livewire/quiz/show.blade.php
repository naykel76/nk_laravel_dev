<div>

    @if(is_null($score))

        @foreach($questions as $question)

            <div class="bx {{ $question->incorrect ? 'bdr-red' : '' }}">

                <h4>Question {{ $loop->iteration }}: {{ $question->question }}</h4>

                @foreach($question->options as $option)

                    <input wire:click="addAnswer({{ $question->id }}, {{ $option->id }})" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}" type="radio" />

                    <label for="option-{{ $option->id }}"> {{ $option->option_text }} </label> <br>

                @endforeach

            </div>

        @endforeach

        <div class="mt">

            <button wire:click="submitQuiz()" class="btn primary" {{ !$canSubmit ? 'disabled' : '' }}>Submit Quiz</button>

        </div>

    @else

        <h4 class="text-xl">Quiz finished!</h4>
        <p>Your result: <b>{{ $this->score }}</b> / {{ $questions->count() }}.</p>

        @foreach($questions as $question)

            <div class="bx {{ $question->isCorrect ? 'bx danger-light' : '' }}">

                <h4>Question {{ $loop->iteration }}: {{ $question->question }}</h4>

                @foreach($question->options as $option)

                
                    <input name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}" {{ $option->checked ? 'checked' : 'disabled' }} type="radio" />

                    <label for="option-{{ $option->id }}" class="no-click"> {{ $option->option_text }} </label> <br>

                @endforeach

            </div>

        @endforeach

    @endif

</div>
