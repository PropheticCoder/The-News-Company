<?php
if(isset($_POST['removeArticle'])){
    $articleRejectionProcessor=new PostsManager();
    $rejectArticle=$articleRejectionProcessor->articleRemove(intval($_POST['articleID']));
    $errMsg="Article Removed!";
}