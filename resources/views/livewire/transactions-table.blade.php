<div>

    <x-formit::input wire:model="search" for="search" placeholder="Search Transactions..." rowClasses="col-30 np" />

    <table class="fullwidth mt">

        <thead>

            <tr>
                <x-gotime::table.th class="tac w64"><input type="checkbox" /> </x-gotime::table.th>
                <x-gotime::table.th class="tac w100" sortable wire:click="sortBy('date')" :direction="$sortField === 'date' ? $sortDirection : null">Date</x-gotime::table.th>
                <x-gotime::table.th sortable wire:click="sortBy('title')" :direction="$sortField === 'title' ? $sortDirection : null">Title</x-gotime::table.th>
                <x-gotime::table.th class="tac w150" sortable wire:click="sortBy('amount')" :direction="$sortField === 'amount' ? $sortDirection : null">amount</x-gotime::table.th>
                <x-gotime::table.th class="tac w150" sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null">Status</x-gotime::table.th>
                <x-gotime::table.th class="tac w100" sortable wire:click="sortBy('expires_at')" :direction="$sortField === 'expires_at' ? $sortDirection : null">Expires</x-gotime::table.th>
                <x-gotime::table.th class="tac w100"></x-gotime::table.th>
            </tr>

        </thead>

        <tbody>

            @forelse($transactions as $transaction)

                <tr wire:loading.class.delay="txt-muted">
                    <td class="tac"> <input type="checkbox" /> </th>
                    <td class="tac">{{ $transaction->date }}</td>
                    <td>{{ $transaction->title }}</td>
                    <td class="tac w150">{{ $transaction->amount }}</td>
                    <td class="tac w150">{{ $transaction->status }}</td>
                    <td class="tac">{{ $transaction->expires_at ?? null}}</td>
                    <td><button disabled wire:click="edit('{{ $transaction->id }}')" class="link">edit</button></td>
                </tr>

            @empty

                <tr>
                    <td class="tac py txt-muted txt-lg" colspan="4">No transactions found.</td>
                </tr>

            @endforelse

        </tbody>

    </table>

    {{ $transactions->links('gotime::pagination.livewire') }}



</div>
