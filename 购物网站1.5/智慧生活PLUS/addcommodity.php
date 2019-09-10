<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body{
            background-color: rgba(100,100,150,0.3);
        }
        .form1{
            margin-top: 30px;
            margin-left: 150px;
        }
        .h1{
            margin-top: 10px;
            margin-left: 150px;
        }
    </style>

</head>
<body>
    <h1 class="h1">添加商品</h1>
    <form action="check.php" method="post" class="form1" onsubmit="return check() " enctype="multipart/form-data">
        <table>
            <tr>
                <td>价格：</td>
                <td><input type="text" placeholder="输入价格" name="price" id="price"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>商品图片：</td>
                <td><input type="file" placeholder="图片" name="image" id="image"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>商品描述：</td>
                <td><input type="text" placeholder="描述" name="describe" id="describe"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>商品库存量：</td>
                <td><input type="number" placeholder="库存量" name="inventory" id="inventory"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>用户id：</td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td>时间：</td>
                <td><input type="datetime-local" name="time" id="time"></td>
            </tr>
            <tr>
                <td><input type="submit" name="button" id="button" value="添加"></td>
                <td><input type="button" name="button2" id="button2" value="返回" onclick="location.href:'minzujie.php'"></td>
            </tr>
        </table>
        <script>
            function check() {

                //验证价格
                var price = document.getElementById("price");
                if (price.value == ''||isNaN(price.value))
                {
                    alert("商品价格必须是一串数字");//获得焦点
                    proame.focus();
                    return false;
                }

                //验证商品描述
                var describe = document.getElementById("describe");
                if (describe.value == '')
                {
                    alert("商品描述不能为空");//获得焦点
                    proame.focus();
                    return false;
                }

                //验证库存量
                var inventory = document.getElementById("inventory");
                if (inventory.value==''||isNaN(inventory.value)||inventory.value.indexof('.')!=-1)
                {
                    alert("库存量必须是整数");//获得焦点
                    proame.focus();
                    return false;
                }


            }
        </script>

    </form>


</body>
</html>