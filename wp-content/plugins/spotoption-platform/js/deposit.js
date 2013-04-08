//var $j = jQuery.noConflict();
  // -----------------------------------------------------  Deposit ---------------------------------------------- 
 
$(document).ready(function() {	 
                                cvvPopup();
				getCountries();
				getClientCards()
                                $("ul.paymentMethods > li").bind('click', {}, onChangeMethod);
                $('#depositForm').validate({
					ignore: ".ignore",
                    rules: {
                        FirstName: "required",
                        Address: "required",
                        City: "required",
                        LastName: "required",
                       
						'CVV2/PIN':{
							required: true,
                            minlength: 3
						},
                        cardNum: {
                            required: true,
                            minlength: 8
                        },
                        postCode: {
                            required: true,
                            minlength: 5                            
                        },
                        Phone: "required"
                    },
                    messages: {
                        FirstName: "Please enter your firstname",
                        LastName: "Please enter your lastname",
                        City: "Please enter your City",
                        Address: "Please enter your Address",
                        'CVV2/PIN':{
							required:"Please enter a valid CVV CODE",
							minlength: "CVV should be at list 3 numbers"
						},
						postCode:{
							required:"Please enter a valid POST CODE",
							minlength: "Post should be at list 5 numbers"
						},
						cardNum: {
                            required: "Please enter a valid Credit card number",
                            minlength: "Credit card number should be at list 8 numbers"
                        },
                       
                    },
                    errorPlacement: function(error, element) {
                        element.css('border','1px solid red');
						//element.append(error);
                        $(error).insertAfter(element);
                    },
                
                    submitHandler: function() { 
                        $('.error').remove();
                        $.ajax({
							
							url: 'https://'+SiteSettings.ajaxCallBack+'/rpcProxy/deposit/creditCard',
                            type: "POST",
                            data: $('#depositForm').serialize(),
                            xhrFields: {
                                withCredentials: true
                            },
                            crossDomain : true,
                            success: function(data){
                                if (data == 'true')
										window.location = "/my-account/deposit/deposit-thank-you/";
								else if (data == 'false')
									alert("an error has occoured, please contact our support");
								else
									alert(data);
									

                            }
                        });
                    }
                
                });     
}); 
	
/***
*	Function 		: 	deleteCC
*	Functionality 	: 	remove a credit card from the user credit card list
*	Parameters		: 	None
*	Requries		: 	Active credit card must be assosiated with the user.
*
***/
 function deleteCC() {		
			 if (confirm('Are you sure you want to delete ?')) {
				$.ajax({
						url: 'http://'+SiteSettings.ajaxCallBack+'/rpcProxy/deleteCC',
						type: "POST",
						data: {fundId : $('select#creditcard').children('option:selected').val()},
						dataType : 'json',
						xhrFields: {
							withCredentials: true
						},
						crossDomain : true,
						success: function(result){
							$('select#creditcard').children('option:selected').remove();
							alert('card removed');
						
						   }
						});
					};
				
	} //end if confirmed

/***
*	Function 		: 	getCountries
*	Functionality 	: 	Populate the deposit country select box
*	Parameters		: 	None
*	Requries		: 	
*
***/
function getCountries() { 
    var urlCountry = 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getJsonFile/Countries.json';
     $.ajax({
        url: urlCountry,
        type: "POST",
        dataType : 'json',
        xhrFields: {
            withCredentials: true
        },
        crossDomain : true,
        success: function(result){
            var container = $('select#country');
            container.children('option').remove();	
			
            $.each(result, function(key, country){
				var html = '<option value="'+country.id+'" prefix="'+country.prefix+'">'+country.name+'</option>';
				container.append(html);
           })
        }
    });
}; 
/***
*	Function 		: 	getClientCards
*	Functionality 	: 	Populate the credit card select box
*	Parameters		: 	None
*	Requries		: 	Logged in user
*
***/
function getClientCards(){
	$.ajax({
		url: 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getCustomerCreditCards',
		type: "POST",
		dataType : 'json',
		xhrFields: {
			withCredentials: true
		},
		crossDomain : true,
		success: function(result){
			
			 var container = $('select#creditcard');
			   $.each(result, function(key, card){
				var html = '<option value="'+key+'" >'+card+'</option>';
			
				container.append(html);
           });
		  
			
				$('.ignore').removeClass('ignore');
		   
		   
		}
	});
}

$('select#creditcard').change(function(){
	//If selected a card
	
	//if addes a new card
	if($('select#creditcard').val() == -1)
	{
		$('.ignore').removeClass('ignore');
		$('#addNewCard').show();	
	}
	else
	{
		$('#addNewCard').hide();
		$('#addNewCard .required').addClass('ignore');
	}
	

});

 function cvvPopup() {
                $('#tooltipSpan').mouseover(function(){
                $('#cvvPopup').removeClass('hidden');
                
            });
            $('#tooltipSpan').mouseleave(function(){
                $('#cvvPopup').addClass('hidden');
                
            });
};

function onChangeMethod(){
    
   var curTab = $('.pageContainer').find('.paymentMethods li.selected');
   var curContent = $('.pageContainer').find('.tab');
   var curtabName = curTab.attr('name');
   var nextTabName = $(this).attr('name');
   
   
   curTab.removeClass('selected');
   $(this).addClass('selected');
   $('#'+ curtabName +'_form').css('display','none');
   $('#'+ nextTabName +'_form').css('display','block');
   
};



