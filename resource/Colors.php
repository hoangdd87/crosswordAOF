<?php
    class Colors{
        public static $TEXTANSWERCOLOR='blue';// Text AnswerColor. Use when answer are opened
        public static $TRANSPARENTCOLOR='transparent';//color of text when it's hiden (Available and disable)

        public static $AVAILABLEBACKGROUND='#52BAFF';//White - BackgroundColor of an answer's cell row that one user can choose
        public static $DISABLEBACKGROUND='#BBBBBB';//Grey - BackgroundColor of an answer'cell row that an user choose already but answer wrong
        public static $OPENEDBACKGROUND='#white';//Nearly green - BackgroundColor of an answer'cell row that is opened by user

        //Question color
        public static $questionColor='#fff0f5';
        public static function getBackgroundTextAnswerColor($code)
        {
            include_once __DIR__.'/../model/Question.php';
            if ($code == Question::$CLOSEANSWER) return self::$AVAILABLEBACKGROUND;
            else if ($code == Question::$DISABLEANSWER) return self::$DISABLEBACKGROUND;
            else if ($code == Question::$OPENEDANSWER) return self::$OPENEDBACKGROUND;
        }

        public static function getTextAnswerColor($code)
        {
            include_once __DIR__.'/../model/Question.php';
            if ($code == Question::$CLOSEANSWER) return self::$TRANSPARENTCOLOR;
            else if ($code == Question::$DISABLEANSWER) return self::$TRANSPARENTCOLOR;
            else if ($code == Question::$OPENEDANSWER) return self::$TEXTANSWERCOLOR;
        }


    }
?>