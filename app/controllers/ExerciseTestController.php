<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestController
 *
 * @author marius
 */
class ExerciseTestController extends BaseController
{

    public function create($id) {
        if (!$exercise = Exercise::with('exerciseVerbs.verb')->find($id)) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
        }

        // check if there was already created a test that was not finished (for the current user and exercise)
        // so user can refresh as often as it wants and no new exercisetest gets created!
        $test = ExerciseTest::where('user_id', Auth::user()->id)->where('exercise_id', $id)->where('test_finished', null)->first();
        if (!$test) {
            $test = new ExerciseTest;
            $test->user_id = Auth::user()->id;
            $test->exercise_id = $id;
            $test->save();

            // create an array of tensetype-ids which are required for exercise
            $tenses = $this->createTensesArray($exercise->configurationObj());
            $persons = $this->createPersonsArray($exercise->configurationObj());

            // create for each exercise-verb a new task
            // person is selected randomly or by last answered question
            foreach ($exercise->exerciseVerbs as $exerciseVerb) {
                $doneTasksForVerb = TenseExerciseTask::
                                join('exercisetests', 'exercisetests.id', '=', 'exercisetest_id')
                                ->where('answer_is_correct', true)
                                ->where('verb_id', $exerciseVerb->verb_id)
                                ->where('exercisetests.user_id', Auth::user()->id)
                                ->whereIn('tensetype_id', $tenses)
                                ->orderBy('tenseexercisetasks.updated_at', 'DESC')->get();

                $person_last_updated_at = array();
                foreach ($doneTasksForVerb as $doneTask) {
                    $person_num = $doneTask->person_number;
                    $updated_at = $doneTask->updated_at;
                    if (!isset($person_last_updated_at[$person_num]) || $person_last_updated_at[$person_num] < $doneTask->updated_at) {
                        $person_last_updated_at[$person_num] = $updated_at;
                    }
                }


                $persons_not_learned = array();

                $mindate = null;
                $person_for_task = null;
                // find NOT answered verbs for persons
                foreach ($persons as $person) {
                    if (!isset($person_last_updated_at[$person])) {
                        array_push($persons_not_learned, $person);
                    } else if ($mindate == null || $person_last_updated_at[$person] < $mindate) {
                        $mindate = $person_last_updated_at[$person];
                        $person_for_task = $person;
                    }
                }

                // if there persons that were not learned for this verb --> pick random person!
                if (count($persons_not_learned) > 0) {
                    $person_for_task = $persons_not_learned[array_rand($persons_not_learned)];
                }
                
                foreach($tenses as $tense)
                {
                    $verb = $exerciseVerb->verb;
                    $task = new TenseExerciseTask;
                    $task->verb_id = $verb->id;
                    $task->tensetype_id = $tense;
                    $task->person_number = $person_for_task;
                    $test->tenseExerciseTasks()->save($task);
                }                
            }
        }
            
        return View::make('pages.test.tenseexercisetest', array('exercise' => $exercise, 'exercisetest' => $test));
    }

    private function createTensesArray($configurationObj) {
        $tenses = array();
        if ($configurationObj->use_praesens) {
            array_push($tenses, TenseType::PRAESENS_TYPE);
        }
        if ($configurationObj->use_perfekt) {
            array_push($tenses, TenseType::PERFEKT_TYPE);
        }
        if ($configurationObj->use_praeteritum) {
            array_push($tenses, TenseType::PRAETERITUM_TYPE);
        }
        if ($configurationObj->use_plusquamperfekt) {
            array_push($tenses, TenseType::PLUSQUAMPERFEKT_TYPE);
        }
        if ($configurationObj->use_futur1) {
            array_push($tenses, TenseType::FUTUR1_TYPE);
        }
        if ($configurationObj->use_futur2) {
            array_push($tenses, TenseType::FUTUR2_TYPE);
        }

        return $tenses;
    }

    private function createPersonsArray($configurationObj) {
        $persons = array();


        if ($configurationObj->use_person1SG) {
            array_push($persons, 1);
        }
        if ($configurationObj->use_person2SG) {
            array_push($persons, 2);
        }
        if ($configurationObj->use_person3SG) {
            array_push($persons, 3);
        }
        if ($configurationObj->use_person1PL) {
            array_push($persons, 4);
        }
        if ($configurationObj->use_person2PL) {
            array_push($persons, 5);
        }
        if ($configurationObj->use_person3PL) {
            array_push($persons, 6);
        }

        return $persons;
    }

    public function get($exerciseTestID) {
        if (!$exerciseTest = ExerciseTest::with('tenseExerciseTasks')->find($exerciseTestID)) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
        }

        $exerciseTest->test_started = \Carbon\Carbon::now();
        $exerciseTest->save();

        return $exerciseTest->toJson();
    }

}
