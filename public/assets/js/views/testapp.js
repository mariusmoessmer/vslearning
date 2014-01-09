var exercisetestapp = exercisetestapp || {};

exercisetestapp.TestAppView = Backbone.View.extend({
    events: {
    },
// At initialization we bind to the relevant events on the `Todos`
// collection, when items are added or changed. Kick things off by
// loading any preexisting todos that might be saved in *localStorage*.
    initialize: function() {
    
        var exerciseTestId = $('#exerciseTestId').val();    
        exercisetestapp.ExerciseTestObj = new exercisetestapp.ExerciseTest({ id: exerciseTestId });
        exercisetestapp.ExerciseTestObj.fetch();       
        
        this.listenTo(exercisetestapp.ExerciseTestObj, 'sync', this.addAll);
    },
    // Add all items in the **Todos** collection at once.
    addAll: function() {
        //alert(JSON.stringify(ExerciseTestObj.toJSON()));
    },
});