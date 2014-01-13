var exercisetestapp = exercisetestapp || {};

exercisetestapp.TestAppView = Backbone.View.extend({
    events: {
    },
    initialize: function() {
        this.listenTo(exercisetestapp.ExerciseTestObj, 'sync', this.addAll);
        exercisetestapp.ExerciseTestObj.fetch();
    },
    // Add all items in the **Todos** collection at once.
    addAll: function() {
        var wizardView = new exercisetestapp.WizardView();

        $.each(exercisetestapp.ExerciseTestObj.get('tasks'), function(index, value) {
            wizardView.addView({ref: new exercisetestapp.TenseTestView({model: value})});
        });

        wizardView.addView({ref: new exercisetestapp.TestConfirmView()});
        $('#wizard-container').append(wizardView.render().el);
    },
});