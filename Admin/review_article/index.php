<?php
$errMsg="";
include('../../inc/requests/twoSpace.requestRequirements.php');
include('../../inc/requests/isTokenValid.php');
include('../../inc/requests/getArticleForReview.php');
include('../../inc/requests/rejectArticle.php');
include('../../inc/requests/approveArticle.php');
include('../../inc/requests/removeArticle.php');
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
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                                data-bs-toggle="dropdown" href="#" style="font-size: 13px;text-align: center;">Article
                                administration</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="../?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=all"
                                    style="font-size: 11px;">All
                                    articles</a>
                                <a class="dropdown-item"
                                    href="../?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=running"
                                    style="font-size: 11px;">Running
                                    articles</a>
                                <a class="dropdown-item"
                                    href="../?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=rejected"
                                    style="font-size: 11px;">Rejected
                                    articles</a>
                                <a class="dropdown-item"
                                    href="../?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=pending"
                                    style="font-size: 11px;">Pending
                                    approval</a>
                                <a class="dropdown-item" href="#" style="font-size: 11px;">Old
                                    articles</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section id="breaking-news" class="breaking-news" style="width: 90%;margin: auto;margin-bottom: 21%;padding: 2%;">
        <h1 id="admin-heading" style="font-size: 109%;text-align: center;">
            <strong>Review article</strong>
        </h1>
        <div id="newArticleHeadingLine" style="min-width: 295px;max-width: 636px;margin: auto;">
            <input class="float-start" type="text" id="articleHeading"
                style="border-radius: 4px;background: rgb(210,210,210);border-style: none;margin-left: 10px;margin-bottom: 10px;width:340px;font-size:11px"
                placeholder="Heading" value="<?= $heading ?>" readonly>
            <div class="btn-group" role="group">
                <?= $articleManagementButtons?>
            </div>
        </div>
        <div id="formResponse"
            style="margin:auto;margin-top:10px;background: orange;border-radius: 7px;font-size: 13px;text-align:center;width:300px">
            <p style="color: rgb(255,255,255);"><?= $errMsg ?></p>
        </div>
        <div id="article-text" style="margin: auto;max-width: 650px;height: 600px;padding: 2%;">
            <textarea style="width: 100%;height: 500px;background: rgb(210,210,210);border-radius: 5px;" readonly
                value="<?= $article ?>"><?= $article ?></textarea>
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