<?php
$servername = "localhost";
$username = "root";
$password1 = "123456";
$dbname = "ethnic_minority";
?>
<?php
    // Session需要先启动。
    session_start();
    //判断phone和pwd是否赋值
    if(isset($_POST['phone']) && isset($_POST['pwd'])){
        $phone = $_POST['phone'];
        $pwd = $_POST['pwd'];
        //连接数据库
        $conn = mysqli_connect($servername, $username, $password1, $dbname);
        if (mysqli_connect_errno($conn))
        {
            echo "连接 MySQL 失败: " . mysqli_connect_error();
        }

        //验证内容是否与数据库的记录吻合。
        $sql = "SELECT phone,password FROM user WHERE (phone='$phone') AND (password='$pwd')";

        if ($result=mysqli_query($conn,$sql))
        {
            // 返回记录数
            $rowcount=mysqli_num_rows($result);

            //判断查询结果是否为0
            if ($rowcount == 0){
                echo "电话或者密码错误";
            }
            // 释放结果集
            mysqli_free_result($result);
        }


        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录校验</title>
</head>
<body>
    <h1>用户登录</h1>
    <form method="POST">

        <tr>
            <td><input type="tel" name="phone" placeholder="电话" /></td><br/>
        </tr>
        <tr>
            <td><input type="password" name="pwd" placeholder="密码" /></td><br/>
        </tr>
        <tr>
            <td><input type="submit" value="登录"></td><br/>
        </tr>

    </form>
</body>
</html>
