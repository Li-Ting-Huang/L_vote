<?php
include('../api/base.php');


$acc=$_POST['acc'];
$pw=md5($_POST['pw']);
$email = $_POST['email'];

$dataAcc = ['acc'=>$acc];
$dataEmail = ['email'=>$email];

$findAcc = find('users',$dataAcc);
$findEmail = find('users',$dataEmail);

// $data = ['acc'=> $acc];

$check = find('users',$acc);

if(empty($check)){
    header("location:login.php?error=查無此帳號");
}else{
    header("location:login.php?error=密碼已發置您的信箱");
}

?>
<a href="index.php">回首頁</a><a href="login.php">重新登入</a>