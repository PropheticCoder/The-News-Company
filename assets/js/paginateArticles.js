let UrlString = window.location.search;
let queryString = new URLSearchParams(UrlString);
let category = queryString.get("category");
let subCategory = queryString.get("subCategory");
let page = queryString.get("page");
let articlePagePrev = document.getElementById("articlePagePrev");
let articlePageNext = document.getElementById("articlePageNext");
let paginationMonitor = document.getElementById("paginationMonitor");
let highestKey = parseInt(page) * 8;
let lowestKey = highestKey - 8 + 1;
if (lowestKey < 1) {
    lowestKey = 1;
    highestKey = lowestKey * 8;
    queryString.set("page", 1)
    window.location.search = queryString.toString();//Blocking 0 page
}

$('#articlePagePrev').click(
    function () {
        if (page == 0) queryString.set("page", 0);
        else queryString.set("page", parseInt(page) - 1);
        window.location.search = queryString.toString();
    }
);


$('#articlePageNext').click(
    function () {
        queryString.set("page", parseInt(page)+1);
        window.location.search = queryString.toString();
    }
);