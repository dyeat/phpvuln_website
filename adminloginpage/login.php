<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="js/color-modes.js"></script>
    <meta charset="utf-8">
    <title>後台登入頁面</title>
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
    <h1 class="h3 mb-3 fw-normal">後台登入頁面</h1>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="帳號">
      <label for="floatingInput">帳號 </label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="密碼">
    <?php 
    require_once(dirname(__FILE__)) . '/../includes/db_conn.php';
    
    isset($_POST['username']) ? $username = $_POST['username'] : $username = '';
    isset($_POST['password']) ? $password = $_POST['password'] : $password = '';

        // 使用PDO查詢資料庫中的使用者
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);

    $password = md5($password);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();

    // 檢查是否找到匹配的使用者
    if (empty($username) && empty($password) )
    {
        echo '';
    }
    elseif ($stmt->rowCount() > 0)
    {
        $_SESSION['role'] = 2;
        if ($username == 'admin')
        {
            $_SESSION['role'] = 1;
        }

        // 登入成功，執行相應的操作
        echo "Login successful!";
        echo "登入狀態:".$_SESSION['role']."<Br>";
        setcookie("name", $username);//寫入cookie

        $URL="index.php"; 
        header("Location: $URL");
    }
    elseif (!empty($username) && !empty($password) )
    {
        // 登入失敗，顯示錯誤訊息
        echo "<p><div>登入失敗.</div>";
    }
    ?>
      <label for="floatingPassword">密碼 </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">登入</button><p>
  </form>
<!-- <form action="register.php" method="post">
      <button class="btn btn-primary w-100 py-2" type="submit">註冊</button>
</form> -->
</main>
<script src="js/bootstrap.bundle.min.js"></script>

    </body>
</html>




