<?php
include('../../inc/requests/twoSpace.requestRequirements.php');
include('variables.php');
include('../../inc/requests/isTokenValid.php');
include('../../inc/requests/getCategoryAndSubCategoriesRequest.php');
include('../../inc/requests/saveArticle.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>News Company | Posts - New Posts</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean-1.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="background: rgb(255,255,255);">
    <div id="formResponse"
        style="background: #1a7d02;width:300px;margin:auto;border-radius: 7px;font-size: 13px;text-align:center">
        <p style="color: rgb(255,255,255);"><?= $errMsg ?></p>
    </div>
    <section id="navigation-section" class="navigation-section">
        <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="background: rgb(255, 255, 255);">
            <div class="container"><a class="navbar-brand" href="#"><img id="logo" class="logo"
                        src="../../assets/img/nobg-noshadow-logo.png"></a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1" style="border-radius: 12px;">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" style="font-size: 13px;cursor:no-drop">New article</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="../?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=all"
                                style=" font-size: 13px;text-align:
                                center;">All
                                articles
                            </a>
                        </li>

                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                                data-bs-toggle="dropdown" href="#" style="font-size: 13px;text-align: center;">My
                                article posts&nbsp;</a>
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
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 id="admin-heading" style="font-size: 109%;text-align: center;"><strong>New article</strong></h1>
            <div id="newArticleHeadingLine" style="min-width: 295px;max-width: 636px;margin: auto;">
                <input class="float-start" type="text" name="heading"
                    style="border-radius: 4px;background: rgb(210,210,210);border-style: none;margin-left: 10px;margin-bottom: 10px;"
                    placeholder="Heading" required>
                <div class="btn-group" role="group">
                    <button class="btn btn-primary" type="submit"
                        style="margin-left: 10px;width: 50px;height: 26px;font-size: 68%;background: rgb(200,108,0);">Draft</button>
                    <button class="btn btn-primary" type="submit" name="saveArticle"
                        style="margin-left: 10px;width: 50px;height: 26px;font-size: 68%;background: rgb(26,125,2);">Save</button>
                </div>
            </div>
            <div id="upload-container-1" style="min-width: 300px;max-width: 650px;margin: auto;padding: 1%;">
                <select style="border-radius: 5px;font-size: 13px;padding: 2%;margin-bottom: 10px;margin-left: 5px;"
                    name="subCategoryID">
                    <optgroup label="All News Categories And Sub Categories">
                        <?= $subCategoryOptions ?>
                    </optgroup>
                </select>
                <select style="margin-left: 5px;padding: 2%;border-radius: 5px;font-size: 12px;" name="breaking">
                    <optgroup label="Is this this breaking news?">
                        <option value="NO" selected>Breaking?</option>
                        <option value="YES">Yes</option>
                        <option value="NO">No</option>
                    </optgroup>
                </select>
            </div>
            <div id="upload-container" style="min-width: 300px;max-width: 650px;margin: auto;padding: 1%;">
                <h6 style="font-size:15px">Article photos</h6>
                <input type="file" name="uploadFile_1" id="uploadFile_1" placeholder="Upload files" required
                    style="margin-bottom:10px">
            </div>
            <div id="article-text" style="margin: auto;max-width: 650px;height: 600px;padding: 2%;">
                <textarea style="width: 100%;height: 500px;" name="article" maxlength="5000" required></textarea>
            </div>
        </form>
    </section>
    <section id="footer-section" class="footer-section" style="width: 100%;">
        <p id="footer-text" style="text-align: center;padding: 15px;height: 154px;color: rgb(211,210,210);">The News
            Company - System Designed And Developed By N Maphiri<br><a href="#"
                style="color: rgb(230,230,230);">https://github.com/PropheticCoder/News-Company</a></p>
    </section>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../assets/js/isImageOnlyUpload.js"></script>

</html>