@extends('layouts.master')

@section('content')
<section id="profile">
    <h1 class="page-header">Meine &Uuml;bungen</h1>

    <div class="container">
        <div class="list-group" id='exercise-list'>
        </div>
    </div>
    </<section>

        <script type="text/template" id="exercise-template">
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
        </script>
@stop