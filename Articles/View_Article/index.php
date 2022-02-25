<?php
include('../../inc/requests/twoSpace.requestRequirements.php');
include('../../inc/requests/getCategoryAndSubCategoriesRequest.php');
include('../../inc/requests/viewArticle.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>News Company</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean-1.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body style="background: rgb(255,255,255);">
    <section id="navigation-section" class="navigation-section">
        <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="background: rgb(255, 255, 255);">
            <div class="container"><a class="navbar-brand" href="#"><img id="logo" class="logo"
                        src="../../assets/img/nobg-noshadow-logo.png"></a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1" style="border-radius: 12px;">
                    <ul class="navbar-nav ms-auto">
                        <?= $navBar ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $_REQSPACE ?>Posts/login/"
                                style="font-size: 13px;text-align: center;">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section id="breaking-news" class="breaking-news" style="margin: auto;width: 90%;margin-bottom: 21%;">
        <h1 id="article-heading"><strong><?= $heading ?></strong></h1>
        <div class="container">
            <div class="row" style="height: 800px;">
                <div class="col-md-6" id="home-news-text" style="margin-bottom: 5%;">
                    <div class="card"><img class="card-img w-100 d-block"
                            src="../../.uploads/images/articles/<?= $_GET['id'] ?>.jpg">
                        <div class=" card-img-overlay" style="background: transparent;">
                            <h4 id="article-name" style="text-align: center;margin-top: 40%;color: rgb(139,139,139);">
                                <br>
                                <div class="btn-group" role="group"><button class="btn btn-primary" type="button"
                                        style="background: transparent;"><i
                                            class="fa fa-arrow-circle-left"></i></button><button class="btn btn-primary"
                                        type="button" style="background: transparent;margin-left: 15%;"><i
                                            class="fa fa-arrow-circle-right"></i></button></div>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="home-news-text-1">
                    <article style="background: #f8f8f8;padding: 2%;overflow-y: scroll;height: 400px;"><img
                            class="float-start" src="../../.uploads/images/articles/<?= $_GET['id'] ?>.jpg"
                            style="width: 80px;margin-top: 20px;">
                        <h1 style="margin-left: 100px;color: rgb(33, 37, 41);">
                            <a href="#" style="font-size: 10px;color: rgb(0,0,0);">
                                <strong><?= $heading ?></strong>
                                <br>
                            </a>
                        </h1>
                        <p style="font-size: 10px;color: rgb(166,166,166);margin-left: 100px;">
                            <strong><?= $uploadTime ?>&nbsp;By&nbsp;
                                <?= $authorName . " " . $authorLname ?></strong><br>
                            <strong><?= $articleViews ?> views</strong><br>
                        </p>
                        <p style="margin-left: 100px;font-size: 60%;"><?= $article ?></p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-section" class="footer-section" style="width: 100%;">
        <p id="footer-text" style="text-align: center;padding: 15px;height: 154px;color: rgb(211,210,210);">The News
            Company - System Designed And Developed By N Maphiri<br><a href="#"
                style="color: rgb(230,230,230);">https://github.com/PropheticCoder/News-Company</a></p>
    </section>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>