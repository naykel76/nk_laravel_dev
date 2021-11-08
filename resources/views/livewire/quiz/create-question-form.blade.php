<div>

    <form wire:submit.prevent="save">

        @csrf

        <div class="flex space-between">

            <div class="bx-title">Add New Question</div>

            <svg wire:click="$emit('closeModal')" class="wh24 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
            </svg>
        </div>

        <x-formit::textarea wire:model.defer="question" for="question" />

        <p class="mt-3">Add a minimium of two question options and add 1 point to the option that is correct.</p>

        <table class="table fullwidth mt-05">

            <thead>

                <tr>
                    <th>Question Option</th>
                    <th class="tac w100">Is Correct</th>
                    <th class="tac w100"></th>
                </tr>

            </thead>

            <tbody>

                @foreach($options as $index => $answerOption)

                    <tr>
                  
                        <td>
                            <input wire:model="options.{{ $index }}.option_text" name="options[{{ $index }}][option_text]" class="fullwidth {{ $errors->has( "options.$index.option_text" ) ? "bdr-red" : null }}" type="text">
                        </td>

                        <td class="tac">
                            <input wire:model="options.{{ $index }}.is_correct" name="options[{{ $index }}][is_correct]" class="fullwidth" type="number">
                        </td>

                        <td>
                            <button wire:click.prevent="removeQuestionOption({{ $index }})" class="btn danger">Delete</button>
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

        <div class="flex space-between">

            <button wire:click.prevent="addEmptyRow" class="primary">
                <x:gotime::icon icon="plus" text="Add Option" />
            </button>

            <input type="submit" value="Save All" class="cursor-pointer success" style="cursor: pointer;">

        </div>

    </form>

</div>
