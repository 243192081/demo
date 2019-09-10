
<?php
    //连接数据库
    $servername = "localhost";
    $username = "root";
    $password1 = "123456";
    $dbname = "ethnic_minority";

    // 创建连接
    $conn = mysqli_connect($servername, $username, $password1, $dbname);
    mysqli_set_charset( $conn , "utf8");
    // 检测连接
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['button'])){
        session_start();
        $_SESSION["user_id"] = $_POST['user_id'];
        $price = $_POST['price'];
        $describe = $_POST['describe'];
        $inventory = $_POST['inventory'];
        $user_id = $_POST['user_id'];
        $time = $_POST["time"];

    //获取到临时文件
    $file = $_FILES['image'];
    //获取文件名
    $fileName = $file['name'];
    //移动文件到当前目录
    move_uploaded_file($file['tmp_name'], 'images/'.time().$fileName);

    $imgPath = 'images/'.time().$fileName;

    $sql = "insert into commodity values ('','$price', '$imgPath', '$describe', '$inventory', '$user_id', '$time');";
        if (mysqli_query($conn, $sql)) {
            header("Location:good.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
    mysqli_close($conn);
?>


