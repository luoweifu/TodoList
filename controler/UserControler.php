<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 1/11/2018
 * Time: 11:27 PM
 */
require_once "Controler.php";

class UserControler extends Controler
{
    function signUp()
    {
        $startTime = $this->getMillisecond();
//        echo "startTime:" . $startTime;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $uuserName = $_POST['userName'];

        $arrResult = array();
        $sql = "INSERT INTO user(gmt_create, gmt_modified,  nick_name, uk_email, password) VALUES (NOW(), NOW(), :nickName, :email, :password);";
        $data = [':nickName'=>$uuserName, ':email'=>$email, ':password'=>$password];
        $dbConn = $this->getDBConnection();
        if(!$dbConn->executeDDL($sql, $data))
        {
            $arrResult["errCode"] = 400;
            $arrResult["errMsg"] = "signUp success!";
        } else{
            $arrResult["errCode"] = 500;
            $arrResult["errMsg"] = "operate database faailure.";
        }
        $arrResult["time"] = $this->getMillisecond() - $startTime;
        exit(json_encode($arrResult, JSON_UNESCAPED_UNICODE));
    }

    function signIn()
    {
        echo "signIn()";
    }

    function getUserList()
    {
        $startTime = $this->getMillisecond();
        $arrResult = array();
        $sql = "SELECT nick_name, uk_phone_num, uk_email FROM user;";
        $data = [];
        $dbConn = $this->getDBConnection();
        $result = $dbConn->query($sql, $data, false);
        if(!isset($result))
        {
            $arrResult["errCode"] = 400;
            $arrResult["errMsg"] = "getUserList failure.";
        } else{
            $arrResult["errCode"] = 200;
            $arrResult["errMsg"] = "getUserList success!";
            $arr = array();
            $arrResult["data"] = array();
            for ($i = 0; $i < count($result); $i ++)
            {
                $row = $result[$i];
//                echo "name: " . $row['nick_name'] . "  phoneNum: ". $row['uk_phone_num'] . PHP_EOL;
                $arr["name"] = $row['nick_name'];
                $arr["phoneNum"] = $row['uk_phone_num'];
                $arr["email"] = $row['uk_email'];
                $arrResult["data"][$i] = $arr;
            }
        }

        $arrResult["time"] = $this->getMillisecond() - $startTime;
        exit(json_encode($arrResult, JSON_UNESCAPED_UNICODE));
    }
}