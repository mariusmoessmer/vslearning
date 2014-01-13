@extends('layouts.master')

@section('content')
<section id="profile">
    <h1 class="page-header">Meine &Uuml;bungen</h1>

    <div class="container">
        <div class="list-group" id='exercise-list'>
        </div>
    </div>
    </<section>
        
@foreach ($exercises as $exercise)
        <a href="exercisetest/{{ $exercise->id }}/create" class="list-group-item step-3-menu" id='exercise'>
                <h4 class="list-group-item-heading">{{ $exercise->sequence_number }}. {{ $exercise->name }}</h4>
                <p class="list-group-item-text">{{ $exercise->description }}</p>
                <hr />
                <div class="row rating-desc">
                    <div class="col-md-12">
                        Anzahl Tests: {{ $exercise->count_tests }}
                        <span class="separator">|</span>
                        beantwortete Fragen: {{ $exercise->count_questions }} 
                        <span class="separator">|</span> 
                        richtige Antworten: {{ $exercise->count_questions_correct }}
                        <span class="separator">|</span> 
                        Lerngrad: {{ number_format(($exercise->count_questions == 0 ? 0 : ($exercise->count_questions_correct * 100) / $exercise->count_questions), 0) }} % <span class="separator">|</span>
                        <!--Lernfortschritt: 34 % <span class="glyphicon glyphicon-stats"></span><span class="separator">|</span>-->
                    </div>
                </div>
            </a>
@endforeach
        
        <!--<script type="text/template" id="exercise-template">
            <a href="exercisetest/<%- id %>/create" class="list-group-item step-3-menu" id='exercise'>
                <h4 class="list-group-item-heading"><%- sequence_number %>. <%- name %></h4>
                <p class="list-group-item-text"><%- description %></p>
                <hr />
                <div class="row rating-desc">
                    <div class="col-md-12">
                        Lernfortschritt: 34 % <span class="glyphicon glyphicon-stats"></span><span class="separator">|</span>
                    </div>
                </div>
            </a>
        </script>-->
@stop