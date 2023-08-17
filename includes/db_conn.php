<?php
// 資料庫連線設定
$host = '127.0.0.1';        // 資料庫主機名稱
$dbname = 'blog';    // 資料庫名稱
$username = '';     // 資料庫使用者名稱
$password = '';     // 資料庫密碼

// 嘗試連線到資料庫
try {
    $pdo = new PDO(
        'mysql:host=' . $host . ';port=3306;dbname=' . $dbname,
        $username,
        $password
    );

    $pdo->query('SET NAMES "utf8mb4"');
}
catch( PDOException $e)
{
    
    echo "資料庫連線失敗: " . $e->getMessage(). PHP_EOL;
    exit;
} 
unset($host);
unset($dbname);
unset($username);
unset($password);
session_start();
?>

