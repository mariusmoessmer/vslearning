var app = app || {};
// The Application
// ---------------
// Our overall **AppView** is the top-level piece of UI.
app.AppView = Backbone.View.extend({
    el: '#profile',
    exerciseList: $('#exercise-list'),
    events: {
    },
// At initialization we bind to the relevant events on the `Todos`
// collection, when items are added or changed. Kick things off by
// loading any preexisting todos that might be saved in *localStorage*.
    initialize: function() {
        this.listenTo(app.Exercises, 'sync', this.addAll);
        app.Exercises.fetch();
    },
    // Add a single exercise to the list by creating a view for it, and
    // appending its element to the `<ul>`.
    addOne: function(exercise) {
        var view = new app.ExerciseView({model: exercise});
        this.exerciseList.append(view.render().el);
    },
    // Add all items in the **Todos** collection at once.
    addAll: function() {
        this.exerciseList.html('');
        app.Exercises.each(this.addOne, this);
    },
});