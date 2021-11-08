@extends('gotime::layouts.' . config('naykel.template'))

@section('content')

<section class="bx bdr5 bdr-blue">

    <div class="bx-title mb">Questions list</div>

    <ul>
        <li>Displays questions where media id = id</li>
        <li>Add new question button opens the modal with 'create-question-form' component where both the question and options are created.</li>
        <li>Each row edit button opens the modal with a form to edit the question and another to edit question options (inline editing).</li>

        <li><strong></strong></li>
        <li><strong>BUG:</strong> can not edit newly created questions (refresh page to work around)</li>
        <li><strong>BUG:</strong> can not escape after selecting create new option (refresh page to work around)</li>
        <li><strong>BUG:</strong> can not escape after selecting edit question (refresh page to work around)</li>
        <li class="txt-red">if less than 2 question options the question will not be published</li>
        <li class="txt-red">check if points allocated</li>

    </ul>

    <h4>Usage</h4>
    <ul>
        <li>Questions and Options are created together with <code>CreateQuestionForm</code> Which is called with the 'add new' button in the questions table.</li>
        <li>Questions are both created and updated with the <code>save()</code> function in <code>QuestionsTable</code></li>
        <li>Options are edited with <code>EditOptions</code></li>
    </ul>

    <?php $mediaId = 87 ?>
    <livewire:quiz.questions-table mid="487" />

</section>


<div class="bx bdr5 bdr-orange">

    <div class="bx-title mb">Form to add question and options</div>

    <ul class="mb">
        <li>Saves question and multiple options at once</li>
        <li>Can add and delete options</li>
    </ul>

    <div class="bx">
        <livewire:quiz.create-question-form />
    </div>

</div>

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
