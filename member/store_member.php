<?php
include('../api/base.php');
// 接收
$acc=$_POST['acc'];
$pw=md5($_POST['pw']);

$birthday = $_POST['birthday'];
$email = $_POST['email'];

//判斷是否有重複註冊

$dataAcc = ['acc'=>$acc];
$dataEmail = ['email'=>$email];

$findAcc = find('users',$dataAcc);
$findEmail = find('users',$dataEmail);


if(!empty($findAcc)||!empty($findEmail)){
    header("location:login.php?error=帳號已被註冊");
}else{

$data = ['acc'=>$acc,'pw'=>$pw,'birthday'=>$birthday,'email'=>$email];
    
insert('users',$data);

header("location:login.php?error=註冊成功");

// to('./login.php');


}

?>