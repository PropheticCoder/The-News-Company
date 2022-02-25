<?php
namespace TheNewsCompany;

use libraries\Auth\Models\Token;
use libraries\BasicSQL\QUERY;
use TheNewsCompany\Models\Article;
use TheNewsCompany\Models\SubCategory;

/**
 * The News Company rules
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class TheNewsCompany{
    protected static function getAllArticles(string $token=null,array $filter=null){
        $userID=null;
        $articles=[];
        if($token){
            $userID=Token::getUserIDByToken($token);
            $articles = Article::getArticles(intval($userID), $filter);
        }
        else $articles=Article::getArticles(null,$filter);
        $revisedArticles=[];
        foreach($articles as $article){
            if(isset($article['userID'])) {//If statement is just a flag
                $article['subCategory']=SubCategory::getSubCategory(intval($article['subCategoryID']))[0]['name'];
                $article['category']=SubCategory::getCategory(intval($article['subCategoryID']))[0]['name'];
                array_push($revisedArticles,$article);
            }
        }
        return $revisedArticles;
    }

    protected static function getCategoryOptions(){
        $revisedSubCategories=[];
        $subCategories=SubCategory::getSubCategories();
        foreach($subCategories as $subCategory){
            $subCategory['id'];
            $category=SubCategory::getCategory($subCategory['id']);
            $revisedSubCategory=['categoryID' => $category[0]['id'],'category'=>$category[0]['name'], 'subCategoryID' => $subCategory['id'],'subCategory'=>$subCategory['name']];
            array_push($revisedSubCategories,$revisedSubCategory);
        }
        return $revisedSubCategories;
    }

    protected static function saveArticle(array $data){
        return Article::newArticle($data);
    }

    protected static function getArticleByWords(string $token=null,string $text){
        $userID=null;
        if($token){
            $userID=Token::getUserIDByToken($token);
        }
        return Article::searchArticleByWords($userID,$text);
    }

    protected static function getArticle(int $articleID){
        return Article::getArticleByID($articleID);
    }

    protected static function approveArticle(int $articleID){
        return Article::approveArticle($articleID);
    }


    protected static function rejectArticle(int $articleID)
    {
        return Article::rejectArticle($articleID);
    }

    protected static function removeArticle(int $articleID)
    {
        return Article::removeArticle($articleID);
    }

    protected static function getBreakingNews(){
        return $breakingNewsArticles=self::getAllArticles(null,['breaking'=>'YES','status'=>'RUNNING']);
    }

    protected static function incrementViews($articleID){
        return Article::incrementViews($articleID);
    }
}