<?php

//include_once 'session.php';

session_start();
if(isset($_SESSION['user'])!="")
{
    header("Location: home.php");
}

require_once 'db/DBConnect.php';

if(isset($_POST['btn-signup']))
{
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = md5("Todo_List" . $_POST['pass']);
    $dbConn = DBConnect::getinstance();
    $dbConn->getConnect();

    $sql = "INSERT INTO user(gmt_create, gmt_modified,  nick_name, uk_email, password) VALUES (NOW(), NOW(), :nickName, :email, :password);";
    $data = [':nickName'=>$_POST['uname'], ':email'=>$_POST['email'], ':password'=>$password];
//    $data = [':nickName'=>'spencer', 'email'=>'luoweifu@126.com', ':password'=>'password'];

    if(!$dbConn->executeDDL($sql, $data))
    {
        ?>
        <script>alert('registering error!');</script>

        <?php
    }
    else
    {
        header("Location: task.php");
    }
}
?>

<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TodoList | sign up</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <div id="login-form" align="center">
        <form method="post">
            <table align="center" width="300" border="0">
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="Your Email" required /></td>
                </tr>
                <tr>
                    <td>Nickname:</td>
                    <td><input type="text" name="uname" placeholder="Nick name" required /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass" placeholder="Password" required /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button type="submit" name="btn-signup">Sign up for TodoList</button></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><a href="signIn.php">Sign in</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>