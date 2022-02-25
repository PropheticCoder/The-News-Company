<?php
if (!isset($_GET['category'])) header('location:../'); //We get our search target from URL, SO DONT Run without category and subCategory
$PageNumber = $_GET['page'];
$Category = $_GET['category'];
$SubCategory = $_GET['subCategory'];
$returnedArticlesProcessor=new PostsManager();
$returnedArticles=$returnedArticlesProcessor->viewAllArticles();//Articles are referenced by key, we cant parse in filters here
$returnedArticles   = array_reverse($returnedArticles);//BASICSQL:QUERY::SELECT() is returning values in reverse,its a version 1 issue
$maxPageNumber=round(count($returnedArticles)/8);//All articles divided by allowed spaces per page gives is maxPages
$pageResults=[];//An array to store all results in an order so we can loop using pageResult location
$pageResultsCount=0;//The number of found results
$maxResultLocation = $PageNumber * 7; //Current page number times max page result will tell us the last possible articlePosition
$minResultLocation = $maxResultLocation  - 7;//8(counting from zero) spaces behind
$midResultLocation =$minResultLocation+3;//Mid Result is 4 spaces from min results
$pageResultLocation = $minResultLocation;//Set the initial page result location to minResultLocation
$foundCategoriesCount = 0;
$foundSubCategoriesCount=0;
$NextSwitch=null;
$PrevSwitch=null;
$ResultsSummary=null;
$ErrMsg=null;
$returnedArticlesL=null;
$returnedArticlesR=null;


//Scan the return articles
foreach($returnedArticles as $returnedArticle){
    if($returnedArticle['status']=="RUNNING"){
        if ($returnedArticle['category'] == $Category) {
            $foundCategoriesCount++; //Increment the found Categories on every loop
            if ($SubCategory == "Breaking" && $returnedArticle['breaking'] == "YES") {
                //The Articles will be ordered with a key, articleIDs will not be neccessarily in order,there might be gaps in between
                //This way the heavy work of filtering is finished,now we need to concanate by pageLocation
                array_push($pageResults,$returnedArticle);
                $foundSubCategoriesCount++; //If we are within the filter, count the SubCategory
            }else if($SubCategory == $returnedArticle['subCategory']){
                //The Articles will be ordered with a key, articleIDs will not be neccessarily in order,there might be gaps in between
                //This way the heavy work of filtering is finished,now we need to concanate by pageLocation
                array_push($pageResults, $returnedArticle);//The Articles will be ordered with a key, articleIDs will not be neccessarily in order,there might be gaps in between
                $foundSubCategoriesCount++; //If we are within the filter, count the SubCategory
            }
        }
    }
}
$pageResultsCount=count($pageResults);

//Appending articlles
if($pageResultsCount>0)
while($pageResultLocation <=$maxResultLocation){
    if($pageResultLocation==$pageResultsCount) break;
    $uploadTime = date_format(date_create($pageResults[$pageResultLocation]['uploadTime']), "d F Y - H:i");
    $currArticle =
    '<article style="margin-bottom: 10px;background: #f8f8f8;padding: 2%;height:130px">
        <img class="float-start" src="../.uploads/images/articles/' . $pageResults[$pageResultLocation]['id'] . '-1.jpeg" style="width: 80px;margin-top: 10px;">
        <h1 style="margin-left: 100px;color: rgb(33, 37, 41);margin-top:-20px">
            <a href="#" style="font-size: 10px;color: rgb(0,0,0);">
                <strong>' . ucfirst($pageResults[$pageResultLocation]['heading']) . '</strong>
                <br>
            </a>
        </h1>
        <p style="margin-left: 100px;font-size: 60%;">'
    . substr(ucfirst($pageResults[$pageResultLocation]['article']), 0, 100) .
    '<br>
        <a href="View_Article/?id=' . $pageResults[$pageResultLocation]['id'] .'">View more...</a>
        </p>
        <p style="font-size: 10px;color: rgb(166,166,166);">
            <strong>' . $uploadTime . ' By ' . ucfirst($pageResults[$pageResultLocation]['authorName']) . ' ' . ucfirst($pageResults[$pageResultLocation]['authorLname']) . '</strong>
            <br>
        </p>
    </article>';
    
    if ($pageResultLocation <=$midResultLocation) $returnedArticlesL .= $currArticle;
    if($pageResultLocation > $midResultLocation) $returnedArticlesR .= $currArticle;
    $pageResultLocation++;
}

//Control buttons
$PrevSwitch = ($PageNumber==1) ? 'disabled=""' : $PrevSwitch; //Disable the previous button on page 1
$PrevSwitch = ($pageResultsCount == 0) ? 'disabled=""' : $PrevSwitch;//Disable previous button when no results
$NextSwitch = ($pageResultsCount == 0) ? 'disabled=""' : $NextSwitch;//Disable next button when no results
$NextSwitch = ($maxPageNumber == $PageNumber) ? 'disabled=""' : $NextSwitch; //Disable next button if we in last page
$ErrMsg = ($pageResultsCount == 0) ? "No results..." : null;//No results error if no no results
//Write summary
$ResultsSummary = "Found {$foundSubCategoriesCount}  '{$SubCategory}' articles from  {$foundCategoriesCount}  '{$Category}' articles";

?>