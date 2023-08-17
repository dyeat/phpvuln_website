<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="js/color-modes.js"></script>
    <meta charset="utf-8">
    <title>註冊頁面</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/sign-in.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
<main class="form-signin w-100 m-auto">
  <form action="" method="post">
    <h1 class="h3 mb-3 fw-normal">註冊頁面</h1>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="帳號">
      <label for="floatingInput">帳號 </label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="密碼">

<?php
require_once(dirname(__FILE__)) . '/../includes/db_conn.php';
header("Content-Type:text/html; charset=utf-8");

isset($_POST['username']) ? $username = filter_input(INPUT_POST, 'username') : $username = '';
isset($_POST['password']) ? $password = filter_input(INPUT_POST, 'password') : $password = '';

$sql = "INSERT INTO users (username, password, createdate) VALUES (:username, :password, :createdate)";
$stmt= $pdo->prepare($sql);
if (!empty($password))
{
    // md5
    $hashedPassword = md5($password);
}

// 綁定參數
$stmt->bindParam(":username", $username, PDO::PARAM_STR);
$stmt->bindParam(":password", $hashedPassword, PDO::PARAM_STR);

// 取得當前的時間戳
$createdate = time();
$stmt->bindParam(":createdate", $createdate, PDO::PARAM_INT);

// 確定使用者是否已存在
if (true)
{
    $sql = 'SELECT * FROM  users WHERE username =' . "'$username'";
    $old_user = '';
    $stmt1 = $pdo->prepare($sql);
    $stmt1->execute();

    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        $old_user = $row['username'];
    }
}

// 執行SQL查詢
if (!empty($username) && !empty($password) )
{
    if ($old_user == $username )
    {
        echo '<script>alert("使用者帳號已存在")</script>';
    }
    elseif ($stmt->execute())
    {
        echo '<script>alert("Register successfully")</script>';
        $URL="login.php"; 
        header("Location: $URL");
    }
    else
    {
        echo '註冊失敗';
    }
}

?>      
<label for="floatingPassword">密碼 </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">註冊</button><p>
  </form>
</main>
<script src="js/bootstrap.bundle.min.js"></script>

    </body>
</html>
