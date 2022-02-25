<?php session_start() ?>
<?php
include('../inc/requests/oneSpace.requestRequirements.php');
include('../inc/requests/getCategoryAndSubCategoriesRequest.php');
include('../inc/requests/getAllArticlesByNavigation.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>News Company</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean-1.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body style="background: rgb(255,255,255);">
    <section id="navigation-section" class="navigation-section">
        <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="background: rgb(255, 255, 255);">
            <div class="container">
                <a class="navbar-brand" href="../"><img id="logo" class="logo"
                        src="../assets/img/nobg-noshadow-logo.png"></a><button data-bs-toggle="collapse"
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
    <div id="pagination-container" style="width: 100%;margin-bottom: 2%;">
        <div id="pagination-inner-container" style="width: 300px;margin: auto;text-align: center;">
            <h1 style="margin-bottom: 0;font-size: 25px;margin-left: 2%;text-align: center;">
                <strong><?= ucfirst($Category) . " : " . ucfirst($SubCategory) ?></strong>
            </h1>
            <div class="btn-group" role="group">
                <button class="btn btn-primary" id="articlePagePrev" type="button" style="background: #f8f8f8;"
                    <?= $PrevSwitch ?>>
                    <i class="fa fa-backward" style="color: rgb(45,45,45);"></i>&nbsp;</button>
                <button id="paginationMonitor" class="btn btn-outline-primary disabled active" type="button" disabled=""
                    style="color: rgb(1,0,62);">
                    <?= ($minResultLocation+1) ?>-<?= ($pageResultLocation) ?>
                </button>
                <button class="btn btn-primary" id="articlePageNext" type="button" style="background: #f8f8f8;"
                    <?= $NextSwitch ?>>
                    <i class="fa fa-forward" style="color: rgb(84,84,84);"></i></button>
            </div>
        </div>
    </div>
    <section id="breaking-news" class="breaking-news"
        style="margin: auto;width: 90%;margin-bottom: 21%;overflow-y: scroll;">
        <div class="container">
            <div style="font-size:12px;margin-bottom:10px;color:grey"><b><?= $ResultsSummary ?></b></div>
            <div style="text-align:center;font-size:13px;color:grey"><b><?= $ErrMsg ?></b></div>
            <div class="row">
                <div class="col-md-6" id="home-news-text-1">
                    <?= $returnedArticlesL ?>
                </div>
                <div class="col-md-6" id="home-news-text-2">
                    <?= $returnedArticlesR ?>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-section" class="footer-section" style="width: 100%;">
        <p id="footer-text" style="text-align: center;padding: 15px;height: 154px;color: rgb(211,210,210);">The News
            Company - System Designed And Developed By N Maphiri<br><a href="#"
                style="color: rgb(230,230,230);">https://github.com/PropheticCoder/News-Company</a></p>
    </section>
    <script src="../assets/js/paginateArticles.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>