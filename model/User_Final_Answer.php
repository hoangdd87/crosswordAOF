<?php

/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 11/2/16
 * Time: 8:00 PM
 */
class User_Final_Answer
{
    public $time_begin;
    public $correct_answer;
    public $user_name;
    public $question_id;
    public $last_time_answer;
    public $last_answer;

    /*
     * return float
     */
    public function get_User_Final_Time_Diff()
    {
        include_once __DIR__ . '/../util/Timer.php';
        if (empty($this->time_begin) or empty($this->last_time_answer)) {
            return 0;
        } else {
            $diff=Timer::getDiff($this->time_begin, $this->last_time_answer);
            return $diff<0?$diff:$diff;
        }
    }

}