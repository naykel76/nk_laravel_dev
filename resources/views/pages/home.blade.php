@extends('gotime::layouts.' . config('naykel.template'))

@section('content')

<nav class="mb">
    <a href="{{ route('quiz.show', 487) }}" class="btn mr">Test Quiz 487</a>
    <a href="{{ route('quiz.show', 623) }}" class="btn">Test Quiz 623</a>
</nav>

<div class="pxy bdr-blue bdr5">
    <h2>Quiz Component</h2>
    <p>This component is use to take the quiz.</p>

    <ul class="mb">
        <li>Submit button is enabled one all questions have been answered.</li>
        <li>Highlights incorrect answers on submit</li>
        <li class="txt-red">NK::TD Questions appear in random order.</li>
        <li class="txt-red">NK::TD Add redirect button on submit</li>
    </ul>



    <livewire:quiz.show mid=487 />

</div>



@endsection
