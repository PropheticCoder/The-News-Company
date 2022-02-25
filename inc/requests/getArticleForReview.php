<?php
$heading="";
$article="";
$articleManagementButtons="";
if(isset($_GET['articleID'])){
    $articleForReviewProcessor=new PostsManager();
    $articleForReview=$articleForReviewProcessor->getArticleForReview($_GET['articleID']);
    $heading=$articleForReview[0]['heading'];
    $article = $articleForReview[0]['article'];
    if($articleForReview[0]['status']=="RUNNING") 
    $articleManagementButtons=
        '<form action="" method="post">
                <input type="hidden" name="removeArticle" value="true">
                <input type="hidden" name="articleID" name="articleID" value="'. $articleForReview[0]['id'].'">
        <button class="btn btn-primary" type="submit"
            style="margin-left: 10px;width: 100px;height: 26px;font-size: 68%;background: rgb(26,125,2);">Remove</button>
        </form>';

    if($articleForReview[0]['status']=="PENDING") {
        $articleManagementButtons =
        '<form action="" method="post">
            <input type="hidden" name="rejectArticle" value="true">
            <input type="hidden" name="articleID" name="articleID" value="' . $articleForReview[0]['id'] . '">
            <button class=" btn btn-primary" type="submit" style="margin-left: 10px;width: 100px;height: 26px;font-size: 68%;background: rgb(200,0,0);">Reject</button>
        </form>'.
        '<form action="" method="post">
            <input type="hidden" name="approveArticle" value="true">
            <input type="hidden" name="articleID" name="articleID" value="' . $articleForReview[0]['id'] . '">
            <button class="btn btn-primary" type="submit" style="margin-left: 10px;width: 100px;height: 26px;font-size: 68%;background: rgb(26,125,2);">Approve</button>
        </form>'.
        '<form action="" method="post">
            <input type="hidden" name="removeArticle" value="true">
            <input type="hidden" name="articleID" name="articleID" value="' . $articleForReview[0]['id'] . '">
            <button class="btn btn-primary" type="submit"
                style="margin-left: 10px;width: 100px;height: 26px;font-size: 68%;background: rgb(26,125,2);">Remove</button>
        </form>';
    }
}
?>