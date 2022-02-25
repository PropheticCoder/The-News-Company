<?php
if(isset($_GET['searchArticleByDate'])){
    $articleFilter=1;
    //This script wont have a chance to run if the token expires,isTokenValid acts our middleware
    if (!isset($_GET['articleFilter'])) {
        $errMsg = "Error with URL,No Article Filter Please Login Again";
    } else {
        $articleFilter = 2;
        $articleRequestProcessor = new PostsManager();
        if ($_GET['articleFilter'] == "all") $articles = $articleRequestProcessor->viewAllArticles();
        else $articles = $articleRequestProcessor->viewAllArticles(null,['articleDate' => $_GET['articleFilter']]);
        $PostsArticleTable = "";
        if (isset($articles['errorMsg'])) {
            $PostsArticleTable = $articles['errorMsg'];
        }else if(count($articles)==0) {
            $errMsg="No Articles";
            $articleFilter="";
        }
        else
            foreach ($articles as $article) {
                if ($article['status'] == "PENDING")  $statusColor = "#ff6b00";
                elseif ($article['status'] == "RUNNING") $statusColor = "#00be13";
                elseif ($article['status'] == "REMOVED") $statusColor = "RED";
                elseif ($article['status'] == "REJECTED") $statusColor = "RED";
                $articleFilter = $article['category'];
                $PostsArticleRow =
                    '<tr>
                <td style="font-size: 60%;min-width: 200px;">' . $article['heading'] . '
                    -&nbsp;<sub style="font-size: 11px;color: ' . $statusColor . ';">' . $article['status'] . '</sub>
                    <br><sub style="color: rgb(115,115,115);font-size: 12px;">
                        <strong>' . $article['uploadTime'] . '</strong>
                        <br></sub>
                        <br>
                    <form action="review_article/" method="get">
                        <input type="hidden" name="token" value="' . $_GET['token'] . '">
                        <input type="hidden" name="portal" value="admin">
                        <input type="hidden" name="articleID" value="' . $article['id'] . '">
                        <button class="btn btn-primary" type="submit" style="color: ' . $statusColor . ';background: var(--bs-table-bg);font-size: 80%;margin: 2%;border: 1px solid rgb(255,0,0) ;">
                            <strong>Review</strong><br>
                        </button>
                    </form>
                </td>
                <td style="font-size: 60%;text-align: center;">0<a href="#"></a></td>
                <td style="font-size: 60%;"><a href="#">
                    ' . ucfirst($article['authorName']) . '-<br>' . $article['authorEmail'] . '<br></a>
                </td>
                <td style="font-size: 60%;">' . $article['category'] . '</td>
                <td style="font-size: 60%;">' . $article['subCategory'] . '</td>
            </tr>';

                if ($article['status'] == "PENDING") $pendingArticles .= $PostsArticleRow;
                else if ($article['status'] == "RUNNING") $runningArticles .= $PostsArticleRow;
                else if ($article['status'] == "REJECTED") $otherArticles .= $PostsArticleRow;
                else if ($article['status'] == "REMOVED") $otherArticles .= $PostsArticleRow;
            }
        $PostsArticleTable .= $pendingArticles;
        $PostsArticleTable .= $runningArticles;
        $PostsArticleTable .= $otherArticles;
    }
    }