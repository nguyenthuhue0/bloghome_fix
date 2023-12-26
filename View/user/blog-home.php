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

$articles = $article->loadAllArticleAd();

if (isset($_GET['article'])) {
    $articles = $article->getArticleByTitle($_GET['article']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/style3.css" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
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
                    <input class="form-control p-3" type="text" name="article" placeholder="Enter search term..."
                           aria-label="Enter search term..." aria-describedby="button-search"/>
                    <button class="btn btn-primary" name="searching" id="button-search" type="submit">Go!</button>
                </div>

            </div>
    </form>

    <!-- Blog entries-->
    <!-- Blog post-->
    <div class="row">
        <div class="container">
            <div class="col-lg-12 p-2">
                <div class="row">
                    <?php foreach ($articles as $row): ?>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="<?php echo $row['img']; ?>" alt="..."></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php echo $row['datePosted']; ?></div>
                                    <h2 class="card-title h4"><?php echo $row['title']; ?></h2>
                                    <p class="card-text"><?php echo $row['content']; ?></p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0"/>
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
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