<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;700&display=swap" rel="stylesheet">

    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .wrap {
            width: 1000px;
            margin: 0 15px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            border: 1px solid #888;
        }

        .container {
            width: 1000px;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;

        }

        .item {
            text-align: center;
            width: 300px;
           
            margin: 15px;
            display: flex;
            flex-direction: column;
            background-color: white;
            border-radius: 10px;
            font-family: 'Noto Sans TC', sans-serif;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .5);

        }

        .item .pic {
            margin: auto;
            width: 250px;
            height: 200px;
        }

        .item .pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .item .txt {
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
        }

    
        .item .txt .btn:hover {
            background-color: #ccc;
            color: #fff;
        }
        .page{
            width: 1000px;
            text-align: center;
            
        }
        .page a{
            text-decoration: none;
            padding: 10px;
        }
    </style>
</head>

<body>
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
    <div class="wrap">
        <div class="container">
            <?php
            foreach ($subjects as $subject) {
            ?>

                <div class="item">
                    <div>
                        <h2>主題 : <?=$subject['subject'];?></h2>

                    </div>
                    <div class="pic">
                        <img src="https://picsum.photos/id/684/400/400" alt="">
                    </div>
                    <?php
                    $today = strtotime("now");
                    $end = strtotime($subject['end']);
                    if (($end - $today) > 0) {
                        $remain = floor(($end - $today) / (60 * 60 * 24));
                        echo "倒數" . $remain . "天結束";
                    } else {
                        echo "<span style='color:grey'>投票已結束</span>";
                    }
                    ?>
                    <div>
                        <p>時間 :<?=$subject['start'];?>~<?=$subject['end'];?></p>
                    </div>

                    <button class="btn btn-primary" onclick="location.href='?do=vote&id=<?= $subject['id']; ?>'">參加投票</button>
                    <button class="btn btn-primary" onclick="location.href='?do=vote_result&id=<?=$subject['id'];?>'">查看結果</button>
                </div>
            <?php
            }
            ?>

<!-- 問題1.已結束的不能投票 -->

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
</body>

</html>