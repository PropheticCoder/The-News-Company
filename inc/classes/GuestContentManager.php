<?php

use libraries\BasicSQL\QUERY;
use TheNewsCompany\TheNewsCompany;

/**
 * Posting business rules
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class GuestContentManager extends TheNewsCompany{
    public function breakingNewsFeed(){
        return TheNewsCompany::getBreakingNews();
    }

    public function newsFeedByCategoryAndSubCategory(){
        
    }

    public function newsFeedByCategory(){
        
    }

    public function newsFeedByTopic(){
        
    }
}