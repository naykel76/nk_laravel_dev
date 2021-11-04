@extends('gotime::layouts.' . config('naykel.template'))

@section('content')

<div class="pxy bdr-blue bdr5">

    <livewire:quiz.take-quiz mid="{{ $mid }}" />

</div>

@endsection
