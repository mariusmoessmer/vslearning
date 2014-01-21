@extends('layouts.master')

@section('content')
<section id="profile">
    <h1 class="page-header">Administration</h1>

    <div class="container">
        <div class="list-group" id='exercise-list'>
        </div>
    </div>
    </<section>


        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                                        </span> Verwaltung</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-pencil text-primary"></span><a href="{{ route('administration.schools.index')}}"> Schulen</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-comment text-success"></span><a href="{{ route('administration.classes.index') }}"> Klassen</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-file text-info"></span><a href="{{ route('administration.exercises.index') }}"> Übungen</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @if (Route::currentRouteName() === 'administration.schools.index')
                <div class="col-sm-9 col-md-9">
                    <div class="container">
                        <div class="row">
                            <input type="hidden" name="count" value="1" />
                            <div class="control-group" id="fields">
                                <label class="control-label" for="field1">Nice Multiple Form Fields</label>
                                <div class="controls" id="profs"> 
                                    <form class="input-append">
                                        <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                                    </form>
                                    <br>
                                    <small>Press + to add another form field :)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @stop