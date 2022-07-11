<div class="nav">
    <ul>
        <?php
        //判斷是否為會員
        if (isset($_SESSION['user'])) {
        ?>
            <button class="btn" onclick="location.href='index.php'">投票中心</a></button>
            <button class="btn" onclick="location.href='./member/login.php'">會員中心</a></button>
            <button class="btn" onclick="location.href='./front/vote.php'">登出</a></button>
            
        <?php
        } else {
        ?>
            <button class="btn" onclick="location.href='index.php'">投票中心</a></button>
            <button class="btn" onclick="location.href='./member/login.php'">會員中心</a></button>
            <button class="btn" onclick="location.href='./front/vote.php'">登入</a></button>
        <?php
        }
        ?>
    </ul>
</div>