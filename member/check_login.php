<?php
//檢查帳密是否正確
include "connect.php";
$acc=$_POST['acc'];
$pw=md5($_POST['pw']);

echo "$acc";
echo "$pw";

/* if($acc==資料表中的acc && $pw==資料表中的pw){
    //登入成功->會員中心

}else{
    //登入失敗->回到登入頁->顯示錯誤訊息
}
 */

$sql="SELECT count(*) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";


 $user=$pdo->query($sql)->fetchColumn();  
// $chk=$pdo->query($sql)->fetchColumn();

// if($user){
// // if($chk){
//     // $_SESSION['user']=$acc;
//     header("location:member_center.php");
// }else{
//     header("location:login.php?error=帳號或密碼錯誤");
// }
?>