<?php
if(!$_SESSION['role'])
{
    echo "導回登入頁";
    $URL="login.php"; 
    header("Location: $URL");// 將網址導回登入頁
}
