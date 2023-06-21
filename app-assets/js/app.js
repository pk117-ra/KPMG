$(document).ready(function(){
    var curUrl1 = window.location.href;
    var curUrl2 = curUrl1.split("/");
    var curUrl3 = curUrl2.reverse();
    var curUrl4 = curUrl3[0];
    var curUrl5 = curUrl4.split("?");
    var curURL = curUrl5[0];
    $("#main-menu-navigation a").each(function() { 
        var ahref = $(this).attr("href");
        if (ahref == curURL) {
            $(this).closest("li").addClass("active");
        }
    });
});