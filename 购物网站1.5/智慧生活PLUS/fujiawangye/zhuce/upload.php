
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <?php
        //获取到临时文件
        $file = $_FILES['file'];

        //获取文件名
        $fileName = $file['name'];

        //移动文件到当前目录
        move_uploaded_file($file['tmp_name'], $fileName);

        //显示文件
        echo "<img src='$fileName' style='width: 200px;height: 200px;border-radius: 50%'>"
    ?>

</body>
</html>

<?php

            $conn = new mysqli("localhost", "root", "","XSBOOK");
            // 检测连接
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }
            mysqli_set_charset( $conn , "utf8");

            $sql = "SELECT * FROM BOOK ";
            $result = $conn->query($sql);//执行SQL语句
            if ($result->num_rows >0)
                $i=1;
            while($row =$result->fetch_assoc()){

                ?>

                <td height="25" align="center"><?php
                    echo $row["ISBN"];
                    ?>
                </td>
                <td style="padding:5px;"><?php echo $row["书名"];?></td>
                <td style="padding:5px;"><?php echo $row["作者"];?></td>
                <td align="center">&nbsp;<?php echo $row["出版社"];?></td>
                <td align="center">&nbsp;<?php echo $row["价格"];?></td>
                <td align="center">&nbsp;<?php echo $row["复本量"];?></td>
                <td align="center">&nbsp;<?php echo $row["库存量"];?></td>
                <td align="center"><a style="font-size:18px;color: peru" href="GODELBOOK.php?userId=<?php echo $row["ISBN"]?>">删除</a>
                    --<a style="font-size:18px;color: palevioletred"href="GOupBOOK.php?userId=<?php echo $row["ISBN"]?>">修改</a>
                </td>
                </tr>
                <?php
            }
        ?>