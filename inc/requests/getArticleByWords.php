<?php
if(isset($_GET['searchArticleByText'])){
    $searchProcessor=new PostsManager();
    $searchResult=$searchProcessor->searchArticleByWords($_GET['token'],$_GET['searchText']);
    var_dump($searchResult);
}
?>