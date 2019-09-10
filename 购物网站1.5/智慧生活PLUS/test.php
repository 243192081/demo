<?php
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <?php
        $servername = "localhost";
        $username = "root";
        $password1 = "123456";
        $dbname = "ethnic_minority";

        // 创建连接
        $conn = mysqli_connect($servername, $username, $password1, $dbname);
        // 检测连接
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //获取到临时文件
        $file = $_FILES['touxiang'];

        //获取文件名
        $fileName = $file['name'];

        //移动文件到当前目录
        move_uploaded_file($file['tmp_name'], 'images/'.time().$fileName);

        $imgPath = 'images/'.time().$fileName;

        $sql = "CALL P_I_user ('$password', '$phone', '$address', '$nickname', '$imgPath');";

        if (mysqli_query($conn, $sql)) {
            header("location: minzujie.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>


</body>
</html>

