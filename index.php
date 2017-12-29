<!--<html>-->
<!--<head>-->
<!--    <title>-->
<!--        Login-->
<!--    </title>-->
<!--    <link type="text/css" href="css/login.css" rel="stylesheet" />-->
<!--</head>-->
<!--<body>-->
<!--<div id="container">-->
<!--    <div class="logo">-->
<!--        <a href="#">-->
<!--            <img src="assets/logo.png" alt="center"/>-->
<!--        </a>-->
<!--    </div>-->
<!--    <div id="box">-->
<!--        <form name="LoginForm" method="post" action="login.php" onSubmit="return InputCheck(this)">-->
<!--            <p class="main">-->
<!--                <label for="username" class="label">用户名:</label>-->
<!--                <input id="username" name="username" type="text" class="input" />-->
<!--                <label for="password" class="label">密 码:</label>-->
<!--                <input id="password" name="password" type="password" class="input" />-->
<!--            <p/>-->
<!--            <p class="space">-->
<!--                <input type="submit" name="submit" value="确 定 " class="login" />-->
<!--            </p>-->
<!--            <p class="main">-->
<!--                本站属于学校内部网站，登陆后方可使用。如未注册请先注册。-->
<!--                <a href="reg.php">-->
<!--                    点我注册-->
<!--                </a>-->
<!--            </p>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->


<?php

//include 'Person.php';
//require __DIR__ . '/Person.php';
require 'Person.php';
require 'db/DBConnect.php';


use user\Person;

$person = new Person("Spencer", 25);
echo "Name:", $person->getName(), " Age:", $person->getAge();
$dbOperator = DBConnect::getInstance('todolist', true)->getDB();
//$dbOperator->db();
$dbOperator->executeDDL("");
