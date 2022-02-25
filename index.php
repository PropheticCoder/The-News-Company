<?php session_start()?>
<?php
    include('inc/requests/requestRequirements.php');
    include('inc/requests/getCategoryAndSubCategoriesRequest.php');
    include('inc/requests/getBreakingNews.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>News Company</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background: rgb(255,255,255);">
    <section id="navigation-section" class="navigation-section">
        <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="background: rgb(255, 255, 255);">
            <div class="container"><a class="navbar-brand" href="#"><img id="logo" class="logo"
                        src="assets/img/nobg-noshadow-logo.png"></a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1" style="border-radius: 12px;">
                    <ul class="navbar-nav ms-auto">
                        <?=$navBar?>
                        <li class="nav-item">
                            <a class="nav-link" href="Posts/login/"
                                style="font-size: 13px;text-align: center;">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section id="breaking-news" class="breaking-news" style="margin: auto;width: 90%;margin-bottom: 21%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" id="home-news-text" style="margin-bottom: 5%;">
                    <div class="card">
                        <img class="card-img w-100 d-block"
                            src=".uploads/images/articles/<?=$highestViewArticleid?>-1.jpeg">
                        <div class="card-img-overlay" style="background: rgba(255,255,255,0.51);">
                            <h4 style="text-align: center;margin-top: 40%;color: rgb(0,0,0);">
                                <?= $highestViewArticleHeading?> <br>
                            </h4>
                            <p style="text-align: center;">
                                <a href="./Articles/?category=News&subCategory=breaking&page=1"
                                    style="color: rgb(255,255,255);">More
                                    breaking
                                    news...
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="home-news-text-1">
                    <?=$breakingNewsArticles?>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-section" class="footer-section" style="width: 100%;">
        <p id="footer-text" style="text-align: center;padding: 15px;height: 154px;color: rgb(211,210,210);">The News
            Company - System Designed And Developed By N Maphiri<br><a href="#"
                style="color: rgb(230,230,230);">https://github.com/PropheticCoder/News-Company</a></p>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>