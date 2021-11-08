<div>
    <button wire:click.prevent="$toggle('addOption')" class="primary">
        <x:gotime::icon icon="plus" text="Add Option" />
    </button>
    <div>  <small class="txt-red">You cannot edit a newly created options (bug), refresh the page and re-enter the edit question option.</small></div>

    <table class="table fullwidth mt">

        <thead>
            <tr>
                <th class="">Question Option</th>
                <th class="tac w100">Is Correct</th>
                <th class="tac w150">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($options as $index => $option)

                <tr>

                    <td>

                        @if($editedIndex === $index || $editedField === $index . '.option_text')
                            <x-formit::input wire:model.defer="options.{{ $index }}.option_text" />
                        @else
                            {{ $option['option_text'] }}
                        @endif

                    </td>

                    <td class="tac">

                        @if($editedIndex === $index || $editedField === $index . '.is_correct')
                            <x-formit::input wire:model.defer="options.{{ $index }}.is_correct" class="tac" />
                        @else
                            {{ $option['is_correct'] }}
                        @endif

                    </td>

                    <td class="tac">

                        @if($editedIndex === $index || (isset($editedField) && (int)(explode('.',$editedField)[0]) === $index))
                            <button wire:click.prevent="save({{ $index }})" class="btn sm primary"> Save </button>
                        @else
                            <button wire:click.prevent="edit({{ $index }})" class="btn sm success"> Edit </button>
                        @endif

                        <button class="btn sm danger" wire:click.prevent="delete({{ $option['id'] }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"> Delete </button>

                    </td>

                </tr>

            @endforeach

            @if($addOption)
                <tr>

                    <td>
                        <x-formit::input wire:model.defer="option_text" for="option_text" class="fullwidth" />
                    </td>

                    <td class="tac">
                        <x-formit::input wire:model.defer="is_correct" for="is_correct" class="fullwidth tac" />
                    </td>

                    <td class="tac">
                        <button wire:click="saveOption()" class="btn primary">Save</button> <br>
                        <button disabled class="btn mt-025">Cancel</button>
                    </td>

                </tr>

                

            @endif

        </tbody>

    </table>

  

</div>
