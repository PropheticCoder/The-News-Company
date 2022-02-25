<?php
namespace TheNewsCompany\Models;

use libraries\Auth\Models\Token;
use libraries\Auth\Models\User;
use Exception;
use libraries\BasicSQL\QUERY;
use libraries\FileUploader;

/**
 * Article Model
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class Article extends QUERY{

    /**
     * Import Sub Category Characteristics
     * Will auto import Category Characteristics
     */
    private static function SubCategory()
    {
        return SubCategory::class;
    }

    public static function getArticles(int $userID=null,array $filter=null)
    {
        $revisedArticles=[];
        if($userID) {
            $newFilter=['userID'=>$userID,$filter];
            $articles = QUERY::SELECT('articles', $filter);
        }
        else $articles = QUERY::SELECT('articles',$filter);
        if (count($articles) == 0) return ['errorMsg'=>'No articles'];
        foreach($articles as $article){
            $User=User::getUserByID($article['userID']);
            $article['authorName']=$User[0]['name'];
            $article['authorLname'] = $User[0]['lastName'];
            $article['authorEmail'] = $User[0]['email'];
            array_push($revisedArticles,$article);
        }
        return $revisedArticles;
    }
    
    public static function getArticleByID(int $articleID){
        $article=QUERY::SELECT('articles',['id'=>$articleID]);
        if(count($article)==0) throw new Exception('You made a mistake and parsed an article id that isnt there!');
        return $article;
    }

    
    public static function getSubCategory(int $articleID)
    {
        $article=self::getArticleByID($articleID);
        $subCategoryID= $article[0]['subCategoryID'];
        return self::SubCategory()::getSubCategory($subCategoryID);
    }

    public static function getCategory(int $articleID)
    {
        $subCategory=self::getSubCategory($articleID);
        $subCategoryID=$subCategory[0]['id'];
        return self::SubCategory()::getCategory($subCategoryID);
    }

    public static function searchArticleByWords(int $userID=null,string $searchText){
        $article=QUERY::SELECT('articles',['userID'=>$userID,'heading'=>$searchText]);
        return $article;
    }

    public static function newArticle(array $data){
        $data['userID']=intval(Token::getUserIDByToken($data['token']));
        if(!$data['userID']) return false;
        unset($data['token']);
        $data['status']="PENDING";
        $data['views']=0;
        $newArticle=QUERY::INSERT('articles',$data);
        $articles=QUERY::SELECT('articles');//Remember they are descending
        $articleID=$articles[0]['id'];
        //Upload Image here
        FileUploader::uploadFiles("articles",[1=>"jpeg",2=>"jpeg"],$articleID);
        return $newArticle;
    }

    public static function rejectArticle(int $articleID){
        return $rejectArticle=QUERY::UPDATE('articles',['status'=>'REJECTED'],['id'=>$articleID]);
    }

    public static function approveArticle(int $articleID){
        return $approveArticle = QUERY::UPDATE('articles', ['status' => 'RUNNING'], ['id' => $articleID]);
    }

    public static function removeArticle(int $articleID)
    {
        return $approveArticle = QUERY::UPDATE('articles', ['status' => 'REMOVED'], ['id' => $articleID]);
    }

    public static function incrementViews(int $articleID){
        $article=self::getArticleByID($articleID);
        $views= intval($article[0]['views']);
        $article[0]['views']=$views+1;
        return QUERY::UPDATE('articles',$article[0],['id'=>$articleID]);
    }
}
?>