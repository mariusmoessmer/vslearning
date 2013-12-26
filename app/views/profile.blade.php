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
            <a href="" class="list-group-item step-3-menu" data-toggle="modal" id='exercise'>
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

        <script type="text/template" id="exercise-modal-template">
        <div id="exercise-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title"><%- name %></h4>
                    </div>
                    <div class="modal-body">
                        <div id="rootwizard">
                            <div class="navbar">
                                <div class="container">
                                <ul>
                                    <li><a href="#tab1" data-toggle="tab">First</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Second</a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <!--<h4>Text in a modal</h4>-->
                        <!--<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>-->
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
        </script>
@stop