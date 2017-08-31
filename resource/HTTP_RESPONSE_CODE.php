<?php

include_once __DIR__ . '/../model/ResponseJson.php';
class HTTP_RESPONSE_CODE
{
    public static $OK=200;
    public static $CREATED=201;
    public static $NOTMODIFIED=304;
    public static $BADREQUEST=400;
    public static $UNAUTHORIZED=401;
    public static $FORBIDDEN=403;
    public static $NOTFOUND=404;
    public static $INTERNALSERVERERROR=500;



}