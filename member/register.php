<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <!-- 外部css引入 -->
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/session.css">
    <link rel="stylesheet" href="../css/member.css">

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
    <div class="login">
    <form action="store_member.php" method="post">
            <h2>會員註冊</h2>
            <div class="group">
                <label for="user_id">帳號</label>
                <input type="text" name="acc" id="user_id">
            </div>

            <div class="group">
                <label for="user_pw">密碼</label>
                <input type="password" name="pw" id="user_pw">
            </div>

            <div class="group">
                <label for="user_birthday">生日</label>
                <input type="date" name="birthday" id="user_birthday">
            </div>


            <div class="group">
                <label for="user_email">email</label>
                <input type="email" name="email" id="user_email">
            </div>


            <input class="btn" type="submit" value="註冊">
            <input class="btn" type="reset" value="清空">



        </form>
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