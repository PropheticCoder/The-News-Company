<?php
if(isset($_POST['saveArticle'])){
    $saveArticleProcessor=new PostsManager();
    $postData=
    ['subCategoryID'=>$_POST['subCategoryID'],'heading'=>$_POST['heading'],'article'=>$_POST['article'],'breaking'=>$_POST['breaking'],'token'=>$_GET['token']];
    $postArticle=$saveArticleProcessor->postNewArticle($postData);
    if($postArticle) $errMsg="Article posted!, awaiting admin approval!";
}
?>