
<?php
error_reporting(0);
date_default_timezone_set("Asia/Shanghai");
$_DocumentPath = $_SERVER['DOCUMENT_ROOT'];
$_RequestUri = $_SERVER['REQUEST_URI'];
$_UrlPath = $_RequestUri;
$_FilePath = __FILE__;
$_AppPath = str_replace($_DocumentPath, '', $_FilePath);    //==>\router\index.php
$_AppPathArr = explode(DIRECTORY_SEPARATOR, $_AppPath);
echo "_DocumentPath:" . $_DocumentPath . "<br>";
echo "_RequestUri:" . $_RequestUri. "<br>";
echo "_UrlPath:" . $_UrlPath. "<br>";
echo "_AppPath" . $_AppPath. "<br>";
echo "$_AppPathArr:" . $_AppPathArr. "<br>";

for ($i = 0; $i < count($_AppPathArr); $i++) {
    $p = $_AppPathArr[$i];
    if ($p) {
        $_UrlPath = preg_replace('/^\/'.$p.'\//', '/', $_UrlPath, 1);
    }
}

echo "_UrlPath:" . $_UrlPath. "<br>";

$_UrlPath = preg_replace('/^\//', '', $_UrlPath, 1);
$_AppPathArr = explode("/", $_UrlPath);
$_AppPathArr_Count = count($_AppPathArr);
$arr_url = array(
    'controller' => 'sharexie/test',
    'method' => 'index',
    'parms' => array()
);

$arr_url['controller'] = $_AppPathArr[0];
$arr_url['method'] = $_AppPathArr[1];

echo "arr_url:" . $arr_url. "<br>";

if ($_AppPathArr_Count > 2 and $_AppPathArr_Count % 2 != 0) {
    die('参数错误');
} else {
    for ($i = 2; $i < $_AppPathArr_Count; $i += 2) {
        $arr_temp_hash = array(strtolower($_AppPathArr[$i])=>$_AppPathArr[$i + 1]);
        $arr_url['parms'] = array_merge($arr_url['parms'], $arr_temp_hash);
    }
}
$module_name = $arr_url['controller'];
$module_file = $module_name.'.class.php';
$method_name = $arr_url['method'];

if (file_exists($module_file)) {
    include $module_file;

    $obj_module = new $module_name();

    if (!method_exists($obj_module, $method_name)) {
        die("要调用的方法不存在");
    } else {
        if (is_callable(array($obj_module, $method_name))) {
            $obj_module -> $method_name($module_name, $arr_url['parms']);
            $obj_module -> printResult();
        }
    }
} else {
    die("定义的模块不存在");
}



//var_dump($_SERVER);
//require_once 'User.php';
//
////$path = pathinfo('index.php');
//
//$path_info = explode('/', $_SERVER['PATH_INFO']);
//var_dump($_SERVER);
//
//echo "path_info:";
//var_dump($path_info);
//
//if (isset($path_info[1]) && $path_info[1] == 'User'){
//    $user = new User();
//    if (isset($path_info[2]) &&  method_exists($user, $path_info[2])){
//        $user->$path_info[2]();
//        exit('666666666');
//    }else{
//        exit('Userxxxx');
//    }
//}

//var_dump($_SERVER);
//echo 'QUERY_STRING' . $_SERVER['QUERY_STRING'];
//
//echo '<br>';
//echo '你的Action是：' . $_GET['action'];
//echo '<br/>';
//echo '你的ID是：' . $_GET['id'];
//echo '<br/>';
//echo '你的arg是：' . $_GET['arg'];

//echo "c:" . $_GET('c');
//echo "m:" . $_GET('m');

//var_dump($_SERVER);


//echo "domain:" . $_GET['domain'];


//session_start();
//include 'Person.php';
//require __DIR__ . '/Person.php';
//require_once 'Person.php';
//require_once 'db/DBConnect.php';
//include_once 'signUp.php';

//require Yaf_Registry;

//echo  __DIR__;

//use user\Person;

//$person = new Person("Spencer", 25);
//echo "Name:", $person->getName(), " Age:", $person->getAge();
//$dbOperator = DBConnect::getInstance('todolist', true)->getDB();
////$dbOperator->db();
//$dbOperator->executeDDL("");


$dbms='mysql';     //数据库类型
$host='localhost:3307'; //数据库主机名
$dbName='todolist';    //使用的数据库
$user='spencer';      //数据库连接用户名
$pass='Spencer.Luo';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";


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


//$conn = DBConnect::getinstance();
//$conn->

//try {
//    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
//    echo "连接成功";
//    $dbh = null;
//} catch (PDOException $e) {
//    die ("Error!: " . $e->getMessage());
//}

//$file_contents = file_get_content("http://www.ezhi.net/api/test/index.php");
//$file_contents = file_get_content("http://www.ezhi.net/api/test/index.php?a=get_users");
//$file_contents = file_get_content("http://www.ezhi.net/api/test/index.php?a=get_users&uid=10001");
//$file_contents = file_get_content("http://www.ezhi.net/api/test/index.php?a=get_users&uid=10002");
//$file_contents = file_get_content("http://www.ezhi.net/api/test/index.php?a=get_users&uid=10003");

//require_once 'signUp.php'

//
//
//foreach ($dbh->query("SELECT * FROM user") as $row)
//{
//    print_r($row);
////        echo $row;
//}
//
//try {
//    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    $dbh->beginTransaction();
//    $dbh->exec("INSERT INTO user(gmt_create, gmt_modified, uk_account, nick_name, uk_phone_num, uk_email, password) VALUES (NOW(), NOW(), 'Tony', 'Tony', '18500315888', 'luoweifu@126.com', 'Spencer.Luo');");
////        $dbh->exec("insert into salarychange (id, amount, changedate)
////      values (23, 50000, NOW())");
//    $dbh->commit();
//
//} catch (Exception $e) {
//    $dbh->rollBack();
//    echo "Failed: " . $e->getMessage();
//}

//phpinfo();
?>

<html>
<head>
    <title>Welcom to TodoList</title>
</head>
<body>
<p>This is content test.</p>
</body>
</html>