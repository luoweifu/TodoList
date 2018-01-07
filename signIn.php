<?php
session_start();

require_once 'db/DBConnect.php';

if(isset($_SESSION['user'])!="")
{
    header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
    $dbConn = DBConnect::getinstance();
    $dbConn->getConnect();
    $sql = "SELECT nick_name, password FROM user WHERE uk_email = :email";
    $data = [':email'=>$_POST['email']];
    $uPassword = md5("Todo_List" . $_POST['pass']);
    $result = $dbConn->query($sql, $data, true);

    echo "email:" . $_POST['email'] . "  Password from database:" . $result['password'] . "  Password from input:" . $uPassword;
    if($result['password'] == $uPassword)
    {
        $_SESSION['user'] = $result['pk_id'];
        header("Location: task.php");
    }
    else
    {
        ?>
        <script>alert('Sing in failure, please check your email and passowrd again.');</script>
        <?php
    }

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TodoList | SignUp</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <div id="login-form" align="center">
        <form method="post">
            <table align="center" width="30%" border="0">
                <tr>
                    <td><input type="text" name="email" placeholder="Your Email" required /></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" placeholder="Your Password" required /></td>
                </tr>
                <tr>
                    <td><button type="submit" name="btn-login">Sign In</button></td>
                </tr>
                <tr>
                    <td><a href="signUp.php">Sign up</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>