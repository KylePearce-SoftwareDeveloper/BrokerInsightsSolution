$(document).ready(function () {
    var path = window.location.pathname.substring(1);
    path = path.substring(0, path.length - 5);
    var pathShort = path.substring(path.indexOf("/")+6);

    if(pathShort == ""){
        console.log(pathShort);
        var anchor = document.getElementById(pathShort);
        var anchorParent = anchor.parentNode;
        var button = anchorParent.previousElementSibling;
        button.classList.add("active");
    }else{
        console.log(pathShort);
        var activeLink = document.getElementById(pathShort);
        activeLink.classList.add("active");
    }
});