<?php
$GuestContentManager= new GuestContentManager();
$breakingNewsFeed=$GuestContentManager->breakingNewsFeed();
//var_dump($breakingNewsFeed);
$mostViewedBreakingNews="";
$breakingNewsArticles='';
$highestViewArticleHeading="";
$highestViewArticleid=0;
$highestViews=0;
$articleCount=1;
foreach($breakingNewsFeed as $breakingNews){
    if($articleCount>4) break;

    if($breakingNews['views'] >= $highestViews){
        $highestViewArticleHeading=$breakingNews['heading'];
        $highestViewArticleid=$breakingNews['id'];
        $highestViews= $breakingNews['views'];
    }

    $breakingNewsArticle =
        '<article style="margin-bottom: 10px;background: #f8f8f8;padding: 2%;height:130px">
            <img class="float-start" src=".uploads/images/articles/'.$breakingNews['id']. '-1.jpeg" style="width: 80px;margin-top: 10px;">
            <h1 style="margin-left: 100px;color: rgb(33, 37, 41);margin-top:-20px">
                <a href="Articles/View_Article/?id=' . $breakingNews['id'] . '" style="font-size: 10px;color: rgb(0,0,0);">
                    <strong>'.ucfirst($breakingNews['heading']).'</strong>
                    <br>
                </a>
            </h1>
            <p style="margin-left: 100px;font-size: 60%;">'
                . substr(ucfirst($breakingNews['article']),0,100).
        '<br>
            <a href="Articles/View_Article/?id=' . $breakingNews['id'] . '">View more...</a>
            </p>
        </article>';
    $breakingNewsArticles .=$breakingNewsArticle;
    $articleCount++;
}

?>