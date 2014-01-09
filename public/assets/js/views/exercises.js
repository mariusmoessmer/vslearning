var exercisesapp = exercisesapp || {};
// Todo Item View
// --------------
// The DOM element for a todo item...
exercisesapp.ExerciseView = Backbone.View.extend({
    // Cache the template function for a single item.
    exerciseTemplate: _.template($('#exercise-template').html()),
    // The DOM events specific to an item.
    events: {
        'click #exercise': 'startExercise', // NEW
        //'dblclick label': 'edit',
        //'click .destroy': 'clear', // NEW
        //'keypress .edit': 'updateOnEnter',
        //'blur .edit': 'close'
    },
    initialize: function() {
    },
// Rerender the titles of the todo item.
    render: function() {
        this.$el.html(this.exerciseTemplate(this.model.toJSON()));
        return this;
    },
    
    startExercise: function() {
        var exerciseObj = this.model.toJSON();
        
        //this.$el.append(this.modalTemplate(exerciseObj));
    }
});