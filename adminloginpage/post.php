<?php
require_once(dirname(__FILE__)) . '/../includes/db_conn.php';
require_once(dirname(__FILE__)) . '/../includes/session.php';
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <title>管理者頁面</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <?php
        if ($_SESSION['role'] == 1)
        {
        echo '<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">超級管理者頁面</a>';
        }
        else
        {
            echo '<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">管理者頁面</a>';
        }
        ?>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#house-fill" /></svg>
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="post.php">
                                    <svg class="bi">
                                        <use xlink:href="#graph-up" /></svg>
                                    文章列表
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#puzzle" /></svg>
                                    Integrations
                                </a>
                            </li>
                        </ul>
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" /></svg>
                                    Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" /></svg>
                                    Last quarter
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark-text" /></svg>
                                    Social engagement
                                </a>
                            </li>
                            <?php
                            if ($_SESSION['role'] == 1)
                            {
                            echo '<li class="nav-item">';
                            echo '   <a class="nav-link d-flex align-items-center gap-2" href="uploadfile.php">';
                            echo '       <svg class="bi">';
                            echo '           <use xlink:href="#file-earmark-text" /></svg>';
                            echo '       上傳檔案';
                            echo '   </a>';
                            echo '</li>';
                            }
                            ?>
                        </ul>
                        <hr class="my-3">
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="logout.php">
                                    <svg class="bi">
                                        <use xlink:href="#door-closed" /></svg>
                                    登出
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                            <svg class="bi">
                                <use xlink:href="#calendar3" /></svg>
                            This week
                        </button>
                    </div>
                </div>
                    <div class="container text-center">
                    <div class="row align-items-start ">
                        <div class="col-lg-12">
                            <!-- <table class="table table-hover"> -->
                            <table class="table table-sm">
                        <thead>
                        <tr>
                        <th class="text-center" scope="col">文章編號</th>
                        <th class="text-center" scope="col">文章標題</th>
                        <th class="text-center" scope="col">文章作者</th>
                <?php
                    $sql = 'SELECT * FROM  blog_articles';

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tbody>';
                        echo '<th class="text-center" scope="col">' . $row['id'];
                        echo '<th class="text-center" scope="col">' . $row['title'];
                        echo '<th class="text-center" scope="col">' . $row['author'];
                        echo '</tbody>';
                    }
                ?>
                </table>
            </div>
        </div>
    </div>
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </main>
        </div>
    </div>

</html>
