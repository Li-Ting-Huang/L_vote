<?php


//取得主題資料
$subject=find("subjects",$_GET['id']);

//取得選項資料
$opts=all('options',['subject_id'=>$_GET['id']]);

?>
<div class="container">
<h1><?=$subject['subject'];?></h1>

<form action="./api/vote.php" method="post">
<table >
                <?php
                foreach ($opts as $key => $opt) {
                ?>
                    <?php
                    if ($subject['multiple'] == 0) {
                    ?>
                        <tr>
                            <td>
                                <input id="opt<?= $key; ?>" type="radio" name="opt" value="<?= $opt['id']; ?> ">
                            <?php
                        } else {
                            ?>
                        <tr>
                            <td>
                                <input id="opt<?= $key; ?>" type="checkbox" name="opt[]" value="<?= $opt['id']; ?>">
                            <?php
                        }
                            ?>
                            <label for="opt<?= $key; ?>"><?= $opt['option']; ?></label>
                            </td>
                        </tr>

                    <?php
                }
                    ?>
            </table>
<input class="btn" type="submit" value="投票">
<input class="btn" type="reset" value="重置">
<input class="btn" type="button" value="回首頁" onclick="location.href='index.php'">
</table>
</form>
</div>