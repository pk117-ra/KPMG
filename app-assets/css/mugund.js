$(document).ready(function(){
	$("input:radio[name=radios]").change(function(){
		var serviceType = $(this).val();
		//alert(serviceType);
		$.ajax({
	        type : 'POST',
	        url  : 'menues.php',
	        data : { 'serviceType': serviceType },
	        success : function(data)
	        {
	            $("#assetOptions").html(data);
	        }
	    });
	    return false;
	});
});

$("#companyName").on('change',function(){
	var companyName = $(this).val();
	$.ajax({
		type : 'POST',
		url  : 'getexistAddress.php',
		data : {companyName: companyName},
		success : function(data)
		{
			$("#extAddress").html(data);
		}
	});
	return false;
});

//Getting Company Details
$("#extAddress").change(function(){
	var extAddres = $(this).val();
	$.ajax({
		type : 'POST',
		url  : 'getcompanydetails.php',
		data : {extAddres: extAddres},
		success : function(data)
		{
			$("#dataFill").html(data);
		}
	});
	return false;
});

//Make Menu Selected in Sidebar
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
    
//Read Notification
    $(".notificationatag").on("click", function()
    {
        var urla = $(this).attr("href");
        var notifId = $(this).attr("value");
        $.ajax({
            type: "POST",
            url : "hidenotification.php",
            data: {notifId: notifId},
            success: function(data)
            {
                window.location.assign(urla);
            }
        });
        
    });
    
//Read Messages
    $(".msgClient").on("click", function(){
        var msgId = $(this).attr("value");
        var msgHeader = $(this).attr("msgHeader");
        var msgBody = $(this).attr("msgBody");
        //alert(msgId);
        $("#dialog #messageHeader").text(msgHeader);
        $("#dialog #messageBody").text(msgBody);
        $.ajax({
            type: 'POST', 
            url: 'hidemessage.php',
            data:{'msgId': msgId},
            success: function(data)
            {
                $(function()
                {
                    $("#dialog").dialog({
                        close: function(event, ui) { location.reload(); }
                    });
                });
            }
        });return false;
    });