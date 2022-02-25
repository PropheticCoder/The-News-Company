<?php
namespace TheNewsCompany\Models;

use Exception;
use libraries\BasicSQL\QUERY;

/**
 * Category Model
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class Category extends QUERY{

    /**
     * Fetches one category
     */
    public static function getCategory(int $categoryID){
        $category=QUERY::SELECT('newscategories',['id'=>$categoryID]);
        if(count($category)==0) throw new Exception('You made a mistake and parsed a category id that isnt there!');
        return $category;
    }

    /**
     * Fetches all Categories
     */
    public static function getCategories()
    {
        $categories = QUERY::SELECT('newscategories');
        
        if(count($categories)==0) return ['errorMsg'=>'No categories!'];
        return $categories;
    }

    
}
?>