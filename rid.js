$(".myadd").click(function(){
    $.ajax({
        type  : 'POST',
        url   : 'add_recordid.php',
        data  : {uId:uIdinsert},
        success : function(data)
        {
            var uId = data;
            var shyampathname = urlpathname+"?uId="+uId;
            window.location.assign(shyampathname);
        }
    });return false;
});