
<?php

//include 'Person.php';
//require __DIR__ . '/Person.php';
require_once 'Person.php';
require_once 'db/DBConnect.php';
//require Yaf_Registry;

//echo  __DIR__;

use user\Person;

//$person = new Person("Spencer", 25);
//echo "Name:", $person->getName(), " Age:", $person->getAge();
//$dbOperator = DBConnect::getInstance('todolist', true)->getDB();
////$dbOperator->db();
//$dbOperator->executeDDL("");



$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='todolist';    //使用的数据库
$user='spencer';      //数据库连接用户名
$pass='Spencer.Luo';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

$conn = DBConnect::getinstance($dbms, $host, $dbName, $user, $pass, true);
$conn->showInfo();
$conn->getConnect();
//$a = arrar(':account'=>'Spencer', ':nickName'=>'Spencer', ':phoneNum'=>'18500315888', ':email'=>'luoweifu@126.com', ':password'=>'Spencer.Luo');
$id = $conn->executeDDL("INSERT INTO user(gmt_create, gmt_modified, uk_account, nick_name, uk_phone_num, uk_email, password) VALUES (NOW(), NOW(), :account, :nickName, :phoneNum, :email, :password);",
    [':account'=>'Tony', ':nickName'=>'Tony', ':phoneNum'=>'18500315888', ':email'=>'luoweifu@126.com', ':password'=>'Tony.Luo']);
$result = $conn->query("SELECT nick_name, uk_phone_num, uk_email FROM user; ", array());
foreach ($result as $row)
{
    print_r($row);
}

//$conn = DBConnect::getinstance();
//$conn->

//try {
//    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
//    echo "连接成功";
//    foreach ($dbh->query("SELECT * FROM user") as $row)
//    {
//        print_r($row);
////        echo $row;
//    }
//
//    try {
//        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        $dbh->beginTransaction();
//        $dbh->exec("INSERT INTO user(gmt_create, gmt_modified, uk_account, nick_name, uk_phone_num, uk_email, password) VALUES (NOW(), NOW(), 'Tony', 'Tony', '18500315888', 'luoweifu@126.com', 'Spencer.Luo');");
////        $dbh->exec("insert into salarychange (id, amount, changedate)
////      values (23, 50000, NOW())");
//        $dbh->commit();
//
//    } catch (Exception $e) {
//        $dbh->rollBack();
//        echo "Failed: " . $e->getMessage();
//    }
//
//    $dbh = null;
//} catch (PDOException $e) {
//    die ("Error!: " . $e->getMessage());
//}

//phpinfo();