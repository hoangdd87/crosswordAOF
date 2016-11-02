<?php

/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 10/18/16
 * Time: 9:41 PM
 */
class User_Answer_Factory
{
    /**
     * @return User_Answer
     */
    public static function create($user_name, $time_answer, $answer, $rec_no, $question_id){
        include_once __DIR__.'/User_Answer.php';
        $user_answer=new User_Answer();
        $user_answer->user_name = $user_name;
        $user_answer->time_answer = $time_answer;
        $user_answer->answer = $answer;
        $user_answer->rec_no = $rec_no;
        $user_answer->question_id = $question_id;
        return $user_answer;
    }
}