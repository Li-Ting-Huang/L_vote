<?php

include_once "./api/base.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票管理中心</title>
    <!--使用拆分css檔案的方式來區分共用的css設定及前後台不同的css-->
    <!-- 外部css引入 -->
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/session.css">
    <link rel="stylesheet" href="./css/front.css">

</head>
<div class="background"></div>
<!-- header區 -->
<div class="header">
    <?php
    include('./layout/header.php');

    ?>
</div>
<!-- header區結束 -->
<?php
    //建立分頁所需的變數群
    $orderStr = '';
$total = math('subjects', 'count', 'id'); //計算指定條件的資料總筆數
$div = 3;                                           //每頁資料筆數
$pages = ceil($total / $div);                       //計算總頁數
$now = isset($_GET['p']) ? $_GET['p'] : 1;          //從網址參數取得目前所在頁數
$start = ($now - 1) * $div;                         //計算要從那個索引開始取得資料
$page_rows = " limit $start,$div";                  //建立SQL語法的limit字串
$subjects = all('subjects', $orderStr . $page_rows);
    ?>
<!-- content區 -->
<div class="section flex-column">
    <?php
    //根據網址有沒有帶do這個參數來決定要include那個外部檔案
    if (isset($_GET['do'])) {
        $file = "./back/" . $_GET['do'] . ".php";
    }

    //判斷$file變數是否存在及$file所代表的檔案位置是否存在
    if (isset($file) && file_exists($file)) {
        include $file;
    } else {
    ?>
        <button class="btn btn-primary" onclick="location.href='?do=add_vote'">新增投票</button>

        <div>
            <ul>
                <li class='list-header'>
                    <div>投票主題</div>
                    <div>單/複選題</div>
                    <div>投票期間</div>
                    <div>剩餘天數</div>
                    <div>投票人數</div>
                    <div>操作</div>
                </li>
                <?php
                //使用all()函式來取得資料表subjects中的所有資料，請參考base.php中的函式all($table,...$arg)
                $subjects = all('subjects');

                //使用迴圈將每一筆資料的內容顯示在畫面上
                foreach ($subjects as $subject) {
                    echo "<li class='list-items'>";
                    echo "<div>{$subject['subject']}</div>";
                    if ($subject['multiple'] == 0) {
                        echo "<div class='text-center'>單選題</div>";
                    } else {
                        echo "<div class='text-center'>複選題</div>";
                    }
                    echo "<div class='text-center'>";
                    echo $subject['start'] . " ~ " . $subject['end'];
                    echo "</div>";
                    echo "<div class='text-center'>";
                    $today = strtotime("now");
                    $end = strtotime($subject['end']);
                    if (($end - $today) > 0) {
                        $remain = floor(($end - $today) / (60 * 60 * 24));
                        echo "倒數" . $remain . "天結束";
                    } else {
                        echo "<span style='color:grey'>投票已結束</span>";
                    }

                    echo "</div>";
                    echo "<div class='text-center'>{$subject['total']}</div>";
                    echo "<div class='text-center'>";
                    echo "<a class='edit' href='?do=edit&id={$subject['id']}'>編輯</a>";
                    echo "<a class='del' href='?do=del&id={$subject['id']}'>刪除</a>";
                    echo "</div>";
                    echo "</li>";
                }

                ?>
            </ul>

        </div>
    <?php
    }
    ?>
</div>

<div class="page">
<?php
//在列表下方顯示頁碼及連結
if ($pages > 1) {
    for ($i = 1; $i <= $pages; $i++) {
        
        //同時帶入網址的分頁及排序參數，用來記憶頁面行為的狀態
        echo "<a href='?p={$i}'>&nbsp;";
        echo $i;
        echo "&nbsp;</a>";
    }
}

?>
</div>

</div>
</div>
<!-- content區結束 -->
<!-- footer區 -->
<div class="footer">
    <?php
    include('./layout/footer.php');
    ?>
</div>
<!-- footer區結束 -->
</body>

</html>