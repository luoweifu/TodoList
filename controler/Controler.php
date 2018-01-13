<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 1/12/2018
 * Time: 8:34 PM
 */

require_once "db/DBConnect.php";

class Controler
{
    function getDBConnection()
    {
        $dbConn = DBConnect::getinstance();
        $dbConn->getConnect();
        return $dbConn;
    }

    function getMillisecond()
    {
        $time = explode ( " ", microtime () );
        $time = $time [1] . ($time [0] * 1000);
        $time2 = explode ( ".", $time );
        $time = $time2 [0];
        return$time;
    }
}