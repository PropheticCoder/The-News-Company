<?php
if(isset($_POST['approveArticle'])){
    $articleApprovalProcessor=new PostsManager();
    $approveArticle= $articleApprovalProcessor->articleApprove(intval($_POST['articleID']));
    $errMsg="Article Approved";
}