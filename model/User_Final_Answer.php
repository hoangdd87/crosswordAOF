<?php

/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 11/2/16
 * Time: 8:00 PM
 */
class User_Final_Answer
{
    public $user_name;
    public $last_time_answer;
    public $last_answer;

    /**
     * @param Question $question
     * @return float
     */
    public function get_User_Final_Time_Diff($question)
    {
        include_once __DIR__ . '/../util/Timer.php';
        return empty($this->last_time_answer)?0:Timer::getDiff($question->time_begin,$this->last_time_answer);

    }

}