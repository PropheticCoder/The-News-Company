<?php
//This script wont have a chance to run if the token expires,isTokenValid acts our middleware
if(!isset($_GET['articleFilter'])){
    $errMsg="Error with URL,No Article Filter Please Login Again";
}else{
    $articleRequestProcessor=new PostsManager();
    if($_GET['articleFilter'] =="all") $articles = $articleRequestProcessor->viewAllArticles();
    else $articles=$articleRequestProcessor->viewAllArticles($_GET['token'],['status'=>$_GET['articleFilter']]);
    $PostsArticleTable="";
    if(isset($articles['errorMsg'])) $PostsArticleTable= $articles['errorMsg'];
    else
    {
        $articleFilter = $_GET['articleFilter'];
        $pendingArticles="";
        $runningArticles="";
        $otherArticles="";
        foreach($articles as $article){
            if ($article['status'] == "PENDING")  $statusColor = "#ff6b00";
            elseif ($article['status'] == "RUNNING") $statusColor = "#00be13";
            elseif ($article['status'] == "REMOVED") $statusColor = "RED";
            elseif ($article['status'] == "REJECTED") $statusColor = "RED";
            
            $PostsArticleRow =
            '<tr>
                <td style="font-size: 55%;min-width: 200px;">'.$article['heading']. '-&nbsp;
                    <sub style="font-size: 11px;color: ' . $statusColor . ';">' . $article['status'] . '</sub><br>
                    <sub style="color: rgb(115,115,115);font-size: 10px;margin-top:30px"><strong>'.$article['uploadTime'] . '</strong><br></sub><br>
                </td>
                <td style="font-size: 60%;text-align: center;">' . $article['views'] . '<a href="#"></a></td>
                <td style="font-size: 60%;">'.$article['category'] . '</td>
                <td style="font-size: 60%;">' . $article['subCategory'] . '</td>
            </tr>';
            if ($article['status'] == "PENDING") $pendingArticles .=$PostsArticleRow;
            else if ($article['status'] == "RUNNING") $runningArticles .= $PostsArticleRow;
            else if ($article['status'] == "REJECTED") $otherArticles .= $PostsArticleRow;
            else if ($article['status'] == "REMOVED") $otherArticles .= $PostsArticleRow;
        }
        $PostsArticleTable .=$pendingArticles;
        $PostsArticleTable .= $runningArticles;
        $PostsArticleTable .= $otherArticles;
    }
}
?>