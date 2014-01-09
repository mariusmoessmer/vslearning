var exercisesapp = exercisesapp || {};
// Exercise Collection
// ---------------

// The collection of exercises is backed by *localStorage* instead of a remote
// server.
var ExerciseList = Backbone.Collection.extend({
    // Reference to this collection's model.
    model: exercisesapp.Exercise,
    url: '/exercises',
    // Exercises are sorted by their original insertion order.
    comparator: function(exercise) {
        return exercise.get('sequence_number');
    }
});
// Create our global collection of **Exercise**.
exercisesapp.Exercises = new ExerciseList();