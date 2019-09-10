<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    .h1{
        margin-top: 50px;
        margin-left: 300px;
    }
    .tab{
        margin-top: 50px;
        margin-left: 200px;

    }

    .IMG{
        width: 100px;
        height: 100px;
    }

</style>
<body>
    <?php
    session_start();
    ?>

<h1 class="h1">我的商品</h1>
    <table class="tab">

        <?php
        $servername = "localhost";
        $username = "root";
        $password1 = "123456";
        $dbname = "ethnic_minority";
        $user_id = @$_SESSION["user_id"];
        //连接数据库
        $conn = mysqli_connect($servername, $username, $password1, $dbname);
        if (!$conn)
        {
            die("连接失败: " . mysqli_connect_error());
        }

        $sql = "SELECT user_id,price,image,describe,inventory,time FROM commodity WHERE user_id='$user_id'";//从数据库中查询信息

        //将查询结果赋给result
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // 输出数据
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <td class="td1">用户id <?php echo $row["user_id"]?></td>

                <td class="td1">价格<?php echo $row["price"]?></td>

                <td class="td2">商品图片<img src="<?php echo $row["image"]?>" class="IMG"></td>

                <td class="td2">商品描述<?php echo $row["describe"]?></td>

                <td class="td2">商品库存量<?php echo $row["inventory"]?></td>

                <td class="td2">时间<?php echo $row["time"]?></td>

                <?php
            }
            } else {
                echo "0 结果";
            }
            mysqli_close($conn);
            ?>


    </table>
</body>
</html>