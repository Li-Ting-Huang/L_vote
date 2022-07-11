<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>

    <!-- 外部css引入 -->
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/session.css">
    <link rel="stylesheet" href="../css/member.css">

    <title>會員登入</title>

</head>


<body>
    <div class="background"></div>
    <!-- header區 -->
    <div class="header">
        <?php
        include('../layout/header.php');

        ?>
    </div>
    <!-- header區結束 -->

    <!-- content區 -->
    <div class="section flex-column">
        <?php
        if (isset($_GET['error'])) {
            echo "<h2 class='red text-center'>{$_GET['error']}</h2>";
        }
        ?>
        <div class="login">
            <form action="check_login.php" method="post">
                <h2>會員登入</h2>
                <div class="group">

                    <label for="user_id">帳號</label>
                    <input type="text" name="acc" id="user_id">

                </div>

                <div class="group">

                    <label for="user_pw">密碼</label>
                    <input type="password" name="pw" id="user_pw">

                </div>

                <input class="btn" type="submit" value="登入">
                <input class="btn" type="reset" value="取消">



            </form>


        </div>
        <div class="btn-group">
            <button class="btn btn-danger" onclick="location.href='register.php'">尚未註冊</button>
            <button class="btn btn-danger" onclick="location.href='forgot.php'">忘記密碼</button>

        </div>
    </div>
    <!-- content區結束 -->
    <!-- footer區 -->
    <div class="footer">
        <?php
        include('../layout/footer.php');
        ?>
    </div>
    <!-- footer區結束 -->
</body>

</html>