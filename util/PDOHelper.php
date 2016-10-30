<?php

class PDOHelper
{
    public $PDO;
    public function __construct()
    {
        try {

            //include($_SERVER['DOCUMENT_ROOT'] . '/variables/variables_crossword.php');
            $host = 'localhost';
            $database = 'crosswordgame';
            $user = 'root';
            $pass = 'mysql';

            $this->PDO = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $pass);
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param string $username
     * @param string $password
     * @return User
     */
    public function get_User_by_username_and_pass($username, $password)
    {
        include_once __DIR__ . '/../model/User.php';
        $sth = $this->PDO->prepare("SELECT user_name, password, role FROM users 
                          WHERE user_name=:user_name AND password=:password");
        $sth->bindParam(':user_name', $username);
        $sth->bindParam(':password', $password);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        return $sth->fetch();
    }

    /**
     * @param string $user
     * @return User_Answer[]
     */
    public function get_All_User_Answer($user_name)
    {
        include_once __DIR__ . '/../model/User_Answer.php';
        $sth = $this->PDO->prepare("SELECT user_name, time_answer, answer, rec_no FROM users_answers 
                                  WHERE user_name=:user_name ORDER BY time_answer ASC ");
        $sth->bindParam(':user_name', $user_name);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, "User_Answer");
    }

    /**
     * @param User_Answer $user_anser
     * @return boolean
     */
    public function insert_User_Answer($user_anser)
    {
        $sth = $this->PDO->prepare("INSERT INTO users_answers(user_name, time_answer, answer) 
                                    VALUES (:user_name, :time_answer, :answer)");
        $sth->bindParam(':user_name', $user_anser->user_name);
        $sth->bindParam(':time_answer', $user_anser->time_answer);
        $sth->bindParam(':answer', $user_anser->answer);
        return $sth->execute();
    }

    /**
     * @return Question[]
     */
    public function get_All_Questions()
    {
        include_once __DIR__ . '/../model/Question.php';
        $sth = $this->PDO->prepare("SELECT question_id, question, correct_answer, status, answer_time, time_begin, time_end 
                                  FROM questions WHERE 1 ");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, "Question");
    }

    /**
     * @param int
     * @return Question
     */
    public function get_Question($question_id)
    {
        include_once __DIR__ . '/../model/Question.php';
        $sth = $this->PDO->prepare("SELECT question_id, question, correct_answer, status, answer_time, time_begin, time_end 
                                  FROM questions WHERE question_id=:question_id ");
        $sth->bindParam(':question_id', $question_id);
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Question');
        $sth->execute();
        return $sth->fetch();
    }

    /**
     * @param User_Answer $user_anser
     * @return Question[]
     */
    public function update_Question_Status($status_code)
    {
        include_once __DIR__ . '/../model/Question.php';
        $sth = $this->PDO->prepare("SELECT question_id, question, correct_answer, status 
                                  FROM questions WHERE 1 ");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, "Question");
    }


    /**
     * @param string $time_begin, string $time_end, int $question_id
     * @return boolean
     */
    public function update_Question_timebegin_end($time_begin, $time_end, $question_id)
    {
        include_once __DIR__ . '/../model/Question.php';
        $sth = $this->PDO->prepare("UPDATE questions SET time_begin=:time_begin,time_end=:time_end WHERE question_id=:question_id ");
        $sth->bindParam(':time_begin',$time_begin);
        $sth->bindParam(':time_end',$time_end);
        $sth->bindParam(':question_id',$question_id);
        return $sth->execute();
    }



}

?>