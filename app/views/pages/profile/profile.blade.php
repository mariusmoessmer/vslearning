@extends('layouts.master')

@section('content')
<section id="profile">
    <h1 class="page-header">Meine &Uuml;bungen</h1>
    
@foreach ($schoolClassExercises as $schoolClassExercise)
        <a href="exercisetest/{{ $schoolClassExercise->exercise->id }}/create" class="list-group-item step-3-menu" id='exercise'>
                <h4 class="list-group-item-heading">{{ $schoolClassExercise->sequence_number }}. {{ $schoolClassExercise->exercise->name }}</h4>
                <p class="list-group-item-text">{{ $schoolClassExercise->exercise->description }}</p>
                <hr />
                <div class="row rating-desc">
                    <div class="col-md-12">
                        Anzahl Tests: {{ $schoolClassExercise->exercise->count_tests }}
                        <span class="separator">|</span>
                        beantwortete Fragen: {{ $schoolClassExercise->exercise->count_questions }} 
                        <span class="separator">|</span> 
                        richtige Antworten: {{ $schoolClassExercise->exercise->count_questions_correct }}
                        <span class="separator">|</span> 
                        Lerngrad: {{ number_format(($schoolClassExercise->exercise->count_questions == 0 ? 0 : ($schoolClassExercise->exercise->count_questions_correct * 100) / $schoolClassExercise->exercise->count_questions), 0) }} % <span class="separator">|</span>
                        <!--Lernfortschritt: 34 % <span class="glyphicon glyphicon-stats"></span><span class="separator">|</span>-->
                    </div>
                </div>
            </a>
@endforeach

@stop