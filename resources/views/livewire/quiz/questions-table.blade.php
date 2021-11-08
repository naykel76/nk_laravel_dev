<div>

    <button wire:click="create" class="btn primary mt">
        <x:gotime::icon icon="plus" text="Add New Question" />
    </button>

    <table class="table fullwidth mt">

        <thead>
            <tr>
                <th class="">Question</th>
                <th class="tac w150">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($questions as $q)
                <tr>
                    <td>
                        {{ $q->question }}
                    </td>
                    <td class="tac">
                        <button class="btn success sm" wire:click.prevent="edit({{ $q->id }})">Edit
                        </button>
                        <button class="btn danger sm" wire:click.prevent="delete({{ $q->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No questions found.</td>
                </tr>
            @endforelse

        </tbody>

    </table>


    <div class="@if (!$showModal) hidden @endif flex ha-c va-c overlay">

        <div class="bx light" style="min-width: 50%; max-width: 80%;">

            @if(!$qid)

                <livewire:quiz.create-question-form mid="{{ $mid }}" />

            @else

                <form wire:submit.prevent="save">

                    @if($editMe)
                        <x-formit::input wire:model.defer="question.question" for="question.question" />
                        <div class="txt-red tar">To cancel update please refresh the page</div>
                        <div class="mt tar">
                            <button wire:click.prevent="$toggle('editMe')" class="btn primary" type="submit"> Save Changes </button>
                            <button disabled class="btn" type="submit"> Cancel </button>
                        </div>
                    @else
                        <p class="lead"><strong>Question:</strong> {{ $question->question }}
                            <small><a wire:click.prevent="$toggle('editMe')" href="#" class="ml">edit</a></small>
                        </p>
                    @endif

                </form>

                <hr>
                
                <livewire:quiz.edit-question-options qid="{{ $qid }}" />

                <div class="mt tar">
                    <button wire:click="$emit('closeModal')" class='btn mal nm'>Close</button>
                </div>

            @endif

        </div>

    </div>

</div>
