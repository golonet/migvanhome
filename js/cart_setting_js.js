



		
		$('body').on('change', '#deliveryType', function() {
			
			var delType = $(this).find('option:selected').attr("id");
			
			var delSum = $(this).find('option:selected').val();
			var cartSum = $('#cartSum').val();
			var totalSum = parseInt(delSum)+parseFloat(cartSum);
			$("#getDeleiveryType").attr("value",delType);
		});				
		
//		function deliveryChange(){
//
//			var delSum = document.getElementById('deliveryType').value;
//			var cartSum = document.getElementById('cartSum').value;
//			var totalSum = parseInt(delSum)+parseFloat(cartSum);
//			
//
//
//			//$(".addDelivery").html("+ "+delSum+" = "+totalSum);
//			
//			//$(".cartSumVal").html(totalSum+" שח");
//			var delType = $("#deliveryType").find('option:selected').attr("id");
//			
//			//$(".cartFinelSum").val(totalSum);
//
//						
//			$("#getDeleiveryType").attr("value",delType);
//			
//			
//			//var delSum = $("#deliveryType").val();
//			//var cartSum = $("#cartSum").val();
//			//var totalSum = parseInt(delSum)+parseInt(cartSum);
//			//$("#showTotal").html(totalSum);
//		}
		

		function deliveryChangeP(){
			var delSumP = $("select[name=deliveryType]").val();
			document.getElementById('paypalShipping').value = parseInt(delSumP);
		
		}
		

		
		function gotoPaymentMode(mode){
			if(mode){
				if(mode=='credit'){

					$("#paypalZone").css("display","none");
					$("#phoneZone").css("display","none");
					$("#creditZone").css("display","block");

					$(".goToPayPal").css("display","none");
					$(".goToPhone").css("display","none");										
					$(".goToCredit").css("display","block");					
				}
				else if(mode=='paypal'){
					
					$("#creditZone").css("display","none");
					$("#phoneZone").css("display","none");
					$("#paypalZone").css("display","block");

					$(".goToCredit").css("display","none");
					$(".goToPhone").css("display","none");

					$(".goToPayPal").css("display","block");
					

				}else if (mode=='phone'){
					
					$("#creditZone").css("display","none");
					$("#paymentModeImages").css("display","none");					
					$("#phoneZone").css("display","block");	
					
					$(".goToPayPal").css("display","none");	
					$(".goToCredit").css("display","none");					
					$(".goToPhone").css("display","block");				
				}else{
					
				}				
			}
		}
		
		
		

		function validateForm(){ 

			$("img[id*='checkMy']" ).show();
			
			var flagValid = true;
			//name
			var name = document.getElementById("nameReg").value;
			 if(name.length < 2 || !isNaN(name)){ 
				 document.getElementById('checkMyName').src='images/notValid.png';
				 flagValid = false;
			}
			 else{document.getElementById('checkMyName').src='images/valid.png';} 	
			

			//phone
			var phoneTest = /^\(?([0-9]{2,3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
			var phone = document.getElementById("phone").value;
			if(phoneTest.test(phone) == false){
				document.getElementById('checkMyPhone').src='images/notValid.png';
				flagValid = false;
				}
			else{document.getElementById('checkMyPhone').src='images/valid.png';} 
			
			//email
			var regTest = /^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
			var myEmail = document.getElementById("emailVal").value;
			 if(regTest.test(myEmail) == false) {
				 document.getElementById('checkMyEmail').src='images/notValid.png';
				 flagValid = false;
				} 
			 else{document.getElementById('checkMyEmail').src='images/valid.png';} 
			
			// delivery Adress
			var name = document.getElementById("deliveryAdress").value;
			 if(name.length < 2 || !isNaN(name)){
				 document.getElementById('checkMyDeliveryAdress').src='images/notValid.png';
				 flagValid = false;
			}
			 else{document.getElementById('checkMyDeliveryAdress').src='images/valid.png';} 	
			
			// zip code
			var name = document.getElementById("zipCode").value;
			 if(name.length > 10 || name.length < 4 || isNaN(name)){
				 document.getElementById('checkMyzipCode').src='images/notValid.png';
				 flagValid = false;
			}
			 else{document.getElementById('checkMyzipCode').src='images/valid.png';} 	
			 
			 
			//bank Client Name
			var name = document.getElementById("bankClientName").value;
			 if(name.length < 2 || !isNaN(name)){
				 document.getElementById('checkMybankClientName').src='images/notValid.png';
				 flagValid = false;
			}
			 else{document.getElementById('checkMybankClientName').src='images/valid.png';} 	 
			 
			
			// tz or chet p
			 /*
			var name = document.getElementById("tzHp").value;
			 if(name.length > 11 || name.length < 9 || isNaN(name)){
				 document.getElementById('checkMytzHp').src='images/notValid.png';
				 flagValid = false;
			}
			 else{document.getElementById('checkMybankClientName').src='images/valid.png';} 	 
		 */

			var ifAggremante = document.getElementById("aggremante").checked;
			 
			 if(ifAggremante==false){ 
				 document.getElementById('aggremanteMsg').style.color='red';
				 flagValid = false;
			 }else{
				 document.getElementById('aggremanteMsg').style.color='#000';
			 }
			 
			 if(flagValid==false){
				 document.getElementById('notValilatRE').innerHTML ="* אחד מן השדות או יותר אינו כתוב כראוי";
			 }

				//deliveryType
			 	//var name = document.getElementById("#getDeleiveryType").value;
			// var text_type = $(document).find("#deliveryType option:selected").attr("data-delivery_type");
				//var name = $(document).find("#cartSum").val("id");
				
//				$("#checkdeliveryType").show();
//				$("#checkdeliveryTypePayPal").show();				
//				
//				 if(text_type.length == ""){
//					 document.getElementById('checkdeliveryType').src='images/notValid.png';
//					 flagValid = false;
//				}
//				 else{document.getElementById('checkdeliveryType').src='images/valid.png';} 			 
			 
			 
			return flagValid;
			
			}
			


		function validatePhoneForm(){ 

			$("img[id*='checkMy']" ).show();
			
			var flagValid = true;
			//name
			var name = document.getElementById("nameRegP").value;
			 if(name.length < 2 || !isNaN(name)){ 
				 document.getElementById('checkMyNameP').src='images/notValid.png';
				 flagValid = false;
			}
			 else{document.getElementById('checkMyNameP').src='images/valid.png';} 	
			
			// last name
			var name = document.getElementById("secondNameP").value;
			 if(name.length < 2 || !isNaN(name)){
				 document.getElementById('checkMySecondNameP').src='images/notValid.png';
				 flagValid = false;
			}
			 else{document.getElementById('checkMySecondNameP').src='images/valid.png';} 		
			 
			//phone
			var phoneTest = /^\(?([0-9]{2,3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
			var phone = document.getElementById("phoneP").value;
			if(phoneTest.test(phone) == false){
				document.getElementById('checkMyPhoneP').src='images/notValid.png';
				flagValid = false;
				}
			else{document.getElementById('checkMyPhoneP').src='images/valid.png';} 
			
			//email
			
			var regTest = /^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
			var myEmail = document.getElementById("emailValP").value;
			 if(regTest.test(myEmail) == false) {
				 document.getElementById('checkMyEmailP').src='images/notValid.png';
				 flagValid = false;
				} 
			 else{document.getElementById('checkMyEmailP').src='images/valid.png';} 
			
			 if(flagValid==false){
				 document.getElementById('notValilatREP').innerHTML ="* אחד מן השדות או יותר אינו כתוב כראוי";
			 }
			 
			
			return flagValid;
			
			}


			function validatePayPal(){
				
				var flagValid = true;
				var selected    = $("select[name=deliveryType]").val();
				var paypalEmail = $('#paypalEmail').val();
				var paypalPhone = $('#paypalPhone').val();
								
				
				var regTest = /^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
				
				 if(regTest.test(paypalEmail) == false) {
					 document.getElementById('checkMyEmail_b').src='images/notValid.png';
					 $("#checkMyEmail_b").show();
					 flagValid = false;
					} 
				 else{document.getElementById('checkMyEmail_b').src='images/valid.png';}
				 

				 
				//phone
				var phoneTest = /^\(?([0-9]{2,3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
				var phone = document.getElementById("paypalPhone").value;
				if(phoneTest.test(phone) == false){
					document.getElementById('checkMyPhone_pp').src='images/notValid.png';
					$("#checkMyPhone_pp").show();
					flagValid = false;
					}
				else{document.getElementById('checkMyPhone_pp').src='images/valid.png';} 

				
				if(typeof selected=="undefined" || selected=="" || selected==null){
					
						$("select[name=deliveryType]").css("border","1px solid red");
					 
					 flagValid = false;
				}else{
					document.getElementById('checkdeliveryTypePayPal').src='images/valid.png';
					$("select[name=deliveryType]").css("border","none");
				 }
				
				var ifAggremante = document.getElementById("aggremantePayPal").checked;
				 
				 if(ifAggremante==false){ 
					 document.getElementById('aggremanteMsgPayPal').style.color='red';
					 flagValid = false;
				 }else{
					 document.getElementById('aggremanteMsgPayPal').style.color='#000';
				 }
				
				 
				 if(flagValid){
					 
					 var text_type = $(document).find("#deliveryType option:selected").attr("data-delivery_type");
					
					var deliveryType = $("select[name='deliveryType']").val();
					
					 var delivery_details= $("#delivery_details").val();
					 var data= {"email":paypalEmail,"delivery_details":delivery_details,"deliveryType":deliveryType,"deliveryText":text_type,"phone":phone};
	
						
				 }
				 
				 function returnfunc(){
					 return flagValid;
				 }
				 
				 
				 function sendEmail(){
					 $.ajax({
						  url: "parts/delivery_paypal.php",
						  method: "POST",
						  data: data,

						  async: false,
						  success: function(result) {			     
							  
							  return true;
							  
						  },error : function(error){
							  
					    	  console.log(error);
					    	  return false;
					      }
					});		
				 }
				 
				 setTimeout( sendEmail() , 0);
				 
				 return flagValid;
				// setTimeout( returnfunc() , 4000);
				 								
			}
			
		    $("input").focus(function () {
		        $(this).css("border","2px solid orange");
		  	 });
		    $("input").focusout(function () {
		        $(this).css("border","2px solid #999");
		    });

		    
		    $(".texta1").focus(function () {
		        $(this).css("border","2px solid orange");
		    });    
		    $(".texta1").focusout(function () {
		        $(this).css("border","2px solid #999");
		    });      		