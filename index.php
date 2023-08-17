<?php
require_once(dirname(__FILE__)) . '/includes/db_conn.php';
header("Content-Type:text/html; charset=utf-8");

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<main>
	
    <header class="p-3 text-bg-dark mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">首頁</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">文章列表</a></li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>
                <div class="text-end">
    				<button type="button" class="btn btn-success">確定</button>
                </div>
            </div>
        </div>
    </header>
    <div class="container text-center">
        <div class="row align-items-start ">
            <div class="col-lg-12">
                <!-- <table class="table table-hover"> -->
                <table class="table table-sm">
                        <thead>
                        <tr>
                        <th class="text-center" scope="col">文章標題</th>
                        <th class="text-center" scope="col">文章作者</th>
                <?php
                    $file = @$_GET['page'];
                   if( isset($file) )
                   {
                       include($file);
                   }

                    $sql = 'SELECT * FROM  blog_articles';

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tbody>';
                        echo '<th class="text-center"><a href="page.php?id='.$row['id'].'" >' . $row['title'] . '</th></a>';
                        echo '<th class="text-center">' . $row['author'] . '</th>';
                        echo '</tbody>';

                    }
                ?>
                </table>
            </div>
        </div>
    </div>
</main>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>

</html>
