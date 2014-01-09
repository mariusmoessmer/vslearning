var exercisesapp = exercisesapp || {};
// The Application
// ---------------
// Our overall **AppView** is the top-level piece of UI.
exercisesapp.ExercisesAppView = Backbone.View.extend({
    el: '#profile',
    exerciseList: $('#exercise-list'),
    events: {
    },
// At initialization we bind to the relevant events on the `Todos`
// collection, when items are added or changed. Kick things off by
// loading any preexisting todos that might be saved in *localStorage*.
    initialize: function() {
        this.listenTo(exercisesapp.Exercises, 'sync', this.addAll);
        exercisesapp.Exercises.fetch();
    },
    // Add a single exercise to the list by creating a view for it, and
    // appending its element to the `<ul>`.
    addOne: function(exercise) {
        var view = new exercisesapp.ExerciseView({model: exercise});
        this.exerciseList.append(view.render().el);
    },
    // Add all items in the **Todos** collection at once.
    addAll: function() {
        this.exerciseList.html('');
        exercisesapp.Exercises.each(this.addOne, this);
    },
});