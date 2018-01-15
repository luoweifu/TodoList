<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 1/11/2018
 * Time: 11:27 PM
 */

require_once "Controler.php";


class CategoryControler extends Controler
{
    function getCategoryList()
    {
        $startTime = $this->getMillisecond();
        $arrResult = array();
        $userId = $_GET["userId"];
        $sql = "SELECT pk_id, name FROM category WHERE pk_user_id=:userId;";
        $data = ["userId"=>$userId];
        $dbConn = $this->getDBConnection();
        $result = $dbConn->query($sql, $data, false);
        if(!isset($result))
        {
            $arrResult["errCode"] = 4000;
            $arrResult["errMsg"] = "getCategoryList failure.";
        } else{
            $arrResult["errCode"] = 2000;
            $arrResult["errMsg"] = "getUserList success!";
            $arr = array();
            $arrResult["data"] = array();
            for ($i = 0; $i < count($result); $i ++)
            {
                $row = $result[$i];
//                echo "name: " . $row['nick_name'] . "  phoneNum: ". $row['uk_phone_num'] . PHP_EOL;
                $arr["categoryId"] = $row['pk_id'];
                $arr["categoryName"] = $row['name'];
                $arrResult["data"][$i] = $arr;
            }
        }

        $arrResult["time"] = $this->getMillisecond() - $startTime;
        exit(json_encode($arrResult, JSON_UNESCAPED_UNICODE));
    }
}