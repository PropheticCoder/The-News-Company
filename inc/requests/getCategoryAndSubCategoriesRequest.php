<?php
$subCategoryOptions = "";
$categories = []; //To Filter categories
$groupedCategoriesAndSubCategories = [];
$navBar="";
//This script wont have a chance to run if the token expires,isTokenValid acts our middleware
$GetCategoriesAndSubCategoriesRequest=new PostsManager();
$categoriesAndSubCategories=$GetCategoriesAndSubCategoriesRequest->getCategoryAndSubCategories();
$categoriesAndSubCategories=array_reverse($categoriesAndSubCategories);

//Initial iteration - Gather Ungrouped SubCategories 
foreach($categoriesAndSubCategories as $categoryAndSubCategory){
    if(!in_array($categoryAndSubCategory['category'],$categories)) {
        //Gather categories
        array_push($categories,$categoryAndSubCategory['category']);
        $groupedCategoriesAndSubCategories[$categoryAndSubCategory['category']]=[]; //Create an array with category as key
    }
    //Gather subCategory options for dropdowns
    $subCategoryOptions .=
    '<option value="'.$categoryAndSubCategory['subCategoryID']. '">' . $categoryAndSubCategory['subCategory'] . '-' . $categoryAndSubCategory['category'] .'</option>';
}

//Group The SubCategories
foreach($categories as $category){
    foreach($categoriesAndSubCategories as $categoryAndSubCategory){
        if($category == $categoryAndSubCategory['category']){//When the the category outer is same as category inner
            array_push(//Push tothe category key of grouped categoriesAndSubs
                $groupedCategoriesAndSubCategories[$category],
                [
                    'subCategoryID'=> $categoryAndSubCategory['subCategoryID'],
                    'subCategory'=> $categoryAndSubCategory['subCategory']
                ]
            );
        }
    }
}

//Create the nav bar

foreach($groupedCategoriesAndSubCategories as $category=>$categorySubCategories){
    $navBar .=
    '<li class="nav-item dropdown">'.
        '<a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="font-size: 13px;text-align: center;">'.ucfirst($category).'</a>';
    $navBar .=
    '<div class="dropdown-menu">';
    foreach($categorySubCategories as $subCategory){
        $navBar .=
        '<a class="dropdown-item" href="'.$_REQSPACE.'Articles?category='. $category.'&subCategory='.$subCategory['subCategory'].'&page=1" style="font-size: 11px;">'.$subCategory['subCategory'].'</a>';
    }
    $navBar .=
        '</div>
    </li>';
}
?>