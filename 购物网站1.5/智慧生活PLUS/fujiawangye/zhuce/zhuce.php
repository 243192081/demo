<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<style type="text/css">
		body{
			width: 970px;
			height: 800px;
			margin: 50px auto;
			background-color: #81C0C0;
		}

        .div1{
            width: 100px;
            height: 100px;
            border: 1px black solid;
            border-radius: 50%;
        }

	</style>
	<body>
        <h1>用户注册</h1>
        <form action="../../test.php" method="POST" onsubmit= "return formCheck()" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>昵称：</td>
                    <td><input type="text"  id="nickname" name="nickname" size="20"></td>
                </tr>
                <tr>
                    <td>密码：</td>
                    <td><input type="password" id="pwd" name="password" size="20"></td>
                </tr>
                <tr>
                    <td>确认密码：</td>
                    <td><input type="password" id="rpwd" name="rpassword" size="20"></td>
                </tr>

                <tr>
                    <td>通讯地址：</td>
                    <td><input type="text" id="address" name="address" size="20"></td>
                </tr>
                <tr>
                    <td>电话：</td>
                    <td><input type="number" id="phone"name="phone" size="20"></td>
                </tr>
                <tr>
                    <td>上传头像：</td>
                    <td><input type="file" name="touxiang"></td>
                </tr>
            </table>

            <input class="btn" type="Submit" value="注册">

        </form>
        <script>
            //输入密码不一样
            function formCheck(){

                var p1=document.getElementById("pwd").value;
                var p2=document.getElementById("rpwd").value;
                if (p1 != p2){
                    alert("两次输入的密码不相同！");

                }

                //验证昵称
                var nickname = document.getElementById("nickname");
                if (nickname.value == '')
                {
                    alert("商品价格必须是一串数字");//获得焦点
                    proame.focus();
                    return false;
                }

                //验证通讯地址
                var address = document.getElementById("address");
                if (describe.value == '')
                {
                    alert("通讯地址不能为空");//获得焦点
                    proame.focus();
                    return false;
                }
            }

        </script>
    </body>
</html>
