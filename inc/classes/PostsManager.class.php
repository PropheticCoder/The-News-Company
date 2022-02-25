<?php

use libraries\BasicSQL\QUERY;
use TheNewsCompany\TheNewsCompany;

/**
 * Posting business rules
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class PostsManager extends TheNewsCompany{
    public function viewAllArticles(string $token=null,array $filter=null){
        return TheNewsCompany::getAllArticles($token,$filter);
    }
    public function getCategoryAndSubCategories(){
        return TheNewsCompany::getCategoryOptions();
    }

    public function postNewArticle(array $data){
        return TheNewsCompany::saveArticle($data);
    }

    public function searchArticleByWords(string $token=null,string $searchText){
        return TheNewsCompany::getArticleByWords($token,$searchText);
    }

    public function getArticleForReview(int $articleID){
        return TheNewsCompany::getArticle($articleID);
    }

    public function articleReject(int $articleID){
        return TheNewsCompany::rejectArticle($articleID);
    }

    public function articleApprove(int $articleID)
    {
        return TheNewsCompany::approveArticle($articleID);
    }

    public function articleRemove(int $articleID)
    {
        return TheNewsCompany::removeArticle($articleID);
    }

    public function incrementArticleViews(int $articleID){
        return TheNewsCompany::incrementViews($articleID);
    }
}
?>