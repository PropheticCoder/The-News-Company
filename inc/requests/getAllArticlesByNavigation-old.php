<?php
//REMEMBER!!!!!!!    This  should have been OOP, late realisation, source code would be cleaner!!!!!!!!
//Heavily commented for heavy refactoring 
$articleRequestProcessor = new PostsManager();//Posts Controller
$articles = $articleRequestProcessor->viewAllArticles();//Array Of Returned Articles
$articlesCount= count($articles);//Count of db articles
$maxPagesPosition=(round($articlesCount/8)==0) ? 1 : round($articlesCount / 8); //Maximum number of (8)s we can find in count of results, which is max pages
$testPagePosition=0;
$currentResultPosition=0;//The Current Position Of The Article In Page, Actually The Count Of Concanted Articles results
$currentResultsPagePosition=1;//The position of the current result page by 
$page=$_GET['page'];//Page number from url
$category=$_GET['category'];//Category from url
$subCategory=$_GET['subCategory'];//Sub category from url
//Any number times 8 will tell us the maximum key,we need 8 records, if we in page 1, the maximum key is 1*8
$maxArticleKey= ($page == 1) ? 8 : $page * 8;
$lowArticleKey=($page=='1') ? 0: $maxArticleKey-8 +1;//The low key will always be  8 units behind maxKey
$ArticlesL='';//The first four articles go left of screen
$ArticlesR = '';//The last four articles go right of screen
$allArticlesCount = 0;//Count all running articles irregardless of filter
$categoryCount=0;//Count all the articles in category
$subCategoryCount=0; //Count all the articles in subCategory
$nonBreakingNewsArticleCount=0;//Count the articles currently scanned non breaking news articles
$breakingNewsArticleCount=0;//Current count of breakings If Filter Is Breaking news
$pageArticleCount=0;

//Going through all records
foreach($articles as $article){
    
    if($article['status']=="RUNNING" && $article['category']==$category){
        $uploadTime = date_format(date_create($article['uploadTime']), "d F Y - H:i");
        $currArticle =
            '<article style="margin-bottom: 10px;background: #f8f8f8;padding: 2%;height:130px">
                <img class="float-start" src="../.uploads/images/articles/' . $article['id'] . '-1.jpeg" style="width: 80px;margin-top: 10px;">
                <h1 style="margin-left: 100px;color: rgb(33, 37, 41);margin-top:-20px">
                    <a href="#" style="font-size: 10px;color: rgb(0,0,0);">
                        <strong>' . ucfirst($article['heading']) . '</strong>
                        <br>
                    </a>
                </h1>
                <p style="margin-left: 100px;font-size: 60%;">'
            . substr(ucfirst($article['article']), 0, 100) .
            '<br>
                <a href="">View more...</a>
                </p>
                <p style="font-size: 10px;color: rgb(166,166,166);">
                    <strong>' . $uploadTime . ' By ' . ucfirst($article['authorName']) . ' ' . ucfirst($article['authorLname']) . '</strong>
                    <br>
                </p>
            </article>';
        //If we are hearing the desired category
        if($subCategory=="Breaking" && $article['breaking']=="YES"){
            if ($breakingNewsArticleCount >= $lowArticleKey && $breakingNewsArticleCount < ($lowArticleKey + 4)) $ArticlesL .= $currArticle;
            if ($breakingNewsArticleCount >= ($lowArticleKey + 4) && $breakingNewsArticleCount < ($lowArticleKey + 7)) $ArticlesR .= $currArticle;
            $subCategoryCount++; //Incrementing subCategoryCount without relying on pageArticle Data
            $breakingNewsArticleCount++; //Only increment if we recorded pageContent
        }elseif($subCategory==$article['subCategory']){
            if($nonBreakingNewsArticleCount >=$lowArticleKey && $nonBreakingNewsArticleCount < ($lowArticleKey+ 4)) $ArticlesL .=$currArticle;
            if ($nonBreakingNewsArticleCount >= ($lowArticleKey + 4) && $nonBreakingNewsArticleCount < ($lowArticleKey + 7)) $ArticlesR .= $currArticle;
            $subCategoryCount++; //Incrementing subCategoryCount without relying on pageArticle Data
            $nonBreakingNewsArticleCount++; //Only increment if we recorded pageContent
        }
        $categoryCount++;//Take Breaking as Sub Category
    }
}

if($nonBreakingNewsArticleCount !=0)  $pageArticleCount = $nonBreakingNewsArticleCount; //If we increased non breaking news article count then pageArticleAcount is non breaking news article count
if ($breakingNewsArticleCount != 0)  $pageArticleCount = $breakingNewsArticleCount;//If we increased breaking news article count then pageArticleAcount is breaking news article count
if($breakingNewsArticleCount==0&&$nonBreakingNewsArticleCount==0) $pageArticleCount=0;
$currentResultsPagePosition=($pageArticleCount == 0) ? 1 : round($articlesCount / $pageArticleCount); //Total articles/By Concanated Articles,Will Tell Us
$currentResultPosition= $pageArticleCount;
$prevSwitch =  ($page==1) ? 'disabled="" ' : '';
$nextSwitch = ($page== $maxPagesPosition) ? 'disabled=""' : '';
$errMsg = ($pageArticleCount * $page > $lowArticleKey && $pageArticleCount * $page == $maxArticleKey) ? 'This page has no results, please try another page...' : '';
$resultsSummary = "Showing {$currentResultPosition} out of {$subCategoryCount} ''{$subCategory}'' articles...<br>''{$subCategory}''  has {$subCategoryCount} articles out of  {$categoryCount} ''{$category}'' articles...";
?>