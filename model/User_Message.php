<?php


class User_Message {
	public $user_name;
	public $message;
	public $time;

	/**
	 * User_Message constructor.
	 *
	 * @param $user_name
	 * @param $message
	 * @param $time
	 */
	public function __construct( $user_name, $message, $time ) {
		$this->user_name = $user_name;
		$this->message   = $message;
		$this->time      = $time;
	}


}

?>