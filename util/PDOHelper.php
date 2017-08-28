<?php

class PDOHelper {
	public $PDO;

	public function __construct() {
		try {

			//include($_SERVER['DOCUMENT_ROOT'] . '/variables/variables_crossword.php');
			$host     = 'localhost';
			$database = 'crosswordaof';
			$user     = 'root';
			$pass     = 'mysql';

			$this->PDO = new PDO( "mysql:host=$host;dbname=$database;charset=utf8", $user, $pass );
			$this->PDO->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		} catch
		( PDOException $e ) {
			echo $e->getMessage();
		}
	}

	/**
	 * @param string $username
	 * @param string $password
	 *
	 * @return User
	 */
	public function get_User_by_username_and_pass( $username, $password ) {
		include_once __DIR__ . '/../model/User.php';
		$sth = $this->PDO->prepare( "SELECT user_name, password, role, teamname FROM users 
                          WHERE user_name=:user_name AND password=:password" );
		$sth->bindParam( ':user_name', $username );
		$sth->bindParam( ':password', $password );
		$sth->execute();
		$sth->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User' );

		return $sth->fetch();

	}

	/**
	 * @param string $user
	 *
	 * @return User_Answer[]
	 */
	public function get_All_User_Answer( $user_name ) {
		include_once __DIR__ . '/../model/User_Answer.php';
		$sth = $this->PDO->prepare( "SELECT user_name, time_answer, answer, rec_no FROM users_answers 
                                  WHERE user_name=:user_name ORDER BY time_answer ASC " );
		$sth->bindParam( ':user_name', $user_name );
		$sth->execute();

		return $sth->fetchAll( PDO::FETCH_CLASS, "User_Answer" );
	}

	/**
	 * @param User_Answer $user_answer
	 *
	 * @return boolean
	 */
	public function insert_User_Answer( $user_answer ) {
		include_once __DIR__ . '/../model/User_Answer.php';

		$sth = $this->PDO->prepare( "INSERT INTO users_answers(user_name, time_answer, answer) 
                                    VALUES (:user_name, :time_answer, :answer)" );
		$sth->bindParam( ':user_name', $user_answer->user_name );
		$sth->bindParam( ':time_answer', $user_answer->time_answer );
		$sth->bindParam( ':answer', $user_answer->answer );

		return $sth->execute();
	}

	/**
	 * @param User_Message $user_message
	 *
	 * @return boolean
	 */
	public function insert_User_Message( $user_message ) {
		include_once __DIR__ . '/../model/User_Message.php';

		$sth = $this->PDO->prepare( "INSERT INTO user_message(user_name, message, time) 
              									VALUES (:user_name, :message, :time)" );
		$sth->bindParam( ':user_name', $user_message->user_name );
		$sth->bindParam( ':message', $user_message->message );
		$sth->bindParam( ':time', $user_message->time );

		return $sth->execute();
	}


	/**
	 * @return Question[]
	 */
	public function get_All_Questions() {
		include_once __DIR__ . '/../model/Question.php';
		$sth = $this->PDO->prepare( "SELECT question_id, question, correct_answer, status, answer_time, time_begin, time_end 
                                  FROM questions WHERE 1 " );
		$sth->execute();

		return $sth->fetchAll( PDO::FETCH_CLASS, "Question" );
	}

	/**
	 * @param int
	 *
	 * @return Question
	 */
	public function get_Question( $question_id ) {
		include_once __DIR__ . '/../model/Question.php';
		$sth = $this->PDO->prepare( "SELECT question_id, question, correct_answer, status, answer_time, time_begin, time_end 
                                  FROM questions WHERE question_id=:question_id " );
		$sth->bindParam( ':question_id', $question_id );
		$sth->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Question' );
		$sth->execute();

		return $sth->fetch();
	}

	/**
	 * @param  int $question_id
	 * @param  int $status
	 *
	 * @return Question[]
	 */
	public function update_Question_Status( $question_id, $status ) {
		include_once __DIR__ . '/../model/Question.php';
		$sth = $this->PDO->prepare( "UPDATE questions SET status=:status WHERE question_id=:question_id " );
		$sth->bindParam( ':status', $status );
		$sth->bindParam( ':question_id', $question_id );

		return $sth->execute();

	}


	/**
	 * @param string $time_begin , string $time_end, int $question_id
	 *
	 * @return boolean
	 */
	public function update_Question_timebegin_end( $time_begin, $time_end, $question_id ) {
		include_once __DIR__ . '/../model/Question.php';
		$sth = $this->PDO->prepare( "UPDATE questions SET time_begin=:time_begin,time_end=:time_end WHERE question_id=:question_id " );
		$sth->bindParam( ':time_begin', $time_begin );
		$sth->bindParam( ':time_end', $time_end );
		$sth->bindParam( ':question_id', $question_id );

		return $sth->execute();
	}


	/**
	 * @return boolean
	 */
	public function reset_Question_Status() {
		include_once __DIR__ . '/../model/Question.php';
		$status_available = Question::$CLOSEANSWER;
		$sth              = $this->PDO->prepare( "UPDATE questions SET status= $status_available WHERE 1" );
		$result           = $sth->execute();

		return $result;
	}

	/**
	 * @param string $role
	 *
	 * @return User[]
	 */
	public function get_User_By_Role( $role ) {
		include_once __DIR__ . '/../model/User.php';
		$sth = $this->PDO->prepare( "SELECT user_name, password, role, teamname FROM users 
                          WHERE role=:role" );
		$sth->bindParam( ':role', $role );
		$sth->execute();

		return $sth->fetchAll( PDO::FETCH_CLASS, "User" );

	}

	/**
	 * @param Question $question
	 *
	 * @return User_Final_Answer[]
	 */
	public function get_Users_Final_Answers( $question ) {
		include_once __DIR__ . '/../model/User_Final_Answer.php';
		$time_begin = $question->time_begin;
		$time_end   = $question->time_end;
		//Get time when user answered this question
		$sth = $this->PDO->prepare( "select users.user_name, time_answer as last_time_answer, answer as last_answer, users.teamname	 
        from users LEFT join (select * from users_answers where time_answer in (select max(time_answer) from users_answers 
        where time_answer >= :time_begin and time_answer <= :time_end group by user_name)) b 
        on users.user_name=b.user_name where users.role='user' order by last_time_answer ASC" );
		$sth->bindParam( ':time_begin', $time_begin );
		$sth->bindParam( ':time_end', $time_end );
		$sth->execute();

		return $sth->fetchAll( PDO::FETCH_CLASS, "User_Final_Answer" );
	}

	/**
	 * @param User_Answer $user_answer
	 *
	 * @return Question
	 */
	public function get_Question_From_User_Answer( $user_answer ) {
		include_once __DIR__ . '/../model/Question.php';
		include_once __DIR__ . '/../model/User_Answer.php';
		$time_answer = $user_answer->time_answer;
		$sth         = $this->PDO->prepare( "SELECT question_id, question, correct_answer, status, answer_time, time_begin, time_end 
                                  FROM questions WHERE time_begin<=:time_answer and :time_answer<=time_end" );
		$sth->bindParam( ':time_answer', $time_answer );
		$sth->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Question' );
		$sth->execute();

		return $sth->fetch();

	}

	/*
	 * @return boolean
	 */
	public function clear_user_answer() {
		include_once __DIR__ . '/../model/User_Answer.php';
		$sth = $this->PDO->prepare( "DELETE FROM users_answers WHERE 1" );

		return $sth->execute();
	}


}


?>


