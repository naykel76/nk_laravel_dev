<div>

    <table>

        <thead>

            <tr>
                <th>Title</th>
                <th>Date</th>
                <th></th>
            </tr>

        </thead>

        <tbody>

            @forelse($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->title }} </td>
                    <td> {{ $transaction->date_for_humans }} </td>
                    <td> <button wire:click="edit({{ $transaction->id }})">Edit</button> </td>
                </tr>
            @empty
                <tr>
                    none found!
                </tr>
            @endforelse

        </tbody>

    </table>

    <form wire:submit.prevent="save">

        <x-formit::input wire:model="editing.title" for="editing.title" label="Title" placeholder="Title" />

        <x-formit::date-picker wire:model="editing.date_for_editing" for="editing.date_for_editing" label="Date" />

        <x-date-picker wire:model="editing.date_for_editing" id="date_for_editing" />

        <button type="submit">Save</button>

    </form>

</div>
