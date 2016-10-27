<?php


class SESSTION
{
    public static $user_array="user_array";

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @return User
     */
    public function get_User_Logon(){
        $object=(object)$_SESSION[self::$user_array];
        return $object;
    }

    /**
     * @param User
     * @return void
     */
    public function set_User_Logon($user){
        $_SESSION[self::$user_array]=(array)$user;

    }

    /**
     * @return void
     */
    public function unset_User_logon(){
        unset($_SESSION[self::$user_array]);
    }

    /**
     * @return boolean
     */
    public function is_User_logon_empty(){
        return empty($_SESSION[self::$user_array]);
    }

}