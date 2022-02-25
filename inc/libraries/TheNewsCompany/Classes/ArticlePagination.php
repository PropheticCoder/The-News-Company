<?php
namespace TheNewsCompany;



/**
 * Paginate Articles
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class ArticlePagination{
    /**
     * The current page number
     */
    public $pageNumber;
    /**
     * Results rodisplaye per page
     */
    public $numberOfResultsToDisplay;
    /**
     * All results,the unfiltered results
     */
    private $allResults;
    /**
     * An array to store all results in an order so we can loop using pageResult location
     */
    private $pageResults;//An array to store all results in an order so we can loop using pageResult location
    /**
     * The number of all results
     */
    private $allResultsCount=count($this->allResults);

    /**
     * All articles divided by allowed spaces block spaces per page gives us maxPages
     */
    private $maxPageNumber = $this->allResultsCount / $this->numberOfResultsToDisplay; 
    /**
     * The end of an array is 1 behind the size of array
     */
    private $lastKeyPerPage = $this->numberOfResultsToDisplay -1;
    /**
     * The number to add to get halfway the lastKey
     */
    private $midKeyPerPage= round($this->lastKeyPerPage/2);
    /**
     * The number of pageResults
     */
    private $pageResultsCount=count($this->pageResults);
    /**
     *  Number of paged results lastKeysPerPage
     */
    public $maxResultKey= $this->PageNumber * $this->lastKeyPerPage; 
    /**
     * Beginning of the results in the page
     * Found lastKeyPerPage spaces behind the maxResultKey
     */
    public $minResultKey= $this->maxResultKey - $this->lastKeyPerPage;
    /**
     * midResultKey is minResultKey  + Key At Page Half 
     */
    public $midResultLocation = $this->minResultLocation + $this->midKeyPerPage; 
    /**
     * An array to store all results in an order so we can loop using pageResult location
     */
    public $pageResultLocation = $this->minResultLocation; //Set the initial page result location to minResultLocation
    /**
     * An array to store all results in an order so we can loop using pageResult location
     */
    public $foundCategoriesCount; // Number of Articles with this category,overallis the total number of articles in this category
    /**
     * An array to store all results in an order so we can loop using pageResult location
     */
    public $foundSubCategoriesCount;//Number of Articles in this subCategory
    
    public function __construct()
    {
        
    }
}
?>