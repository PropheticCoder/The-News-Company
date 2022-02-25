<?php
$uploadTime="";
$heading="";
$article="";
$articleManagementButtons="";
if(isset($_GET['id'])){
    $articleForViewProcessor=new PostsManager();
    $articleForView=$articleForViewProcessor->viewAllArticles(null,['id'=>$_GET['id']]);
    $uploadTime = date_format(date_create($articleForView[0]['uploadTime']), "d F Y - H:i");
    $heading=$articleForView[0]['heading'];
    $article = $articleForView[0]['article'];
    $authorName= $articleForView[0]['authorName'];
    $authorLname = $articleForView[0]['authorLname'];
    $articleForViewProcessor->incrementArticleViews($_GET['id']);
    $articleViews= $articleForView[0]['views'];
}