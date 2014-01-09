@extends('layouts.master') 

@section('content')

<script type="text/template" id="tensetest-template">     
    <div class="wizard-view">
        <div class='form-row'>
            <div class='col-xs-12 form-group required'>
                <label class='control-label'>Nennform</label>
                <input id="name" class='form-control' size='4' type='text' disabled="disabled" value="<%- infinitive %>">
            </div>
        </div>
        <% _.each( tenses , function(item, index){ %>
        <div class='form-row'>
            <div class='col-xs-12 form-group card required'>
                <label class='control-label'><%= item.tense %></label>
                <br>
                <!--<div id="myAlert" class="alert alert-danger">jihaaa</div>-->
                <!--<label class='control-label'><%= item.const_answer %></label> -->
                
                <table width="100%">
                <tr>
                <td style="white-space: nowrap;">
                <p style="position:relative; top:5px; margin-right: 5px"><%= item.const_answer %></p></td><td width="100%"><input id='<%= index  %>' autocomplete='off' class='form-control tense-control' size='1' type='text' value="<%= item.user_answer %>">
                </td>
                </tr>
                </table>
            </div>
        </div>
        <% }); %>
    </div>
</script>

<script type="text/template" id="test-confirm-template">
    <div class="wizard-view">
        <div class='form-row'>
            <div class='col-xs-12 form-group card required'>
            <div class="alert alert-info"><strong>Geschafft!</strong> Alle Fragen wurden beantwortet</div>
                <p>
                <strong>Anzahl Fragen: </strong><%= questions_count %><br />
                </p>    
                <p>
                <strong>Anzahl richtiger Antworten: </strong><%= correct_answers_count %><br />
                </p>
                <p>
                <strong>Prozent richtiger Fragen: </strong><%- percentage.toFixed(1) %> %<br />
                </p>
            </div>
        </div>
    </div>
</script>


<script type="text/template" id="wizard-template">
    <!-- Wizard -->
        <div id="wizard">
            <div class="progress" style="height: 20px">
                    <p class="col-md-12 text-right progress-label">1 / 17</p>
            </div>    
            <h3>{{ $exercise->name }}</h3>
            <p>{{ $exercise->explanation }}</p>
            </br>
            
            <!-- View Container -->        
                <div id="wizard-view-container"></div>
            <!-- View Container -->

            <!-- Pagination -->
                 <div class='form-row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control btn btn-primary submit-button next btn-nextView'>Weiter »</button>
                    </div>
                </div>
            <!-- Pagination -->

            <!-- Form Action Buttons -->
            <div class="form-row form-actions">
                <div class='col-md-12 form-group'>
                    <button class='form-control btn btn-primary submit-button next btn-save'>Fertig »</button>
                </div>
            </div>
            <!-- Form Action Buttons -->
        </div>    
    <!-- Wizard -->
</script>

<section id="main-section">
    <input type="hidden" name="exerciseTestId" id="exerciseTestId" value="{{ $exercisetest->id }}" />
    <div id="wizard-container"></div>
</section>
@stop