<?php
include_once __DIR__ . '/../../Model/database.php';
include_once __DIR__ . '/../../Model/userInfo.php';
include_once __DIR__ . '/../../Model/article.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$db = database::getDB();
$article = new Article($db);
$userInfo = new UserInfo($db);

$totalArticles = $article->countAllArticleAd();
$totalPages = ceil($totalArticles / 9);

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$articles = $article->loadAllArticleAd($page);

if (isset($_GET['article'])) {
    $articles = $article->getArticleByTitle($_GET['article'], $page);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/style3.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <form action="" method="GET">
            <!-- Search widget-->
            <div class="card mb-4">

                <div class="card-body p-3">
                    <div class="input-group">
                        <form action="" method="get">
                            <input class="form-control p-3" type="text" name="article" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                        </form>
                    </div>

                </div>
        </form>

        <!-- Blog entries-->
        <!-- Blog post-->
        <div class="row">
            <div class="container">
                <div class="col-lg-12 p-2">
                    <div class="row">
                        <?php foreach ($articles as $row) : ?>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="<?php echo $row['img'] ?>" alt="...">
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                        <a class="text-decoration-none link-dark stretched-link" href="./article-view.php?id=<?php echo $row['articleId'] ?>">
                                            <h5 class="card-title mb-3">
                                                <?php echo $row['title'] ?></h5>
                                        </a>
                                        <p class="card-text mb-0"><?php echo $row['content'] ?></p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="...">
                                                <div class="small">
                                                    <div class="fw-bold">
                                                    </div>
                                                    <div class="text-muted"><?php echo $row['datePosted'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                <?php if ($page == $i) : ?>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href=""><?php echo $i ?></a></li>
                                <?php else : ?>
                                    <li class="page-item"><a class="page-link" href="./blog-home.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endfor ?>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->

            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>


</body>


</html>