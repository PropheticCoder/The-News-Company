<?php
include('../inc/requests/oneSpace.requestRequirements.php');
include('../inc/requests/isTokenValid.php');
include('../inc/requests/getAllArticlesForAdminRequest.php');
include('../inc/requests/getCategoryAndSubCategoriesRequest.php');
include('../inc/requests/searchArticleByCategoryForAdmin.php');
include('../inc/requests/searchArticleByDateForAdmin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
            <div class="container"><a class="navbar-brand" href="#"><img id="logo" class="logo"
                        src="../assets/img/nobg-noshadow-logo.png"></a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1" style="border-radius: 12px;">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                                data-bs-toggle="dropdown" href="#" style="font-size: 13px;text-align: center;">Article
                                administration</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=all"
                                    style="font-size: 11px;">All
                                    articles</a>
                                <a class="dropdown-item"
                                    href="?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=running"
                                    style="font-size: 11px;">Running
                                    articles</a>
                                <a class="dropdown-item"
                                    href="?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=rejected"
                                    style="font-size: 11px;">Rejected
                                    articles</a>
                                <a class="dropdown-item"
                                    href="?token=<?= $_GET['token'] ?>&portal=<?= $_GET['portal'] ?>&articleFilter=pending"
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
    <section id="breaking-news" class="breaking-news" style="margin: auto;width: 90%;margin-bottom: 21%;padding: 2%;">
        <h1 id="admin-heading" style="font-size: 100%;text-align: center;"><strong>Articles
                :<?= $articleFilter ?></strong></h1>
        <div id="search-container" style="text-align: center;">
            <label>Search by date</label><br>
            <form>
                <input type="hidden" name="searchArticleByDate">
                <input type="hidden" name="token" value="<?= $_GET['token'] ?>">
                <input type="hidden" name="portal" value="posts">
                <input type="date" onchange="this.form.submit()"
                    style="width: 180px;border-radius: 12px;font-size: 80%;text-align: center;margin-left: 10px;margin-bottom: 10px;"
                    value="<?= $articleFilter ?>" name="articleFilter">
            </form>
            <form action=''>
                <input type="hidden" name="searchArticleBySubCategory">
                <input type="hidden" name="token" value="<?= $_GET['token'] ?>">
                <input type="hidden" name="portal" value="posts">
                <select name="articleFilter" onchange="this.form.submit()"
                    style="border-radius: 12px;font-size: 80%;margin-left: 10px;width: 180px;margin-bottom: 10px;text-align: center;"
                    name="newsCategoryID">
                    <optgroup label="All News Categories And Sub Categories">
                        <option selected>Search by category</option>
                        <?= $subCategoryOptions ?>
                    </optgroup>
                </select>
            </form>
        </div>
        <div class="table-responsive" id="users-table" style="margin: auto;height: 400px;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th id="article-heading-cell" style="font-size: 70%;">Heading</th>
                        <th style="font-size: 70%;">Views</th>
                        <th style="font-size: 70%;">Author</th>
                        <th style="font-size: 70%;">Category</th>
                        <th style="font-size: 70%;">Sub-category</th>
                    </tr>
                </thead>
                <tbody id="user-table-body">
                    <?= $PostsArticleTable ?>
                </tbody>
            </table>
        </div>
    </section>
    <section id="footer-section" class="footer-section" style="width: 100%;">
        <p id="footer-text" style="text-align: center;padding: 15px;height: 154px;color: rgb(211,210,210);">The News
            Company - System Designed And Developed By N Maphiri<br><a href="#"
                style="color: rgb(230,230,230);">https://github.com/PropheticCoder/News-Company</a></p>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>