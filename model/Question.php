<?php

/**
 * Created by PhpStorm.
 * User: HoangDD
 * Date: 10/22/16
 * Time: 4:57 PM
 */
class Question
{
    public static $CLOSEANSWER = 0;
    public static $DISABLEANSWER = 1;
    public static $OPENEDANSWER = 2;
    public $question_id;
    public $question;
    public $correct_answer;
    public $status;
    public $answer_time;
    public $time_begin;
    public $time_end;

    public function isAnswerClosed()
    {

        return $this->status === self::$CLOSEANSWER;
    }

    public function isAnswerDisabled()
    {
        return $this->status === self::$DISABLEANSWER;
    }

    public function isAnswerOpened()
    {
        return $this->status === self::$OPENEDANSWER;
    }

    /*
     * @return string[]
     */
    public function getEveryLetterAnswer()
    {
        return str_split($this->correct_answer);
    }


}