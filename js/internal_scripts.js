
//searchByManufacture

$(document).ready(function() {

	
	
	var clickMsg="right-click has been disabled";

	function clickIE() {if (document.all) {(clickMsg);return false;}}
	function clickNS(e) {
		if((document.layers) || ((document.getElementById) & (!document.all))) {
		if (e.which==2||e.which==3) {(clickMsg);return false;}}
		}
		if (document.layers){document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
		else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
		document.oncontextmenu=new Function("return false");
		
		

		var cookie = sessionStorage.getItem("cookie");

		if(cookie==null || typeof cookie=="undefined"){
			if (navigator.cookieEnabled) {
				sessionStorage.setItem("cookie","enabled");
			}else{
				sessionStorage.setItem("cookie","disabled");
				alert("גולש יקר ,  \r הדפדפן שלך מוחק את העוגיות בכל טעינה של עמוד . \r ולכן לא ניתן להרשם ו או להוסיף מוצרים לעגלה \r . אם ברצונך לבצע רכישה יש  לשנות את הגדרות הדפדפן");
			}
		}
		  
		
		
	
	$('.alert-close').on('click keypress', function(c){
		var message = $(this).parents(".cart_box");
		$(message).fadeOut('slow', function(c){
	  		$(message).remove();
		});

		var id  = $(message).find("input[name=deleteItem]").val();
		var sum = $(message).find("input[name=cartRemoveSum]").val();
		
		
		var myData ={"deleteItem":id,"cartRemoveSum":sum}	 
		 $.ajax({
				  type: "POST",
				  url: "parts/cart_setting_ajax.php",
				  data:myData,
				  success: function(result) {
				  var result = JSON.parse(result);
				  
				  $(".cartSumVal,#showTotal2").html(result.sum+" שח");
				  $(".cartQuntity").html(result.quantity+" פריטים");
				  
			      },error : function(error){
			    	  console.log(error);
			    	  alert("fail");
			      }
			}); 
	});
});


$('#searchByManufacture').change(function() {
    var manu_name = $(this).val();
    window.location.href = "search.php?manufacturer="+manu_name;
});


$('#cartTriger').on('focus', function(e){
	$(this).parent().find('ul').css({'opacity': '1','visibility': 'visible','margin': '0','z-index': '9999'});	  
});

$(document).on('click', function(e){
	var showNow = $(".sub-icon1").parent().find('ul').css("opacity");
	if(showNow==1){
		 $(".list").css({'opacity': '0','visibility': 'hidden','margin': '0','z-index': '9999'});
	}
});

$('body').keydown(function(event){ 
    var keyCode = (event.keyCode ? event.keyCode : event.which);   
    if (keyCode == 13) {
        $(this).trigger('click');
    }
});


$('.moreInfo').on('click', function(e){
	 
	$(".mobileMoreInfoArea").toggle("slow");	  
});

$(".mustConnect").on('click', function(e){
	alert("כדי להשתמש ברשימת המשאלות יש להתחבר");
});


$(".ngShowWishlist").on('click', function(e){
	$(".ngProdlist").hide("slow");
	$(".ngWishlist").show("slow");
	
});

$(".ngShowProdlist").on('click', function(e){
	$(".ngWishlist").hide("slow");
	$(".ngProdlist").show("slow");
	
});


$(".removeFromWishList").on('click', function(e){
     var prodId = $(this).attr("id");
	 var myData ={"prodId":prodId,"remove":1}

	 var prodRemove = $(this).parents(".wlList");
	 
	 $.ajax({
			  type: "POST",
			  url: "parts/setProdOnWishlist.php",
			  data:myData,
			  success: function(result) {

				  prodRemove.hide("slow");				
				 //var result = JSON.parse(result);								 							   
			    
		      },error : function(error){
		    	  console.log(error);
		    	  alert("fail");
		      }
		}); 
});



var onloadCallback = function() {
    grecaptcha.render('html_element', {
      'sitekey' : '6LcNdb4UAAAAADtI_bqJxdpfEwqLNplj8Eo4jcto'
    });
  };
  
  
$('#contactForm1,#sendEmailNotification').on('submit',function(event){
	
	event.preventDefault();
	
	var flag = true;
	
	//name
	var name = $("#by_phone_un").val();
	 if(name.length < 2 || !isNaN(name)){ 
		
		 flag = false;
	}
	 else{
		 $("#by_phone_un").css("border:1px solid red");
	 } 	
	
	//phone
	var phoneTest = /^\(?([0-9]{2,3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	var phone = $("#by_phone_up").val();
	if(phoneTest.test(phone) == false){
		 $("#by_phone_up").css("border:1px solid red");
		flag = false;
		}
	else{
		
	} 
	
	
	//email
	var regTest = /^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
	var myEmail = $("#by_email_up").val();
	 
	if(regTest.test(myEmail) == false) {
		 $("#by_email_up").css("border:1px solid red");
			flag = false;
		 } 
	 else{
		 
	 } 	
	
	//
	
	//textarea
	var name = $("#by_phone_uc").val();
	 if(name.length < 2 || !isNaN(name)){ 
		 
		 flag = false;
	}
	 else{
		 $("#by_phone_uc").css("border:1px solid red");
	 } 		

	var captcha = grecaptcha.getResponse();

	 if(captcha.length == '' || typeof captcha=== "undefined"){ 
		 alert("חובה לסמן אני לא רובוט");								 					
		 flag = false;		 
	}				 
	
	 if (flag) this.submit();
	
});


	$(document).on('click', '.closeADD', function(e) {			
		$(".deliveryADD").hide("slow");
	});	


$(".addToWishList").on('click', function(e){
	var prodId = $(this).closest(".pre").find("input[name=cartAddId]").val();
	 var myData ={"prodId":prodId,"add":1}

	 var currImg = $(this);
	 	 
	 $.ajax({
			  type: "POST",
			  url: "parts/setProdOnWishlist.php",
			  data:myData,
			  success: function(result) {

				  currImg.attr("src","images/onWishlist.png");
				  currImg.attr("title","ברשימת המשאלות שלי");
				 //var result = JSON.parse(result);								 							   
			    
		      },error : function(error){
		    	  console.log(error);
		    	  alert("fail");
		      }
		}); 
});



	$(document).on('click', '.byphone', function(e) {			
		$("#openByPhoneWindow").show("slow");			
		var form = $(this).parents("form");			
		pid= form.find("[name='cartAddId']").val();
		
		var hiddenInput = "<input type='hidden' name='id_for_byPhone' value='"+pid+"' />";
		
		$("#openByPhoneWindow form").append(hiddenInput);
			
	});	
	
	
	
	$(document).on('click', '.closePByEmail', function(e) {
		$("#openByPhoneWindow").hide("slow");
		
	});	

function check_if_type_checked(){

	var type = $(".prodMount").val();
	
	if(type=="0" || type==null){
		$(".must_select").show();
		return false;
	}
	
}	
