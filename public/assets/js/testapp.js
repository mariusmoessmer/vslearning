var exercisetestapp = exercisetestapp || {};

$(function() {
    'use strict';
    
    new exercisetestapp.TestAppView();

    var testModel = {
        id: 123,
        tasks: [
            {
                infinitive: "laufen",
                tenses: [
                    {
                        id: 5555,
                        tense: "Mitvergangenheit",
                        question: "ich |lief|"
                    },
                    {
                        id: 5556,
                        tense: "Vergangenheit",
                        question: "du bist |gelaufen|"
                    }
                ]
            },{
                infinitive: "3",
                tenses: [
                    {
                        id: 5555,
                        tense: "Mitvergangenheit",
                        question: "ich |3|"
                    },
                    {
                        id: 5556,
                        tense: "Vergangenheit",
                        question: "du bist |3|"
                    }
                ]
            }
        ]
    };
    
    
    var tasks = new Array();
    
    var _wizardView = new exercisetestapp.WizardView();
    
    $.each(testModel.tasks, function(index, value) {
        var task = new exercisetestapp.Task();
        task.set(value);
        tasks.push(task);
        $.each(value.tenses, function(i, tenseObj) {
            if(!tenseObj.answer)
            {
                var test_str = tenseObj.question;
                var start_pos = test_str.indexOf('|') + 1;
                var end_pos = test_str.indexOf('|',start_pos);
                if(!start_pos || !end_pos)
                {
                    tenseObj.question = "INVALID QUESTION! (always use '|' in front of your masked answers!!!";
                    tenseObj.const_answer = "INVALID CONST!";
                    tenseObj.correct_answer = "INVALID ANSWER!";
                }else
                {
                    tenseObj.const_answer = test_str.substring(0,start_pos - 1);
                    tenseObj.correct_answer = test_str.substring(start_pos,end_pos); 
                }
            }
        });
        
        _wizardView.addView({ref: new exercisetestapp.TenseTestView({model: task})});
    });
    
    _wizardView.addView({ref: new exercisetestapp.TestConfirmView({model: tasks})});
    $('#wizard-container').append(_wizardView.render().el);
});