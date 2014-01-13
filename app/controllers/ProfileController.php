<?php


class ProfileController extends BaseController {
    
	public function index()
        {
            $exercises = Exercise::visible()->orderBy('sequence_number', 'ASC')->get();
            
            foreach($exercises as $exercise)
            {
                $id = $exercise->id;
                $tests = ExerciseTest::with('tenseExerciseTasks')->where('user_id', Auth::user()->id)->where('exercise_id', $id)->whereNotNull('test_finished')->get();
                $count_questions_correct = 0;
                $count_questions = 0;
                
                foreach($tests as $test)
                {
                    foreach($test->tenseExerciseTasks as $task) {
                        if($task->answer_is_correct) {
                            $count_questions_correct++;
                        }
                        $count_questions++;
                    }
                }
                
                $exercise->count_questions_correct = $count_questions_correct;
                $exercise->count_questions = $count_questions;
                $exercise->count_tests = count($tests);
            }
            
            return  View::make('pages.profile.profile', array('exercises' => $exercises));
        }
}
