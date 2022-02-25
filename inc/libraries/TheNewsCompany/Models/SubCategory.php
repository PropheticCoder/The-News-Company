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
class SubCategory extends QUERY{
    /**
     * Fetches subCategory
     */
    public static function getSubCategory(int $subCategoryID){
        return $subCategory=QUERY::SELECT('newssubcategories',['id'=>$subCategoryID]);
        if(count($subCategory)==0) throw new Exception('You made a mistake and parsed a sub category id that isnt there!');
    }

    /**
     * Fetches category of this category
     * Short cut
     */
    public static function getCategory(int $subCategoryID){
        $subCategory=self::getSubCategory($subCategoryID);
        $subCategoryID=$subCategory[0]['categoryID'];
        return Category::getCategory($subCategoryID);
    }

    /**
     * Fetches all categories
     */
    public static function getSubCategories()
    {
        $subCategory = QUERY::SELECT('newssubcategories');
        if (count($subCategory) == 0) return ['errorMsg'=>'No sub categories'];
        return $subCategory;
    }
}
?>