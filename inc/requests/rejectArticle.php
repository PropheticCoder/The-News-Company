<?php
if(isset($_POST['rejectArticle'])){
    $articleRejectionProcessor=new PostsManager();
    $rejectArticle=$articleRejectionProcessor->articleReject(intval($_POST['articleID']));
    $errMsg="Article Rejected!";
}
?>