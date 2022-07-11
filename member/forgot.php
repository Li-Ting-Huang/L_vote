<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>尋回密碼</title>


    <!-- 外部css引入 -->
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/header.css">
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

            <form action="chk_acc.php" method="post">
                <h2 class="text-center">尋回密碼</h2>
                <div class="group">
                    <label>請輸入帳號:</label>
                    <input type="text" name='acc'>
                </div>
                <input class='btn' type="submit" value="檢查">
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