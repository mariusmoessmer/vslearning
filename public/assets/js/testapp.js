var exercisetestapp = exercisetestapp || {};

$(function() {
    'use strict';
    
    // get id of exerciseTest, create global accessable ExerciseTestObj
    var exerciseTestId = $('#exerciseTestId').val();    
    exercisetestapp.ExerciseTestObj = new exercisetestapp.ExerciseTest({ id: exerciseTestId });
    
    // kick off test-wizard!
    new exercisetestapp.TestAppView();
});