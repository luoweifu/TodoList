
<?php

//var_dump($_SERVER);

$uri = $_SERVER['REQUEST_URI'];
//echo "uri:" . $uri;
//echo "<br>";
$uri = str_replace("\\", "/", $uri);
//echo "uri:" . $uri;
//echo "<br>";

$uriArr = $path_info = explode("/", $uri);
//echo "uriArr:";
//print_r($uriArr);
//echo "<br>";

$arrCount = count($uriArr);
if ($arrCount == 2 || $uriArr[1] != "backend")
{
    exit('Invalid url path:'. $uri);
}

require_once "controler/UserControler.php";

if (!isset($uriArr[2]))
{
    exit('Invalid url path:'. $uri);
}

//echo "curTime:" . microtime();

switch ($uriArr[2])
{
    case "user":
        $user = new UserControler();
        if (isset($uriArr[3]) &&  method_exists($user, $uriArr[3])){
            $user->$uriArr[3]();
        }else{
            exit('error in ' .$uriArr[3] );
        }
        break;
    case "category":
        echo "你喜欢的颜色是蓝色!";
        break;
    case "tag":
        echo "你喜欢的颜色是绿色!";
        break;
    case "task":
        echo "你喜欢的颜色是绿色!";
        break;
    default:
        exit('Invalid url path:'. $uri);
}



//$dbms='mysql';     //数据库类型
//$host='localhost:3307'; //数据库主机名
//$dbName='todolist';    //使用的数据库
//$user='spencer';      //数据库连接用户名
//$pass='Spencer.Luo';          //对应的密码
//$dsn="$dbms:host=$host;dbname=$dbName";

//$conn = DBConnect::getinstance($dbms, $host, $dbName, $user, $pass, true);
//$conn->showInfo();
//$conn->getConnect();
////$a = arrar(':account'=>'Spencer', ':nickName'=>'Spencer', ':phoneNum'=>'18500315888', ':email'=>'luoweifu@126.com', ':password'=>'Spencer.Luo');
////$id = $conn->executeDDL("INSERT INTO user(gmt_create, gmt_modified, uk_account, nick_name, uk_phone_num, uk_email, password) VALUES (NOW(), NOW(), :account, :nickName, :phoneNum, :email, :password);",
////    [':account'=>'Tony', ':nickName'=>'Tony', ':phoneNum'=>'18500315888', ':email'=>'luoweifu@126.com', ':password'=>'Tony.Luo']);
//$result = $conn->query("SELECT nick_name, uk_phone_num, uk_email FROM user; ", array());
//foreach ($result as $row)
//{
////    print_r($row);
//    echo "name: " . $row['nick_name'] . "  phoneNum: ". $row['uk_phone_num'] . PHP_EOL;
//}

?>
