var exercisetestapp = exercisetestapp || {};

exercisetestapp.TenseTestView = Backbone.View.extend({
    tagName: 'div',
    error_was_shown: false,
    initialize: function() {
        'use strict';
        _.bindAll(this, 'render');
        this.template = _.template($("#tensetest-template").html());
    },
    events: {
    },
    answer: function() {
        return 'traaa';
    },
    render: function() {
        'use strict';
        //var json = JSON.parse(JSON.stringify(this.model.toJSON()));
        var json = this.model;
        $(this.el).empty();
        $(this.el).append(this.template(json));
        $(this.el).focus(); 
        return this;
    },
    updateModel: function() {
        var result = true;
        if (!this.error_was_shown)
        {
            var currModel = this.model;
            
            $(this.el).find('.tense-control').each(function() {
                $(this).attr('disabled','disabled');
                var i = this.id;
                var userAnswer = $(this).val().trim();
                var currentTense = currModel.tenses[i];
                currentTense.user_answer = userAnswer;
                
                if(currentTense.user_answer !== currentTense.correct_answer)
                {                    
                    result = false;
                    var alertelem = $(this).next()[0];
                    if(!alertelem || alertelem.id !== 'alert'+i) {
                        var htmlalert = '<div id="alert'+i+'" class="alert alert-danger">Leider falsch, richtig ist: <strong>'+ currentTense.correct_answer +'</strong></div>';
                        $(this).after(htmlalert);
                    }
                }
            });
        }else
        {
            return true;
        }
        
        this.error_was_shown = !result;
        return result;
    },
    validateInput: function() {

    }
});

