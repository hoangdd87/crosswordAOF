<?php
/**
 * Created by PhpStorm.
 * User: Hoang
 * Date: 30-Aug-17
 * Time: 11:52 PM
 */

/*
     * @param int $httpcode
     * @param boolean $successful
	 * @param string $message
     */
function response($httpcode, $successful, $message)
{
    include_once __DIR__ . '/../model/ResponseJson.php';
    http_response_code($httpcode);
    $response = new Response_Json($successful, $message);
    exit(json_encode($response));
}