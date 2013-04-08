//var $j = jQuery.noConflict();
  // -----------------------------------------------------  Withdrwal ---------------------------------------------- 
 
$(document).ready(function() {	 				
				
                $('#withdrawal').validate({                
                    rules: {                        
                        amount: {
                            required: true,
                            minlength: 2
                        },
                    },
                    messages: {
                        amount: "Minimum withdrawal 10",                        
                    },
                    errorPlacement: function(error, element) {
                        element.css('border','1px solid red');
						element.parent().parent().find('td.errors').append(error);
                      
                    },
                
                    submitHandler: function() { 
                        $('.error').remove();
                        $.ajax({
                            url: 'https://'+SiteSettings.ajaxCallBack+'/MyAccount/withdrawalRequest/true',
                            type: "POST",
                            data: $('#withdrawal').serialize(),
                            xhrFields: {
                                withCredentials: true
                            },
                            crossDomain : true,
                            success: function(data){
                               
								window.location = '/my-account/withdrwal/withdrawal-thank-you/';

                            }
                        });
                    }
                
                });     
}); 

