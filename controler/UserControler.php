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
        $password = md5("Todo_List" . $_POST['password']);
        $uuserName = $_POST['userName'];

        $arrResult = array();
        $sql = "INSERT INTO user(gmt_create, gmt_modified,  nick_name, uk_email, password) VALUES (NOW(), NOW(), :nickName, :email, :password);";
        $data = [':nickName'=>$uuserName, ':email'=>$email, ':password'=>$password];
        $dbConn = $this->getDBConnection();
        if($dbConn->executeDDL($sql, $data))
        {
            $arrResult["errCode"] = 2000;
            $arrResult["errMsg"] = "signUp success!";
        } else{
            $arrResult["errCode"] = 5000;
            $arrResult["errMsg"] = "operate database faailure.";
        }
        $arrResult["time"] = $this->getMillisecond() - $startTime;
        exit(json_encode($arrResult, JSON_UNESCAPED_UNICODE));
    }

    function signIn()
    {
        $startTime = $this->getMillisecond();
//        echo "startTime:" . $startTime;
        $email = $_POST['email'];
        $password = md5("Todo_List" . $_POST['password']);
//        $uuserName = $_POST['userName'];

        $arrResult = array();
        $sql = "SELECT pk_id, nick_name, password FROM user WHERE uk_email = :email;";
        $data = [':email'=>$_POST['email']];
        $dbConn = $this->getDBConnection();
        $result = $dbConn->query($sql, $data, true);

//        echo "email:" . $_POST['email'] . "  Password from database:" . $result['password'] . "  Password from input:" . $password;
        error_log("email:" . $_POST['email'] . "  Password from database:" . $result['password'] . "  Password from input:" . $password);
        if(isset($result['password']) && $result['password'] == $password)
        {
            $_SESSION['user'] = $result['pk_id'];
//            header("Location: dashbaord.html");
            $arrResult["errCode"] = 2000;
            $arrResult["errMsg"] = "signIn success!";
        }
        else {
            $arrResult["errCode"] = 5000;
            $arrResult["errMsg"] = "operate database faailure.";
        }
        $arrResult["time"] = $this->getMillisecond() - $startTime;
        $json = json_encode($arrResult, JSON_UNESCAPED_UNICODE);
        error_log("sign in ended data:" . $json);
        exit($json);
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