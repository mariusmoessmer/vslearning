var exercisetestapp = exercisetestapp || {};

exercisetestapp.TestConfirmView = Backbone.View.extend({
    tagName: 'div',
    initialize: function() {
        'use strict';
        _.bindAll(this, 'render', 'updateModel');
        this.template = _.template($("#test-confirm-template").html());
    },
    render: function() {
        'use strict';
        //var json = JSON.parse(JSON.stringify(this.model.toJSON()));
        
        var tasks = exercisetestapp.ExerciseTestObj.toJSON().tasks;
        
        var quCount = _.reduce(tasks, function(sum, task) {
            return sum += task.tenses.length;
        },0);
        
        var correctACount = _.reduce(tasks, function(sum, task) {
            return sum += _.filter(task.tenses, 
                function(tense){ 
                    return tense.user_answer === tense.correct_answer 
                }).length;
        }, 0);
        
            //currentTense.user_answer !== currentTense.correct_answer
        //    return task.get('');
        //});
        
        var testconfirmObj = 
                { questions_count : quCount,
                  correct_answers_count : correctACount,
                  percentage : (correctACount* 100) / quCount,
                };
        $(this.el).empty();
        $(this.el).append(this.template(testconfirmObj));
        return this;
    },
    updateModel: function() {
    }
});