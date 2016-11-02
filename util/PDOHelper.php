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
            $pass = 'admin123';

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
        $sth = $this->PDO->prepare("SELECT user_name, time_answer, answer, rec_no, question_id FROM users_answers 
                                  WHERE user_name=:user_name ORDER BY time_answer ASC ");
        $sth->bindParam(':user_name', $user_name);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, "User_Answer");
    }

    /**
     * @param User_Answer $user_answer
     * @return boolean
     */
    public function insert_User_Answer($user_answer)
    {
        include_once __DIR__.'/../model/User_Answer.php';
        //Get the question_id
        $question = $this->get_Question_From_User_Answer($user_answer);
        $user_answer->question_id=empty($question)?0:$question->question_id;



        $sth = $this->PDO->prepare("INSERT INTO users_answers(user_name, time_answer, answer, question_id) 
                                    VALUES (:user_name, :time_answer, :answer, :question_id)");
        $sth->bindParam(':user_name', $user_answer->user_name);
        $sth->bindParam(':time_answer', $user_answer->time_answer);
        $sth->bindParam(':answer', $user_answer->answer);
        $sth->bindParam(':question_id',$user_answer->question_id);
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
     * @param string $time_begin , string $time_end, int $question_id
     * @return boolean
     */
    public function update_Question_timebegin_end($time_begin, $time_end, $question_id)
    {
        include_once __DIR__ . '/../model/Question.php';
        $sth = $this->PDO->prepare("UPDATE questions SET time_begin=:time_begin,time_end=:time_end WHERE question_id=:question_id ");
        $sth->bindParam(':time_begin', $time_begin);
        $sth->bindParam(':time_end', $time_end);
        $sth->bindParam(':question_id', $question_id);
        return $sth->execute();
    }

    /**
     * @return boolean
     */
    public function reset_Question_Status()
    {
        include_once __DIR__ . '/../model/Question.php';
        $status_available = Question::$CLOSEANSWER;
        $sth = $this->PDO->prepare("UPDATE questions SET status= $status_available WHERE 1");
        $result = $sth->execute();
        return $result;
    }

    /**
     * @param string $role
     * @return User[]
     */
    public function get_User_By_Role($role)
    {
        include_once __DIR__ . '/../model/User.php';
        $sth = $this->PDO->prepare("SELECT user_name, password, role FROM users 
                          WHERE role=:role");
        $sth->bindParam(':role', $role);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, "User");

    }

    /**
     * @param int $question_id
     * @return User_Final_Answer[]
     */
    public function get_Users_Final_Answers($question_id)
    {
        include_once __DIR__ . '/../model/User_Final_Answer.php';
        //Get time when user answered this question
        $sth = $this->PDO->prepare("select users.user_name, time_begin, correct_answer, question_id, last_time_answer, last_answer from users 
                                    left join (select questions.time_begin, questions.correct_answer, user_last_answer.* from questions 
                                    INNER join (select user_name, question_id, time_answer as last_time_answer, answer as last_answer 
                                    from users_answers where time_answer in ((select max(time_answer) from users_answers 
                                    where question_id=:question_id group by user_name))) user_last_answer 
                                    on questions.question_id=user_last_answer.question_id) user_lastanswer_question 
                                    on users.user_name=user_lastanswer_question.user_name where role='user' order by last_time_answer");
        $sth->bindParam(':question_id', $question_id);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, "User_Final_Answer");
    }

    /**
     * @param User_Answer $user_answer
     * @return Question
     */
    public function get_Question_From_User_Answer($user_answer){
        include_once __DIR__.'/../model/Question.php';
        include_once __DIR__.'/../model/User_Answer.php';
        $time_answer=$user_answer->time_answer;
        $sth = $this->PDO->prepare("SELECT question_id, question, correct_answer, status, answer_time, time_begin, time_end 
                                  FROM questions WHERE time_begin<=:time_answer and :time_answer<=time_end");
        $sth->bindParam(':time_answer', $time_answer);
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Question');
        $sth->execute();
        return $sth->fetch();

    }


}


?>


